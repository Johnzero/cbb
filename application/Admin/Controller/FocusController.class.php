<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class FocusController extends AdminbaseController{
	
	protected $Focus_obj;
	
	function _initialize() {
		parent::_initialize();
		$this->Focus_obj = D("Common/Focus");
	}
	
	function index(){
		$Focus = $this->Focus_obj->order("orders asc")->select();
		$this->assign("focus",$Focus);
		$this->display();
	}
	
	function set(){
		$id= intval(I("get.id"));
		$Focus = $this->Focus_obj->where(array('id'=>$id))->find();
		$this->assign($Focus);
		$this->display();
	}
	
	function set_post(){
		if(IS_POST){
			if (!$_POST['id']) {
				$this->Focus_obj->add($_POST);
				$this->success("保存成功！", U("Focus/index"));
			}
			else {
				$id = $_POST['id'];
				unset($_POST['id']);
				$this->Focus_obj->where(array("id"=>$id))->save($_POST);
				$this->success("保存成功！", U("Focus/index"));
			}
		}
	}
	
	
	function delete(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data['Focus_status']=0;
			if ($this->Focus_obj->where("Focus_id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			$id = intval(I("get.id"));
			if ($this->Focus_obj->delete($id)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		
	}
	
	function toggle(){
		if(isset($_POST['ids']) && $_GET["display"]){
			$ids = implode(",", $_POST['ids']);
			$data['Focus_status']=1;
			if ($this->Focus_obj->where("Focus_id in ($ids)")->save($data)!==false) {
				$this->success("显示成功！");
			} else {
				$this->error("显示失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["hide"]){
			$ids = implode(",", $_POST['ids']);
			$data['Focus_status']=0;
			if ($this->Focus_obj->where("Focus_id in ($ids)")->save($data)!==false) {
				$this->success("隐藏成功！");
			} else {
				$this->error("隐藏失败！");
			}
		}
	}
	
	//排序
	public function listorders() {
		foreach ($_POST['orders'] as $key => $value) {
			$this->Focus_obj->where(array("id"=>$value))->save(array("orders"=>$key+1));
		}
		echo 1;
	}
	
}