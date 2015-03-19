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
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('menu/index');?>">后台菜单</a></li>
     <li class="active"><a href="<?php echo U('menu/add');?>">添加菜单</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Menu/add_post');?>">
      <div class="table_list">
        <table cellpadding="2" cellspacing="2" width="100%">
          <tbody>
            <tr>
              <td width="180">上级:</td>
              <td><select name="parentid" class="normal_select">
                  <option value="0">作为一级菜单</option>
                  
                     <?php echo ($select_categorys); ?>
                
                </select></td>
            </tr>
            <tr>
              <td>名称:</td>
              <td><input type="text" class="input" name="name" value=""><span class="must_red">*</span></td>
            </tr>
            <tr>
              <td>应用:</td>
              <td><input type="text" class="input" name="app" id="app" value=""><span class="must_red">*</span></td>
            </tr>
            <tr>
              <td>模块:</td>
              <td><input type="text" class="input" name="model" id="model" value=""><span class="must_red">*</span></td>
            </tr>
            <tr>
              <td>方法:</td>
              <td><input type="text" class="input" name="action" id="action" value=""><span class="must_red">*</span></td>
            </tr>
            <tr>
              <td>参数:</td>
              <td><input type="text" class="input length_5" name="data" value="">
                例:id=3&amp;p=3</td>
            </tr>
            <tr>
              <td>图标:</td>
              <td><input type="text" class="input" name="icon" id="action" value=""></td>
            </tr>
            <tr>
              <td>备注:</td>
              <td><textarea name="remark" rows="5" cols="57"></textarea></td>
            </tr>
            <tr>
              <td>状态:</td>
              <td><select name="status" class="normal_select">
                  <option value="1">显示</option>
                  <option value="0">隐藏</option>
                </select></td>
            </tr>
            <tr>
              <td>类型:</td>
              <td><select name="type" class="normal_select">
                  <option value="1" selected>权限认证+菜单</option>
                  <option value="0" >只作为菜单</option>
                </select>
                注意：“权限认证+菜单”表示加入后台权限管理，纯碎是菜单项请不要选择此项。</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary btn_submit  J_ajax_submit_btn">添加</button>
        <a class="btn" href="/Admin/Menu">返回</a>
      </div>
    </form>
  </div>
</div>
<script src="http://ahwenhui.com/statics/js/common.js"></script>
</body>
</html>