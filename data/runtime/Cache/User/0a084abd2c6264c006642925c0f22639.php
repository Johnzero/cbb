<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span3">
			<div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-list-alt"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/avatar');?>"><i class="fa fa-user"></i> 编辑头像</a>
	<a class="list-group-item" href="<?php echo u('user/profile/bang');?>"><i class="fa fa-exchange"></i> 绑定账号</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>
</div>
		</div>
		<div class="span9">
			<div class="tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-star"></i> 我的收藏</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="one">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>标题</th>
									<th>描述</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($favorites)): foreach($favorites as $key=>$vo): ?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["title"]); ?></td>
									<td><?php echo ($vo["description"]); ?></td>
									<td><a href="<?php echo ($vo["url"]); ?>">查看</a> | <a class="J_ajax_dialog_btn" href="<?php echo u('user/favorite/delete_favorite',array('id'=>$vo['id']));?>" data-msg="您确定要取消收藏吗？" data-ok="" data-cacel="取消">取消收藏</a></td>
								</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>