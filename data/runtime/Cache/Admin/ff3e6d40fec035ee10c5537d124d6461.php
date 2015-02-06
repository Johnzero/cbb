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
     <li><a href="<?php echo U('user/index');?>">管理员</a></li>
     <li class="active"><a href="<?php echo U('user/add');?>">添加管理员</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('User/add_post');?>">
      <div class="table_list">
        <table cellpadding="2" cellspacing="2" class="table_form" width="100%">
          <tbody>
            <tr>
              <td width="180">用户名:</td>
              <td><input type="text" class="input" name="user_login" value=""></td>
            </tr>
            <tr>
              <td>密码:</td>
              <td><input type="password" class="input" name="user_pass" value="" ></td>
            </tr>
            <tr>
              <td>邮箱:</td>
              <td><input type="text" class="input" name="user_email" value=""></td>
            </tr>
            <tr>
              <td>角色:</td>
              <td>
 				<select name="role_id"  class="normal_select">
 					<?php if(is_array($roles)): foreach($roles as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                  
                </select>
				</td>
            </tr>
           
            
          </tbody>
        </table>
      </div>
      <div class="form-actions">
            <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
            <a class="btn" href="/Admin/User">返回</a>
      </div>
    </form>
  </div>
</div>
<script src="/statics/js/common.js"></script>
</body>
</html>