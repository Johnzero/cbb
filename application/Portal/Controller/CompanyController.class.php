<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;

class CompanyController extends HomeBaseController {

	public function index() {
		$where['authorize'] = 1;
		$companys = D("Company")->order("create_time desc")->where($where)->select();
		$this->assign("companys",$companys);
    	$this->render(":company");
	}

	public function detail() {
		if ($_GET['id']) {
			$where['id'] = $_GET['id'];
			$company = D("Company")->where($where)->find();
			$content_data=sp_content_page($company['xm']);
    		$company['xm']=$content_data['content'];
			$company['show'] = unserialize($company['show']);

			$this->assign("company",$company);
		}
    	$this->render(":company_detail");
	}
}
?>
