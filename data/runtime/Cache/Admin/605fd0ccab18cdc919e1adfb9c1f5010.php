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

	<link href="http://www.ahwenhui.com/statics/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="http://www.ahwenhui.com/statics/css/simplebootadmin.css" rel="stylesheet">
    <link href="http://www.ahwenhui.com/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="http://www.ahwenhui.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="http://www.ahwenhui.com/statics/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "http://www.ahwenhui.com/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://www.ahwenhui.com/statics/js/jquery.js"></script>
    <script src="http://www.ahwenhui.com/statics/js/jquery-migrate-1.2.1.js"></script>
    <script src="http://www.ahwenhui.com/statics/js/wind.js"></script>
    <script src="http://www.ahwenhui.com/statics/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>

<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('Admin/backup/index');?>">数据备份</a></li>
  </ul>
  <div class="common-form">
        <form action="<?php echo U('Admin/backup/index_post');?>" method="post">
	        <div class="table_list">
	        <table width="100%" cellspacing="0" class="table_form">
	            <tr>
	        	    <td width="150" align="right">每个分卷文件大小 :</td>
	        	    <td>
	                    <input type="text" name="sizelimit" class="input" value="<?php echo ($sizelimit); ?>" size="10"> K
	                    &nbsp;&nbsp;(推荐10M以下)
	                </td>
	          	</tr>
	            <tr>
	        	    <td align="right">备份名称 :</td>
	        	    <td><input type="text" name="backup_name" class="input" value="<?php echo ($backup_name); ?>"></td>
	          	</tr>
	            <tr>
	        	    <td align="right">备份类型 :</td>
	        	    <td>
	                	<label><input type="radio" checked="checked" value="full" name="backup_type" onclick="javascript:$('#J_showtables').hide();"> 全部备份<font class="gray">备份数据库所有表</font> &nbsp;&nbsp;</label>
	                    <label><input type="radio" value="custom" name="backup_type" onclick="javascript:$('#J_showtables').show();"> 自定义备份<font class="gray">根据自行选择备份数据表</font></label>
	                </td>
	          	</tr>
	            <tr id="J_showtables">
	                <td align="right">
	                    <label><input name="selectall" type="checkbox" checked="checked" value="" onclick="javascript:$('.J_checkitem').attr('checked', this.checked);" /> 选择全部 :</label>
	                </td>
	                <td colspan="2">
	                    <?php if(is_array($tables)): $i = 0; $__LIST__ = $tables;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><label class="checkbox inline" style="width:200px;"><input name="backup_tables[<?php echo ($val); ?>]" type="checkbox" value="-1" checked="checked" class="J_checkitem" />&nbsp;&nbsp;<?php echo ($val); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
	                </td>
	            </tr>
	          	<tr>
	        	    <td></td>
	        	    <td><input type="submit" name="dosubmit" value=" 开始备份数据 " class="btn btn_submit btn-primary"></td>
	          	</tr>
	        </table>
	        </div>
        </form>
    </div>
</div>
<style type="text/css">
#J_showtables{display:none;}
.checkbox.inline{
	margin-left: 10px;
}
</style>
<script src="http://www.ahwenhui.com/statics/js/common.js"></script>
</body>
</html>