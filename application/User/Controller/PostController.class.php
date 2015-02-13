<?php
namespace User\Controller;
use Common\Controller\MemberbaseController;
class PostController extends MemberbaseController{

	protected $posts_obj;
	protected $terms_relationship;
	protected $terms_obj;
	
	function _initialize() {
		parent::_initialize();
		$this->posts_obj = D("Common/Posts");
		$this->terms_obj = D("Common/Terms");
		$this->terms_relationship = D("Common/TermRelationships");
	}

	function index() {
		$this->_lists();
		$this->_getTree();
		$this->render();
	}

	function add() {
		$this->_getTree();
		$term_id = intval(I("get.term"));
		$term=$this->terms_obj->where("term_id=$term_id")->find();
		$this->assign("author","1");
		$this->assign("term",$term);
		$this->render();
	}
	
	function add_post() {
		$this->_getTree();
		if (IS_POST) {
			$return = array();
            $return['info'] = "发布错误！";
            
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['post_date']=date("Y-m-d H:i:s",time());
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			$_POST['post']['post_author'] = sp_get_current_userid();
			$_POST['post']['post_title'] = $_POST['post_title'];
			$_POST['post']['post_keywords'] = $_POST['post_keywords'];
			$_POST['post']['post_excerpt'] = $_POST['post_excerpt'];
			$_POST['post']['post_content'] = $_POST['post_content'];
			$_POST['post']['post_status'] = 0;

			$result = $this->posts_obj->add($_POST['post']);

			if ($result) {
				$_POST['term']['term_id'] = $_POST['term_id'];
				$_POST['term']['object_id'] = $result;
				$result = $this->terms_relationship->add($_POST['term']);
				if ($result) {
					$return['url'] = u("user/post/index");
            		$return['info'] = "发布成功！";
					$return['status'] = "success";
		            $this->ajaxReturn($return);
				}else{
					$return['status'] = "error";
		            $return['data'] = "归类失败！";
		            $this->ajaxReturn($return);
				}
			} else {
				$return['status'] = "error";
	            $return['data'] = "添加失败！";
	            $this->ajaxReturn($return);
			}
			 
		}
	}
	
	public function edit() {
		$id=  intval(I("get.id"));
		$term_id = intval(I("get.term"));
		if(empty($term_id)){
			$term_id = M('TermRelationships')->where("object_id=$id")->getField('term_id'); 
		}
		$term=$this->terms_obj->where("term_id=$term_id")->find();
		$post=$this->posts_obj->where("id=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		$this->assign("term",$term);
		$this->render();
	}
	
	public function edit_post() {
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				foreach ($_POST['photos_url'] as $key=>$url){
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
				}
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			unset($_POST['post']['post_author']);
			$result=$this->posts_obj->save($_POST['post']);
			//echo($this->posts_obj->getLastSql());die;
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	public function listorders() {
		$status = parent::_listorders($this->terms_relationship);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
		}
	}
	
	private  function _lists($status=1) {
		$term_id=0;
		if(!empty($_REQUEST["term"])){
			$term_id=intval($_REQUEST["term"]);
			$term=$this->terms_obj->where("term_id=$term_id")->find();
			$this->assign("term",$term);
			$_GET['term']=$term_id;
		}
		
		$where_ands=empty($term_id)?array("a.status=$status"):array("a.term_id = $term_id and a.status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"post_title","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
			
			
		$count=$this->terms_relationship
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->terms_relationship
		->alias("a")
		->join(C ( 'DB_PREFIX' )."posts b ON a.object_id = b.id")
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("a.listorder ASC,b.post_modified DESC")->select();
		$users_obj = M("Users");
		$users_data=$users_obj->field("id,user_login,role_id")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign("users",$users);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree() {
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->terms_obj->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="J_ajax_del" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}

}