<?php 
	require('nusoap.php');

	$client = new nusoap_client('http://access.xx95.net:8886/Connect_Service.asmx?WSDL', 'wsdl');
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$params = array(); 
	$params['epid'] = 1;
	$params['User_Name'] = 'xmt';
	$params['password'] = '69d30b071691d0af';
	$params['phone'] = '13956070164';
	$params['content'] = "新媒体集团通知：放假!";

	// $params['content'] = iconv("UTF-8", "GB2312//IGNORE","新媒体集团通知：放假!");
	// $result = $client->call("SendSmsEx",$params);
	var_dump($result);

?>