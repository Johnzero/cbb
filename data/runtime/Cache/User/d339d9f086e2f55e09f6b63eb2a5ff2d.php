<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span3">
			<div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-list-alt"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/avatar');?>"><i class="fa fa-user"></i> 编辑头像</a>
	<!-- <a class="list-group-item" href="<?php echo u('user/profile/bang');?>"><i class="fa fa-exchange"></i> 绑定账号</a> -->
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>
</div>
		</div>
		<div class="span9">
			<div class="tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-exchange"></i> 绑定账号</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="one">
						<?php if(!empty($oauths['qq'])): ?><button class="btn"><i class="fa fa-qq"></i> 已绑定腾讯QQ账号</button>
						<?php else: ?>
						<a class="btn btn-primary" href="<?php echo U('api/oauth/bang',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> 绑定腾讯QQ账号</a><?php endif; ?>
						<?php if(!empty($oauths['sina'])): ?><button class="btn"><i class="fa fa-weibo"></i> 已绑定新浪微博账号</button>
						<?php else: ?>
						<a class="btn btn-primary" href="<?php echo U('api/oauth/bang',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> 绑定新浪微博账号</a><?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>