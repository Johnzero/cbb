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
<div class="wrap J_check_wrap">
   <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('user/index');?>">管理员</a></li>
     <li><a href="<?php echo U('user/add');?>">添加管理员</a></li>
  </ul>
   <div class="table_list">
   <table width="100%" cellspacing="0" class="table table-hover">
        <thead>
          <tr>
            <th width="50">ID</th>
            <th>用户名</th>
            <th>所属角色</th>
            <th>最后登录IP</th>
            <th>最后登录时间</th>
            <th>E-mail</th>
            <th width="120">管理操作</th>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr>
            <td><?php echo ($vo["id"]); ?></td>
            <td><?php echo ($vo["user_login"]); ?></td>
            <td><?php echo ($roles[$vo['role_id']]['name']); ?></td>
            <td><?php echo ($vo["last_login_ip"]); ?></td>
            <td>
	            <?php if($vo['last_login_time'] == 0): ?>该用户还没登陆过
	            <?php else: ?>
	            <?php echo ($vo["last_login_time"]); endif; ?>
            </td>
            <td><?php echo ($vo["user_email"]); ?></td>
            <td>
	            <?php if($vo['id'] == 1): ?><font color="#cccccc">修改</font> | 
	            <font color="#cccccc">删除</font>
	            <?php else: ?>
	            <a href='<?php echo U("user/edit",array("id"=>$vo["id"]));?>'>修改</a> | 
	            <a class="J_ajax_del" href="<?php echo U('user/delete',array('id'=>$vo['id']));?>">删除</a><?php endif; ?>
            </td>
          </tr><?php endforeach; endif; ?>
        </tbody>
      </table>
   </div>
</div>
<script src="/statics/js/common.js"></script>
</body>
</html>