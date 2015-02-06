<?php

/**
 * 会员注册登录
 */
namespace User\Controller;
use Common\Controller\HomeBaseController;
class IndexController extends HomeBaseController {
    //登录
	public function index() {
		$id=I("get.id");
		
		$users_model=M("Users");
		
		$user=$users_model->where(array("id"=>$id))->find();
		
		if(empty($user)){
			$this->error("查无此人！");
		}
		$this->assign($user);
		$this->render(":index");

    }

    //退出
    public function logout(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
    	session("user",null);
    	redirect(__ROOT__."/");
    }
	
	public function logout2(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
		if(isset($_SESSION["user"])){
		$referer=$_SERVER["HTTP_REFERER"];
			session("user",null);//只有前台用户退出
			$_SESSION['login_http_referer']=$referer;
			$this->success("退出成功！",__ROOT__."/");
		}else{
			redirect(__ROOT__."/");
		}
    }

    public function picupload() {
    	$userid=sp_get_current_userid();
    	$config=array(
			'rootPath' => './'.C("UPLOADPATH"),
			'savePath' => './company/',
			'maxSize' => 512000,
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'png', 'jpeg'),
			'autoSub'    =>    false,
    	);
    	$upload = new \Think\Upload($config);
    	$info=$upload->upload();

    	if ($info) {
    		$info = array_shift($info);
    		$url = $info['savepath'].$info['savename'];
    		$return = array();
            $return['status'] = "success";
            $return['info'] = "上传成功！";
            $return['data'] = $url;
            $this->ajaxReturn($return);
    	} else {
            $return = array();
            $return['status'] = "error";
            $return['info'] = "上传错误！";
            $return['data'] = $upload->getError();
            $this->ajaxReturn($return);
    	}
    }

}
?>
