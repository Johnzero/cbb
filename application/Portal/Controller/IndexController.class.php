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
    	$this->render(":index");
    }

    public function content() {
    	$this->render(":content");
	}
	public function page() {
    	$this->render(":content");
	}
}

?>
