<?php

/**
 * 文章内页
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class TestController extends HomeBaseController {
    //文章内页
    public function index() {
        var_dump($_POST);
    	$this->error('密码重置激活码生成失败！');
    }
    
}
?>
