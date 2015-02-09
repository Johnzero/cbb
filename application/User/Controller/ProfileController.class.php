<?php

/**
 * 会员中心
 */
namespace User\Controller;
use Common\Controller\MemberbaseController;
class ProfileController extends MemberbaseController {
	
	protected $users_model;
	function _initialize(){
		parent::_initialize();
		$this->users_model=D("Common/Users");
	}
	
    //编辑用户资料
	public function edit() {
		$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->render();
    }
    
    public function edit_post() {
    	if(IS_POST){
    		$userid = sp_get_current_userid();
    		$_POST['id'] = $userid;
    		if ($this->users_model->create()) {
				if ($this->users_model->save()!==false) {
					$user=$this->users_model->find($userid);
					sp_update_current_user($user);

                    $return = array();
                    $return['url'] = U("user/profile/edit");
                    $return['status'] = "success";
                    $return['info'] = "编辑个人资料";
                    $return['data'] = "保存成功！";
                    $this->ajaxReturn($return);

				} else {
                    $return = array();
                    $return['status'] = "error";
                    $return['info'] = "编辑个人资料";
                    $return['data'] = "保存失败！";
                    $this->ajaxReturn($return);
				}
			} else {
                $return = array();
                $return['status'] = "error";
                $return['info'] = "编辑个人资料";
                $return['data'] = $this->users_model->getError();
                $this->ajaxReturn($return);
			}
    	}
    	
    }
    
    public function password() {
    	$userid=sp_get_current_userid();
    	$user=$this->users_model->where(array("id"=>$userid))->find();
    	$this->assign($user);
    	$this->render();
    }
    
    public function password_post() {
    	if (IS_POST) {
    		if(empty($_POST['old_password'])){
                $return = array();
                $return['status'] = "error";
                $return['info'] = "修改密码";
                $return['data'] = "原始密码不能为空！";
                $this->ajaxReturn($return);
    		}
    		if(empty($_POST['password'])){
                $return = array();
                $return['status'] = "error";
                $return['info'] = "修改密码";
                $return['data'] = "新密码不能为空！";
                $this->ajaxReturn($return);
    		}
    		$uid=sp_get_current_userid();
    		$admin=$this->users_model->where("id=$uid")->find();
    		$old_password=$_POST['old_password'];
    		$password=$_POST['password'];
    		if(sp_password($old_password)==$admin['user_pass']){
    			if($_POST['password']==$_POST['repassword']){
    				if($admin['user_pass']==sp_password($password)){
                        $return = array();
                        $return['status'] = "error";
                        $return['info'] = "修改密码";
                        $return['data'] = "新密码不能和原始密码相同！";
                        $this->ajaxReturn($return);
    				}else{
    					$data['user_pass']=sp_password($password);
    					$data['id']=$uid;
    					$r=$this->users_model->save($data);
    					if ($r!==false) {
                            $return = array();
                            $return['status'] = "success";
                            $return['info'] = "修改密码";
                            $return['data'] = "修改成功！";
                            $this->ajaxReturn($return);
    					} else {
                            $return = array();
                            $return['status'] = "error";
                            $return['info'] = "修改密码";
                            $return['data'] = "修改失败！";
                            $this->ajaxReturn($return);
    					}
    				}
    			}else{
                    $return = array();
                    $return['status'] = "error";
                    $return['info'] = "修改密码";
                    $return['data'] = "密码输入不一致！";
                    $this->ajaxReturn($return);
    			}
    	
    		}else{
                $return = array();
                $return['status'] = "error";
                $return['info'] = "修改密码";
                $return['data'] = "原始密码不正确！";
                $this->ajaxReturn($return);
    		}
    	}
    	 
    }
    
    
    function bang(){
    	$oauth_user_model=M("OauthUser");
    	$uid=sp_get_current_userid();
    	$oauths=$oauth_user_model->where(array("uid"=>$uid))->select();
    	$new_oauths=array();
    	foreach ($oauths as $oa){
    		$new_oauths[strtolower($oa['from'])]=$oa;
    	}
    	$this->assign("oauths",$new_oauths);
    	$this->render();
    }
    
    function avatar(){
    	$userid=sp_get_current_userid();
		$user=$this->users_model->where(array("id"=>$userid))->find();
		$this->assign($user);
    	$this->render();
    }
    
    function avatar_upload(){
        $userid=sp_get_current_userid();
    	$config=array(
			'rootPath' => './'.C("UPLOADPATH"),
			'savePath' => './avatar/',
			'maxSize' => 512000,//500K
			'saveName'   =>    array('uniqid',''),
			'exts'       =>    array('jpg', 'png', 'jpeg'),
			'autoSub'    =>    false,
    	);
    	$upload = new \Think\Upload($config);//
    	$info=$upload->upload();

    	if ($info) {
    		$info = array_shift($info);
    		$avatar = $info['savename'];
    		$_SESSION['avatar'] = $avatar;
            $result=$this->users_model->where(array("id"=>$userid))->save(array("avatar"=>$avatar));
            $_SESSION['user']['avatar']=$avatar;

    		$return = array();
            $return['status'] = "success";
            $return['info'] = "上传成功！";
            $return['data'] = $avatar;
            $this->ajaxReturn($return);
    	} else {
            $return = array();
            $return['status'] = "error";
            $return['info'] = "上传错误！";
            $return['data'] = $upload->getError();
            $this->ajaxReturn($return);
    	}
    }

    function company(){

        $data = D("Company");
        $userid = sp_get_current_userid();
        $user = $this->users_model->where(array("id"=>$userid))->find();
        $this->assign($user);
        $company = $data->where(array("user_id"=>$userid))->find();
        $this->assign("companyForm",$company);

        if( IS_POST ) {
            $return = array();
            $return['info'] = "认证信息";
            $_POST["user_id"] = $userid;
            $_POST['create_time'] = time();
            if ( !empty($company) ) {
                $data->where(array("user_id"=>$userid))->save($_POST);
                $return['url'] = U("user/profile/company");
                $return['status'] = "success";
                $return['data'] = "上传成功！请等待管理员审核。";
                $this->ajaxReturn($return);  
            }else {

                $_POST["authorize"] = 0;
                if( $data->create() ) {                
                    if( $data->add() ){
                        $return = array();
                        $return['url'] = U("user/profile/company");
                        $return['status'] = "success";
                        $return['data'] = "上传成功！请等待管理员审核。";
                        $this->ajaxReturn($return);             
                    }else{
                        $return['status'] = "error";
                        $return['data'] = "服务器繁忙，请稍候再试";
                        $this->ajaxReturn($return);
                    }           
                }else{      
                    $return['status'] = "error";
                    $return['data'] = $data->getError();
                    $this->ajaxReturn($return);
                }
            }
        }
        if ($company['authorize'] == 1) {
            $this->render("company_au");
        }else {
            $this->render();
        }
    }
    
}
    
