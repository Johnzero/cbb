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

	<link href="/statics/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/statics/css/simplebootadmin.css" rel="stylesheet">
    <link href="/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/statics/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/statics/js/jquery.js"></script>
    <script src="/statics/js/jquery-migrate-1.2.1.js"></script>
    <script src="/statics/js/wind.js"></script>
    <script src="/statics/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('User/userinfo');?>">修改信息</a></li>
     <li><a href="<?php echo U('setting/password');?>">修改密码</a></li>
  </ul>
  <div class="common-form">
    <form class="form-horizontal J_ajaxForm" method="post" action="<?php echo U('User/userinfo_post');?>">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">昵称:</label>
            <div class="controls">
              <input type="hidden" class="input" name="id" value="<?php echo ($id); ?>">
              <input type="text" class="input-xlarge" name="user_nicename" value="<?php echo ($user_nicename); ?>">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">更新</button>
          </div>
        </fieldset>
      </form>
  </div>
</div>
<script src="/statics/js/common.js"></script>

</body>
</html>