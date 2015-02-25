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

	<link href="http://wangsong.com/statics/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="http://wangsong.com/statics/css/simplebootadmin.css" rel="stylesheet">
    <link href="http://wangsong.com/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="http://wangsong.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="http://wangsong.com/statics/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "http://wangsong.com/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://wangsong.com/statics/js/jquery.js"></script>
    <script src="http://wangsong.com/statics/js/jquery-migrate-1.2.1.js"></script>
    <script src="http://wangsong.com/statics/js/wind.js"></script>
    <script src="http://wangsong.com/statics/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('slidecat/index');?>">幻灯片分类</a></li>
     <li class="active"><a href="<?php echo U('slidecat/add');?>">添加幻灯片分类 </a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('slidecat/add_post');?>">
      <div class="table_list">
        <table cellpadding="2" cellspacing="2"  width="100%">
          <tbody>
            <tr>
              <td>分类名称:</td>
              <td><input type="text" class="input" name="cat_name" value=""><span class="must_red">*</span></td>
            </tr>
            <tr>
              <td>分类标识:</td>
              <td><input type="text" class="input" name="cat_idname" value=""><span class="must_red">*</span><span style="margin-left:15px;">英文字母+数字+“_”</span></td>
            </tr>
            <tr>
              <td>备注:</td>
              <td><textarea name="cat_remark" rows="5" cols="57"><?php echo ($remark); ?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="form-actions">
           <button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">添加</button>
      		<a class="btn" href="/Admin/Slidecat">返回</a>
      </div>
    </form>
  </div>
</div>
<script src="http://wangsong.com/statics/js/common.js"></script>
</body>
</html>