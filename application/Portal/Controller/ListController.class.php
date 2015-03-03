<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 文章列表
*/
class ListController extends HomeBaseController {

	//文章内页
	public function index() {
		$term=sp_get_term($_GET['id']);
		$tplname=$term["list_tpl"];
    	$tplname=sp_get_apphome_tpl($tplname, "list");
    	$this->assign($term);
    	$this->assign('cat_id', intval($_GET['id']));
    	$this->render(":$tplname");
	}

	public function keyword() {
		$keyword = $_GET['id'];
    	$this->assign("keyword",$keyword);
    	$this->render(":keyword");
	}
	
	public function nav_index(){
		$navcatname="文章分类";
		$datas=sp_get_terms("field:term_id,name");
		$navrule=array(
			"action"=>"List/index",
			"param"=>array(
					"id"=>"term_id"
			),
			"label"=>"name");
		exit(sp_get_nav4admin($navcatname,$datas,$navrule));
		
	}
	
}
?>
