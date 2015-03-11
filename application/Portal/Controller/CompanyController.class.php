<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;

class CompanyController extends HomeBaseController {

	public function index() {
		$where['authorize'] = 1;
		$companys = D("Company")->where($where)->select();
		$this->assign("companys",$companys);
    	$this->render(":company");
	}

	public function detail() {
		if ($_GET['id']) {
			$where['id'] = $_GET['id'];
			$company = D("Company")->where($where)->find();
			$this->assign("company",$company);
		}
    	$this->render(":company_detail");
	}
}
?>
