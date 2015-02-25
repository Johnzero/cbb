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
<body class="J_scroll_fixed" style="min-width:800px;">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('company/index');?>">全部认证</a></li>
  </ul>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	          <tr>
	            <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
	            <th width="50">ID</th>
	            <th>企业名称</th>
	            <th>联系人姓名</th>
	            <th>联系人电话</th>
	            <th>营业执照号</th>
	            <th>组织机构代码</th>
	            <th><span>更新时间</span></th>
	            <th><span>状态</span></th>
	            <th width="120">操作</th>
	          </tr>
        </thead>
        	<?php $status=array("1"=>"√","0"=>"<span style='color:red;'>未审核</span>"); ?>
        	<?php if(is_array($companys)): foreach($companys as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" ></td>
		            <td><?php echo ($vo["id"]); ?></td>
		            <td><?php echo ($vo["name"]); ?></td>
		            <td><?php echo ($vo["contact"]); ?></td>
		            <td><?php echo ($vo["ctel"]); ?></td>
		            <td><?php echo ($vo["code"]); ?></td>
		            <td><?php echo ($vo["group"]); ?></td>
		            <td><?php echo date('Y-m-d H:i:s', $vo['create_time']);?></td>
		            <td><?php echo ($status[$vo['authorize']]); ?></td>
		            <td>
		            	<a href="<?php echo U('company/detail',array('id'=>$vo['id']));?>">查看详细</a>
						  &nbsp;|&nbsp;  
		            	<a href="<?php echo U('company/delete',array('id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($pager); ?></div>
     
    </div>
    <div class="form-actions">
        <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>                
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('company/check',array('check'=>1));?>" data-subcheck="true">审核</button>
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('company/check',array('uncheck'=>1));?>" data-subcheck="true">取消审核</button>
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('company/delete');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
    </div>
  </form>
</div>
<script src="http://wangsong.com/statics/js/common.js"></script>
</body>
</html>