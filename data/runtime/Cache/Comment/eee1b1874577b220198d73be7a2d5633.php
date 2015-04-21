<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span3">
			<div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-edit"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/company');?>"><i class="fa fa-shield"></i> 企业认证</a>
	<a class="list-group-item" href="<?php echo u('user/post/index');?>"><i class="fa fa-file-text-o"></i> 我的投稿</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>

</div>
		</div>
		<div class="span9">
			<div class="tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-comments-o"></i> 我的评论</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="one">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>评论内容</th>
									<th width="150">评论时间</th>
									<th width="150">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["content"]); ?></td>
									<td><?php echo ($vo["createtime"]); ?></td>
									<td>
										<a href="http://www.ahwenhui.com/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
										<!-- | <a class="J_ajax_dialog_btn" href="<?php echo u('user/favorite/delete_favorite',array('id'=>$vo['id']));?>" data-msg="您确定要取消收藏吗？" data-ok="" data-cacel="取消">取消收藏</a> -->
									</td>
								</tr><?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
					
					<div class="pager"><?php echo ($pager); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>