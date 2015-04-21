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
	<body class="J_scroll_fixed">
		<div class="wrap tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-lock"></i> <?php echo ($company["name"]); ?>认证信息</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active">
					<form class="form-horizontal">
						<h2>公司及联系人信息</h2>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>公司名称：</label>
							<div class="controls">
								<input type="text" name="name" value="<?php echo ($company["name"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>公司详细地址：</label>
							<div class="controls">
								<input type="text" name="location" value="<?php echo ($company["location"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>公司电话：</label>
							<div class="controls">
								<input type="text" name="tel" value="<?php echo ($company["tel"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>联系人姓名：</label>
							<div class="controls">
								<input type="text" name="contact" value="<?php echo ($company["contact"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>联系人电话：</label>
							<div class="controls">
								<input type="text" name="ctel"value="<?php echo ($company["ctel"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>电子邮箱：</label>
							<div class="controls">
								<input type="text" name="email" value="<?php echo ($company["email"]); ?>" readonly="readonly">
							</div>
						</div>
						<h2>营业执照信息</h2>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>营业执照号：</label>
							<div class="controls">
								<input type="text" name="code" value="<?php echo ($company["code"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>营业执照电子版：</label>
							<div class="controls">
								<img src="/data/upload/company/<?php echo ($company["code_pic"]); ?>" class="headicon">                                    
							</div>
						</div>
						<h2>组织机构代码证</h2>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>组织机构代码：</label>
							<div class="controls">
								<input type="text" name="group" value="<?php echo ($company["group"]); ?>" readonly="readonly">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><span class="text-error">*</span>组织机构代码证电子版：</label>
							<div class="controls">
								<img src="/data/upload/company/<?php echo ($company["group_pic"]); ?>" class="headicon">                            
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<a href="<?php echo u('company/index');?>" class="btn btn-primary">返回</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>