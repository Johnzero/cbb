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
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="javascript:;">页面回收</a></li>
  </ul>
  <form class="well form-search"  method="post" action="<?php echo u('AdminPage/recyclebin');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ($formget["start_time"]); ?>" style="width:80px;" autocomplete="off">-<input autocomplete="off" type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:80px;">
                           关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入关键字...">
        <button class="btn">搜索</button>
        </span>
      </div>
    </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <td width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></td>
	            <td width="100">ID</td>
	            <td>标题</td>
	            <!-- <td>点击量</td> -->
	            <td width="80">发布人</td>
	            <td width="120"><span>发布时间</span></td>
	            <td width="120">操作</td>
	          </tr>
        </thead>
        	<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>"></td>
		            <td><a><?php echo ($vo["id"]); ?></a></td>
		            <td>
		            	<span><?php echo ($vo["post_title"]); ?></span>
		            </td>
		            <!-- <td>0</td> -->
		            <td><?php echo ($users[$vo['post_author']]['user_login']); ?></td>
		            <td><?php echo ($vo["post_date"]); ?></td>
		            <td>
		            	<a href="<?php echo U('AdminPage/restore',array('id'=>$vo['id']));?>" class="J_ajax_dialog_btn"  data-msg="确定还原吗？">还原</a>|
		            	<a href="<?php echo U('AdminPage/clean',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
      		<div class="pagination"><?php echo ($Page); ?></div>
     
    </div>
     <div class="form-actions">
        <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>                
        <button class="btn J_ajax_submit_btn btn-primary" type="submit" data-action="<?php echo U('AdminPage/clean');?>" data-subcheck="true">删除</button>
      </div>
  </form>
</div>
<script src="http://www.ahwenhui.com/statics/js/common.js"></script>
</body>
</html>