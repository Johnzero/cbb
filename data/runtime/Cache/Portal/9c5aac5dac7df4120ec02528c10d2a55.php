<?php if (!defined('THINK_PATH')) exit(); $home_slides=sp_getslide("sliders"); ?>
<ul id="homeslider" class="unstyled">
	<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
		<div class="caption-wraper">
			<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
		</div>
		<a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
	</li><?php endforeach; endif; ?>
</ul>
<div class="container">
	<div>
		<h1 class="text-center">快速了解ThinkCMF</h1>
		<h3 class="text-center">Quickly understand the ThinkCMF</h3>
	</div>
	<div class="row">
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-bars"></i> MVC分层模式</h2>
			<p>使用MVC应用程序被分成三个核心部件：模型（M）、视图（V）、控制器（C），他不是一个新的概念，只是ThinkCMF将其发挥到了极致。</p>
		</div>
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-group"></i> 用户管理</h2>
			<p>ThinkCMF内置了灵活的用户管理方式，并可直接与第三方站点进行互联互通，如果你愿意甚至可以对单个用户或群体用户的行为进行记录及分享，为您的运营决策提供有效参考数据。</p>
		</div>
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-cloud"></i> 云端部署</h2>
			<p>通过驱动的方式可以轻松支持云平台的部署，让你的网站无缝迁移，内置已经支持SAE、BAE，正式版将对云端部署进行进一步优化。</p>
		</div>
	</div>
	
	<div class="row">
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-heart"></i> 安全策略</h2>
			<p>提供的稳健的安全策略，包括备份恢复，容错，防治恶意攻击登陆，网页防篡改等多项安全管理功能，保证系统安全，可靠，稳定的运行。</p>
		</div>
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-cubes"></i> 应用模块化</h2>
			<p>提出全新的应用模式进行扩展，不管是你开发一个小功能还是一个全新的站点，在ThinkCMF中你只是增加了一个APP，每个独立运行互不影响，便于灵活扩展和二次开发。</p>
		</div>
		<div class="span4">
			<h2 class="font-large nospace"><i class="fa fa-certificate"></i> 免费开源</h2>
			<p>代码遵循Apache2开源协议，免费使用，对商业用户也无任何限制。</p>
		</div>
	</div>
	
	<div>
		<h1 class="text-center">最新资讯</h1>
		<h3 class="text-center">Last News</h3>
	</div>
	<?php $lastnews=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
	<div class="row">
		<?php if(is_array($lastnews)): foreach($lastnews as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
		<div class="span3">
			<div class="tc-gridbox">
				<div class="header">
					<div class="item-image">
						<a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>">
							<?php if(empty($smeta['thumb'])): ?><img src="/tpl/default/Public/images/default_tupian1.png" class="img-responsive" alt="<?php echo ($vo["post_title"]); ?>"/>
							<?php else: ?>
							<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" class="img-responsive img-thumbnail" alt="<?php echo ($vo["post_title"]); ?>" /><?php endif; ?>
						</a>
					</div>
					<h3><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h3>
					<hr>
				</div>
				<div class="body">
					<p><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo msubstr($vo['post_excerpt'],0,32);?></a></p>
				</div>
			</div>
		</div><?php endforeach; endif; ?>
	</div>
</div>
</div>

<link href="/tpl/default/Public/css/slippry/slippry.css" rel="stylesheet">
<script src="/tpl/default/Public/js/slippry.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	var demo1 = $("#homeslider").slippry({
		transition: 'fade',
		useCSS: true,
		captions: false,
		speed: 1000,
		pause: 3000,
		auto: true,
		preload: 'visible'
	});
})
</script>