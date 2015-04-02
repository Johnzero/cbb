<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
	public function index() {
		$where['authorize'] = 1;
		$companys = D("Company")->order("id desc")->where($where)->limit(3)->select();
		$this->assign("companys",$companys);
		$hot_articles = D("Common/Posts")->where(array("recommended"=>1))->limit(7)->order("post_modified DESC,post_date DESC")->select();
    	foreach ($hot_articles as $key => $value) {
    		$relationship = D("Common/TermRelationships")->where(array("object_id"=>$value['id']))->find();
    		$hot_articles[$key]['tid'] = $relationship['tid'];
            $hot_articles[$key]['listorder'] = $relationship['listorder'];
    	}
        $hot_articles = $this->array_sort($hot_articles,'listorder');
    	$this->assign('hot_articles',$hot_articles);
    	$this->render(":index");
    }

    public function content() {
    	$this->render(":content");
	}
	public function page() {
    	$this->render(":content");
	}

    public function array_sort($arr,$keys,$type='desc'){ 
        $keysvalue = $new_array = array();
        foreach ($arr as $k=>$v){
                $keysvalue[$k] = $v[$keys];
        }
        if($type == 'asc'){
            asort($keysvalue);
        }else{
            arsort($keysvalue);
        }
        reset($keysvalue);
        foreach ($keysvalue as $k=>$v){
                $new_array[$k] = $arr[$k];
        }
        return $new_array; 
    } 
}

?>
