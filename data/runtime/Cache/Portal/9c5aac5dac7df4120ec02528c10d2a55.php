<?php if (!defined('THINK_PATH')) exit();?><div class="container">
	<?php $home_slides = sp_getslide("sliders"); ?>
	<ul id="homeslider" class="unstyled">
		<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
			<div class="caption-wraper">
				<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
			</div>
			<a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
		</li><?php endforeach; endif; ?>
	</ul>
	<div class="lastnews">
		<h3> 今日聚焦 </h3>
		<span class="hr"></span>
		<?php $hot_articles = sp_sql_posts("field:post_title,tid;order:post_hits desc;limit:7;"); ?>
		<hr>
		<ul>
			<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): ?><li><a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="block1">
		<div>
			<h3> 企 业 </h3>
			<img src="http://ahwenhui.com/statics/images/qy.png">
			<ul>
				<?php if(is_array($companys)): $i = 0; $__LIST__ = $companys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a  target="_blank" title="<?php echo ($vo["name"]); ?>" href="<?php echo u('company/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div>
			<h3> 项 目 </h3>
			<?php $xm = sp_sql_posts("cid:22;order:post_date DESC;",3); ?>
			<img src="http://ahwenhui.com/statics/images/xmbg.png">
			
			<ul>
				<?php if(is_array($xm)): $i = 0; $__LIST__ = $xm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div>
			<h3> 活 动 </h3>
			<?php $hd = sp_sql_posts("cid:23;order:post_date DESC;",3); ?>
			<img src="http://ahwenhui.com/statics/images/hdbg.png">
			<ul>
				<?php if(is_array($hd)): $i = 0; $__LIST__ = $hd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<a href=""><img src="http://ahwenhui.com/statics/images/adv.png" width="100%"></a>

	<div class="row-fluid">
	 	<div class="w790 pull-left">
	 		<ul class="cats">
				<li><a ng-class="{active: $stateParams.Id == '14'}" ui-sref="index.content({Id:14})">电商新闻</a></li>
				<li><a ng-class="{active: $stateParams.Id == '15'}" ui-sref="index.content({Id:15})">行业数据</a></li>
				<li><a ng-class="{active: $stateParams.Id == '16'}" ui-sref="index.content({Id:16})">人物观点</a></li>
				<li><a ng-class="{active: $stateParams.Id == '17'}" ui-sref="index.content({Id:17})">典型案例</a></li>
				<li><a ng-class="{active: $stateParams.Id == '18'}" ui-sref="index.content({Id:18})">电商干货</a></li>
				<li><a ng-class="{active: $stateParams.Id == '19'}" ui-sref="index.content({Id:19})">电商专题</a></li>
	 		</ul>
	        <div class="j-hotspotWrap ml20 slide-left" ui-view="subview">
	        	<?php $cat_id = intval($_GET['id']) ? intval($_GET['id']):3; $posts = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",6); ?>
<?php if (!empty($posts['posts'])) { ?>
<?php if(is_array($posts['posts'])): foreach($posts['posts'] as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $keywords = explode(" ",$vo['post_keywords']); ?>
<div class="j-hotspot">
	<div class="j-hotspotTil clearfix">
		<h3 class="h3">
			<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>" class="a-title"><?php echo ($vo["post_title"]); ?></a>
		</h3>
	</div>
	<div class="clearfix mb30">
		<div class="j-hotspotPic">
			<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
				<?php if ($smeta['thumb']) { ?>
					<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
				<?php } else { ?>
					<img src="http://ahwenhui.com/statics/images/default_tupian1.png">
				<?php } ?>
			</a>
		</div>
		<div class="j-hotspotInfo">
			<p class="j-hotspotA">
				<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_excerpt"]); ?></a>
			</p>
			<p class="j-hotspotLink">
				<?php foreach ($keywords as $key => $value): ?>
					<a target="_blank" href="<?php echo u('list/keyword',array('id'=>$value));?>"><?php echo ($value); ?></a>
				<?php endforeach ?>
			</p>
		</div>
	</div>
</div><?php endforeach; endif; ?>
<div class="pagination text-right">
	<ul>
		<?php echo ($posts['page']); ?>
	</ul>
</div>
<?php }else { ?>
<div class="j-hotspot" style="width: 730px;text-align:center;">
	<div class="j-hotspotTil clearfix">
		<h1>暂无新闻</h1>
	</div>
</div>
<?php } ?>
	        </div>
	    </div>
	    <div class="w380 pull-right">
	    	<div class="content1">
		 		<h3> 动 态 </h3>
				<span class="hx"></span>
				<?php $dt = sp_sql_posts("cid:25;order:post_date DESC;",8); ?>
				<ul>
					<?php if(is_array($dt)): $i = 0; $__LIST__ = $dt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<h3> 政 策 </h3>
				<span class="hx"></span>
				<?php $zc = sp_sql_posts("cid:26;order:post_date DESC;",8); ?>
				<ul>
					<?php if(is_array($zc)): $i = 0; $__LIST__ = $zc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<h3> 公 告 </h3>
				<span class="hx"></span>
				<?php $gg = sp_sql_posts("cid:26;order:post_date DESC;",8); ?>
				<div class="imgblock">
					<?php if(is_array($gg)): $i = 0; $__LIST__ = array_slice($gg,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta = json_decode($vo['smeta'],true); ?>
						<li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
							<?php if ($smeta['thumb']) { ?>
								<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
							<?php } else { ?>
								<img src="http://ahwenhui.com/statics/images/default_tupian1.png">
							<?php } ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<ul>
					<?php if(is_array($gg)): $i = 0; $__LIST__ = array_slice($gg,1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<h3> 服 务 </h3>
				<span class="hx"></span>
				<?php $fw = sp_sql_posts("cid:29;order:post_date DESC;",8); ?>
				<ul>
					<?php if(is_array($fw)): $i = 0; $__LIST__ = $fw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<a target="_blank" href="<?php echo u('user/register/index');?>">
				<img src="http://ahwenhui.com/statics/images/wl.png" width="100%">
			</a>
			<div class="contact">
				<h3> 联系方式 </h3>
				<span class="hx" style="width:250px;"></span>
				<blockquote class="clearfix">
					<span>频道总监：李星慧</span>
					<span>策划、编辑：连晓佳、徐茜茜、宋丽娜</span>
					<span>实习编辑：卓树理</span>
					<span>热线：0571-85310598 0571-85311743</span>
					<span>频道QQ：1753904095</span>
				</blockquote>
			</div>
	    </div>
    </div>

    <div class="jcsj">
		<?php $jcsj = sp_getslide("jcsj"); ?>
		<?php if(is_array($jcsj)): foreach($jcsj as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
    </div>

    <div class="link">
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y1.png"></a>
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y2.png"></a>
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y3.png"></a>
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y4.png"></a>
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y5.png"></a>
		<a target="_blank" href=""><img src="http://ahwenhui.com/statics/images/y6.png"></a>
    </div>
</div>
<link href="http://ahwenhui.com/statics/js/slippry/slippry.css" rel="stylesheet">
<script src="http://ahwenhui.com/statics/js/slippry/slippry.min.js"></script>
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