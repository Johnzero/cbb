<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
		$posts = D("posts")->where(array("post_status"=>1))->limit(7)->order("post_date desc")->select();
		$this->assign("posts",$posts);
    	$this->render(":index");
    }
}

?>
