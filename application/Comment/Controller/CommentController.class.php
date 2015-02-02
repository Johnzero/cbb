<?php
namespace Comment\Controller;
use Common\Controller\MemberbaseController;
class CommentController extends MemberbaseController{
	
	protected $comments_model;
	
	function _initialize() {
		parent::_initialize();
		$this->comments_model=D("Common/Comments");
	}
	
	function index(){
		$uid=sp_get_current_userid();
		$where=array("uid"=>$uid);
		
		$count=$this->comments_model->where($where)->count();
		
		$page=$this->page($count,20);
		$page->setLinkWraper("li");
		
		$comments=$this->comments_model->where($where)
		->order("createtime desc")
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
		
		$this->assign("pager",$page->show("default"));
		$this->assign("comments",$comments);
		$this->render(":index");
	}
	
	function post(){
		if ( $_REQUEST['post_table'] ){
			$post_table = sp_authcode($_REQUEST['post_table']);
			$_REQUEST['post_table']=$post_table;
			$url=parse_url(urldecode($_REQUEST['url']));
			$query=empty($url['query'])?"":"?{$url['query']}";
			$url="{$url['scheme']}://{$url['host']}{$url['path']}$query";

			$_REQUEST['url']=sp_get_relative_url($url);
			
			if(isset($_SESSION["user"])){
				$uid=$_SESSION["user"]['id'];
				$_REQUEST['uid']=$uid;
				$users_model=M('Users');
				$user=$users_model->field("user_login,user_email,user_nicename")->where("id=$uid")->find();
				$username=$user['user_login'];
				$user_nicename=$user['user_nicename'];
				$email=$user['user_email'];
				$_REQUEST['full_name']=empty($user_nicename)?$username:$user_nicename;
				$_REQUEST['email']=$email;
			}
			
			if(C("COMMENT_NEED_CHECK")){
				$_REQUEST['status']=0;//评论审核功能开启
			}else{
				$_REQUEST['status']=1;
			}
			
			if ($this->comments_model->create()){
				$this->check_last_action(60);
				$result=$this->comments_model->add();
				if ($result!==false){
					
					//评论计数
					$post_table=ucwords(str_replace("_", " ", $post_table));
					$post_table=str_replace(" ","",$post_table);
					$post_table_model=M($post_table);
					$pk=$post_table_model->getPk();
					
					$post_table_model->create(array("comment_count"=>array("exp","comment_count+1")));
					$post_table_model->where(array($pk=>intval($_REQUEST['post_id'])))->save();
					
					$post_table_model->create(array("last_comment"=>time()));
					$post_table_model->where(array($pk=>intval($_REQUEST['post_id'])))->save();
					
					$this->success("评论成功！");
				} else {
					$this->error("评论失败！");
				}
			} else {
				$this->error($this->comments_model->getError());
			}
		}else {
			$this->error("未知错误！");
		}
	}
}