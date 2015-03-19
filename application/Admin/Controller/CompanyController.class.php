<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class CompanyController extends AdminbaseController{
	
	protected $company_model;
	
	function _initialize() {
		parent::_initialize();
		$this->company_model=D("Common/Company");
	}
	
	function index(){
		$uid = sp_get_current_userid();
		$count=$this->company_model->count();
		
		$page=$this->page($count,10);
		$page->setLinkWraper("li");
		
		$companys=$this->company_model->order("create_time desc")
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
		
		$this->assign("pager",$page->show("default"));
		$this->assign("companys",$companys);
		$this->display();
	}

	function detail(){
		$uid = sp_get_current_userid();
		if ( $_GET['id'] ) {
			$company = $this->company_model->where(array("id"=>$_GET['id']))->find();
			$this->assign("company",$company);
		}else {
			$this->error("出现异常！");
		}
		$this->display();exit;
	}

	function add(){
		$uid = sp_get_current_userid();
		$this->display();
	}

	function edit(){
		$uid = sp_get_current_userid();
		$id = $_GET['id'];
		$company = D("Company")->where(array("id"=>$id))->find();

		$company['show'] = unserialize($company['show']);
		$this->assign("company",$company);
		$this->display("add");
	}

	function add_company() {

		if (!$_POST['name']) {
			$this->error("请输入名称！");exit;
		}
		$data = D("Company");
		$id = $_POST['id'];

		$uid = sp_get_current_userid();
		// $company = $data->where(array("id"=>$id))->find();

		if ( !empty($_POST['photos_url']) ) {
			$_POST['show'] = serialize($_POST['photos_url']);
		}

		$_POST["user_id"] = $uid;
        $_POST['create_time'] = time();

        if ( $id ) {
        	unset($_POST['id']);
        	unset($_POST['photos_url']);
        	unset($_POST['photos_alt']);
            $data->where(array("id"=>$id))->save($_POST);
            $this->success("修改成功！");exit;
        }else {
            if( $data->create() ) {                
                if( $data->add() ){
					$this->success("添加成功！");exit;
                }else{
					$this->error("服务器繁忙，请稍候再试");exit;
                }           
            }else{   
            	$this->error($data->getError());exit;   
            }
        }
	}

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->company_model->where("id=$id")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if ($this->company_model->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["authorize"]=1;
				
			$ids=join(",",$_POST['ids']);
			
			if ( $this->company_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			$data["authorize"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->company_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
}