<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
	public function index() {
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
