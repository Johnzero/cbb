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
<style>
body.dragging, body.dragging * {
  cursor: move !important;
}
.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}
</style>
    <body class="J_scroll_fixed">
        <div class="wrap J_check_wrap">
            <ul class="nav nav-tabs">
                <li class="active"><a href="<?php echo U('Focus/index');?>">今日聚焦</a></li>
                <li><a href="<?php echo U('Focus/set');?>">添加新闻</a></li>
            </ul>
        <form class="J_ajaxForm" action="" method="post">
            <div class="table_list">
                <table width="100%" class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>标题</th>
                            <th>链接</th>
                            <th width="120">操作</th>
                        </tr>
                    </thead>
                    <tbody class="sortable">
                        <?php if(is_array($focus)): foreach($focus as $key=>$vo): ?><tr data-value="<?php echo ($vo["id"]); ?>">
                                <td><?php echo ($vo["id"]); ?></td>
                                <td><a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
                                <td><?php echo ($vo["url"]); ?></td>
                                <td>
                                    <a href="<?php echo U('Focus/set',array('id'=>$vo['id']));?>">修改</a> |
                                    <a href="<?php echo U('Focus/delete',array('id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                    </tbody>
            </table>
            <div class="p10"><div class="pages">  </div> </div>
            
        </div>
    </form>
</div>
<script src="http://ahwenhui.com/statics/js/common.js?"></script>
<link href="http://ahwenhui.com/statics/js/jquery-ui/jquery-ui.css" rel="stylesheet">
<script src="http://ahwenhui.com/statics/js/jquery-ui/jquery-ui.js"></script>
<script>
    $(function  () {
        var orders = new Array();
        $(".sortable").sortable({stop: function( event, ui ) {
            $(".sortable tr").each(function () {
                orders.push($(this).data("value"));
            })
            $.post("<?php echo U('Focus/listorders');?>", { 'orders[]': orders }, function(data) {
            });
            orders = new Array();
        }}).disableSelection();
    })
</script>

<script>
setCookie('refersh_time', 0);
function refersh_window() {
var refersh_time = getCookie('refersh_time');
if (refersh_time == 1) {
window.location.reload();
}
}
setInterval(function(){
refersh_window()
}, 3000);
$(function () {
$("#selected_cid").change(function(){
$("#cid_form").submit();
});
});
</script>
</body>
</html>