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

	<link href="http://ciec.anhuinews.com/statics/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="http://ciec.anhuinews.com/statics/css/simplebootadmin.css" rel="stylesheet">
    <link href="http://ciec.anhuinews.com/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="http://ciec.anhuinews.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="http://ciec.anhuinews.com/statics/font-awesome/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "http://ciec.anhuinews.com/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ciec.anhuinews.com/statics/js/jquery.js"></script>
    <script src="http://ciec.anhuinews.com/statics/js/jquery-migrate-1.2.1.js"></script>
    <script src="http://ciec.anhuinews.com/statics/js/wind.js"></script>
    <script src="http://ciec.anhuinews.com/statics/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="<?php echo U('AdminPost/recyclebin');?>">文章回收</a></li>
  </ul>
  <form class="well form-search" method="post" action="<?php echo u('AdminPost/recyclebin');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">分类：
        <select class="select_2" name="term">
          	<option value='0' >全部</option>
          	<?php echo ($taxonomys); ?>
        </select>
        &nbsp;&nbsp;时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="<?php echo ($formget["start_time"]); ?>" style="width:80px;" autocomplete="off">-<input type="text" class="input length_2 J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width:80px;" autocomplete="off">
               &nbsp; &nbsp;关键字：
        <input type="text" class="input length_2" name="keyword" style="width:200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入关键字...">
        <input type="submit" class="btn" value="搜索"/>
        </span>
      </div>
    </div>
  </form>
  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
	           <tr>
	            <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
	            <th width="100">ID</th>
	            <th>标题</th>
	            <!-- <th>点击量</th> -->
	            <th width="80">发布人</th>
	            <th width="120"><span>发布时间</span></th>
	            <th width="140">状态</th>
	            <th width="120">操作</th>
	          </tr>
        </thead>
        	<?php $status=array("1"=>"已审核","0"=>"未审核"); ?>
        	<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
		            <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[<?php echo ($vo["tid"]); ?>]" value="<?php echo ($vo["id"]); ?>" ></td>
		            <td><a><?php echo ($vo["tid"]); ?></a></td>
		            <td><a target="_blank">
		            	<span style="" ><?php echo ($vo["post_title"]); ?></span></a>
		            </td>
		            <!-- <td>0</td> -->
		            <td><?php echo ($users[$vo['post_author']]['user_login']); ?></td>
		            <td><?php echo ($vo["post_date"]); ?></td>
		            <td><?php echo ($status[$vo['post_status']]); ?></td>
		            <td>
		            	<a href="<?php echo U('AdminPost/restore',array('term'=>empty($term['term_id'])?'':$term['term_id'],'id'=>$vo['tid']));?>" class="J_ajax_dialog_btn"  data-msg="确定还原吗？">还原</a>|
		            	<a href="<?php echo U('AdminPost/clean',array('term'=>empty($term['term_id'])?'':$term['term_id'],'tid'=>$vo['tid'],'id'=>$vo['id']));?>" class="J_ajax_del" >删除</a>
					</td>
	          	</tr><?php endforeach; endif; ?>
          </table>
      		<div class="pagination"><?php echo ($Page); ?></div>
     
    </div>
    <div class="form-actions">
        <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>                
        <button class="btn J_ajax_submit_btn btn-primary" type="submit" data-action="<?php echo u('AdminPost/clean');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
      </div>
  </form>
</div>
<script src="http://ciec.anhuinews.com/statics/js/common.js"></script>
<script>

function refersh_window() {
    var refersh_time = getCookie('refersh_time');
    if (refersh_time == 1) {
        window.location.reload();
    }
}
setInterval(function(){
	refersh_window();
}, 2000);
$(function () {
	setCookie("refersh_time",0);
    Wind.use('ajaxForm','artDialog','iframeTools', function () {
        //批量移动
        $('#J_Content_remove').click(function (e) {
            var str = 0;
            var id = tag = '';
            $("input[name='ids[]']").each(function () {
                if ($(this).attr('checked')) {
                    str = 1;
                    id += tag + $(this).val();
                    tag = ',';
                }
            });
            if (str == 0) {
				art.dialog.through({
					id:'error',
					icon: 'error',
					content: '您没有勾选信息，无法进行操作！',
					cancelVal: '关闭',
					cancel: true
				});
                return false;
            }
            var $this = $(this);
            art.dialog.open("<?php echo u('AdminPost/move');?>&ids=" + id, {
                title: "批量移动"
            });
        });
    });
});


</script>
</body>
</html>