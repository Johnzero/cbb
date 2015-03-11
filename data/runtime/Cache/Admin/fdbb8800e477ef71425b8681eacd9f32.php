<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="http://ahwenhui.com/statics/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="http://ahwenhui.com/statics/css/simplebootadmin.css" rel="stylesheet">
    <link href="http://ahwenhui.com/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="http://ahwenhui.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="http://ahwenhui.com/statics/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "http://ahwenhui.com/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ahwenhui.com/statics/js/jquery.js"></script>
    <script src="http://ahwenhui.com/statics/js/jquery-migrate-1.2.1.js"></script>
    <script src="http://ahwenhui.com/statics/js/wind.js"></script>
    <script src="http://ahwenhui.com/statics/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
	<style type="text/css">
	.col-auto {
		overflow: hidden;
		_zoom: 1;
		_float: left;
		border: 1px solid #c2d1d8;
	}
	.col-right {
		float: right;
		width: 210px;
		overflow: hidden;
		margin-left: 6px;
		border: 1px solid #c2d1d8;
	}
	body fieldset {
		border: 1px solid #D8D8D8;
		padding: 10px;
		background-color: #FFF;
	}
	body fieldset legend {
	background-color: #F9F9F9;
	border: 1px solid #D8D8D8;
	font-weight: 700;
	padding: 3px 8px;
	}
	.list-dot{ padding-bottom:10px}
	.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
	.list-dot li span,.list-dot-othors li span{color:#004499}
	.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
	.list-dot li a.close,.list-dot-othors li a.close{ background: url("http://ahwenhui.com/statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
	.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
	.list-dot-othors li{float:left;width:24%;overflow:hidden;}
	</style>
</head>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('company/index');?>">认证企业</a></li>
			<li class="active"><a href="<?php echo U('company/add');?>">添加企业</a></li>
		</ul>
		<form name="myform" id="myform" action="<?php echo U('company/add_company');?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
			<div class="col-right">
				<div class="table_full">
					<table width="100%" cellpadding="2" cellspacing="2">
						<tr>
							<td><b>缩略图</b></td>
						</tr>
						<tr>
							<td>
								<div  style="text-align: center;"><input type='hidden' name='logo' id='thumb' value="<?php echo ($company["logo"]); ?>">
									<a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','content','12','b6ba209759e147124653ac77362ef2bd');return false;">
									<img src='http://ahwenhui.com/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
									<input type="button"  class="btn" onclick="$('#thumb_preview').attr('src','http://ahwenhui.com/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
								</div>
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<div class="col-auto">
				<div class="table_full">
					<table width="100%" cellpadding="2" cellspacing="2">
						<tr>
							<th width="80">企业名称：</th>
							<td>
								<input type="text" style="width:400px;" name="name" id="title" value="<?php echo ($company["name"]); ?>" class="input input_hd" placeholder="请输入企业名称"/>
								<input type="hidden" name="id" value="<?php echo ($company["id"]); ?>"/>
								<span class="must_red">*</span>
							</td>
						</tr>
						<tr>
							<th width="80">企业简介：</th>
							<td>
								<textarea id='description' name='description' style='width:98%;height:200px;'><?php echo ($company["description"]); ?></textarea>
								<script type="text/javascript">
									var editorURL = GV.DIMAUB;
								</script>
								<script type="text/javascript"  src="http://ahwenhui.com/statics/js/ueditor/ueditor.config.js"></script>
								<script type="text/javascript"  src="http://ahwenhui.com/statics/js/ueditor/ueditor.all.min.js"></script>
							</td>
						</tr>
						<tr>
							<th width="80">企业项目：</th>
							<td>
								<textarea id='xm' name='xm' style='width:98%;height:200px;'><?php echo ($company["xm"]); ?></textarea>
							</td>
						</tr>
						<tr>
							<th width="80">企业展示：</th>
							<td>
								<textarea id='show' name='show' style='width:98%;height:200px;'  ><?php echo ($company["show"]); ?></textarea>
							</td>
						</tr>

						<tr>
							<th width="80">联系方式：</th>
							<td>
								<textarea id='ct' name='ct' style='width:98%;height:200px;'  ><?php echo ($company["ct"]); ?></textarea>
							</td>
						</tr>

					</tbody>
				</table>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">提交</button>
			<a class="btn" href="/Admin/Company">返回</a>
		</div>
	</form>
</div>
<script type="text/javascript" src="http://ahwenhui.com/statics/js/common.js"></script>
<script type="text/javascript" src="http://ahwenhui.com/statics/js/content_addtop.js"></script>
<script type="text/javascript">
$(function () {

		editorcontent2 = new baidu.editor.ui.Editor();
		editorcontent2.render( 'xm' );

		editorcontent3 = new baidu.editor.ui.Editor();
		editorcontent3.render( 'show' );

		editorcontent1 = new baidu.editor.ui.Editor();
		editorcontent1.render( 'ct' );

	//setInterval(function(){public_lock_renewal();}, 10000);
	$(".J_ajax_close_btn").on('click', function (e) {
	e.preventDefault();
	Wind.use("artDialog", function () {
	art.dialog({
	id: "question",
	icon: "question",
	fixed: true,
	lock: true,
	background: "#CCCCCC",
	opacity: 0,
	content: "您确定需要关闭当前页面嘛？",
	ok:function(){
					setCookie("refersh_time",1);
					window.close();
					return true;
				}
	});
	});
	});
	/////---------------------
	Wind.use('validate', 'ajaxForm', 'artDialog', function () {
	var form = $('form.J_ajaxForms');
	//ie处理placeholder提交问题
	if ($.browser.msie) {
	form.find('[placeholder]').each(function () {
	var input = $(this);
	if (input.val() == input.attr('placeholder')) {
	input.val('');
	}
	});
	}
	//表单验证开始
	form.validate({
				//是否在获取焦点时验证
				onfocusout:false,
				//是否在敲击键盘时验证
				onkeyup:false,
				//当鼠标掉级时验证
				onclick: false,
	//验证错误
	showErrors: function (errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try{
						$(errorArr[0].element).focus();
						art.dialog({
							id:'error',
							icon: 'error',
							lock: true,
							fixed: true,
							background:"#CCCCCC",
							opacity:0,
							content: errorArr[0].message,
							cancelVal: '确定',
							cancel: function(){
								$(errorArr[0].element).focus();
							}
						});
					}catch(err){
					}
	},
	//验证规则
	rules: {'name':{required:1}},
	//验证未通过提示消息
	messages: {'name':{required:'请输入名称'}},
	//给未通过验证的元素加效果,闪烁等
	highlight: false,
	//是否在获取焦点时验证
	onfocusout: false,
	//验证通过，提交表单
	submitHandler: function (forms) {
	$(forms).ajaxSubmit({
	url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
	dataType: 'json',
	beforeSubmit: function (arr, $form, options) {
	
	},
	success: function (data, statusText, xhr, $form) {
	if(data.status){
								setCookie("refersh_time",1);
								//添加成功
								Wind.use("artDialog", function () {
								art.dialog({
								id: "succeed",
								icon: "succeed",
								fixed: true,
								lock: true,
								background: "#CCCCCC",
								opacity: 0,
								content: data.info,
										button:[
											{
												name: '继续添加？',
												callback:function(){
													reloadPage(window);
													return true;
												},
												focus: true
											},{
												name: '返回列表',
												callback:function(){
													location.href="/Admin/Company";
													return true;
												}
											}
										]
								});
								});
							}else{
								isalert(data.info);
							}
	}
	});
	}
	});
	});
	////-------------------------
});
</script>
</body>
</html>