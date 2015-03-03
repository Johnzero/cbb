<?php if (!defined('THINK_PATH')) exit();?><div class="container">
	<?php $home_slides = sp_getslide("sliders"); ?>
	<ul id="homeslider" class="unstyled">
		<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
			<div class="caption-wraper">
				<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
			</div>
			<a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
		</li><?php endforeach; endif; ?>
	</ul>
	<div class="lastnews">
		<h3> 今日聚焦 </h3>
		<span class="hr"></span>
		<?php $hot_articles = sp_sql_posts("field:post_title,tid;order:post_hits desc;limit:7;"); ?>
		<hr>
		<ul>
			<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): ?><li><a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="block1">
		<div>
			<h3> 企 业 </h3>
			<img src="http://wangsong.com/statics/images/qy.png">
			<ul>
				<li>
					<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
				</li>
				<li>
					<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
				</li>
				<li>
					<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
				</li>
			</ul>
		</div>
		<div>
			<h3> 项 目 </h3>
			<img src="http://wangsong.com/statics/images/qy.png">
			<ul>
				<li>
					<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
				</li>
				<li>
					<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
				</li>
				<li>
					<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
				</li>
			</ul>
		</div>
		<div>
			<h3> 活 动 </h3>
			<img src="http://wangsong.com/statics/images/qy.png">
			<ul>
				<li>
					<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
				</li>
				<li>
					<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
				</li>
				<li>
					<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
				</li>
			</ul>
		</div>
	</div>
	<a href=""><img src="http://wangsong.com/statics/images/adv.png" width="100%"></a>

	<div class="row-fluid">
	 	<div class="w790 pull-left">
	 		<ul class="cats">
				<li><a ui-sref="index.content({Id:14})">电商新闻</a></li>
				<li><a ui-sref="index.content({Id:15})">行业数据</a></li>
				<li><a ui-sref="index.content({Id:16})">人物观点</a></li>
				<li><a ui-sref="index.content({Id:17})">典型案例</a></li>
				<li><a ui-sref="index.content({Id:18})">电商干货</a></li>
				<li><a ui-sref="index.content({Id:19})">电商专题</a></li>
	 		</ul>
	        <div class="j-hotspotWrap ml20 slide-left" ui-view="subview">
	        	<?php $cat_id = intval($_GET['id']) ? intval($_GET['id']):3; $posts = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",6); ?>
<?php if (!empty($posts['posts'])) { ?>
<?php if(is_array($posts['posts'])): foreach($posts['posts'] as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $keywords = explode(" ",$vo['post_keywords']); ?>
<div class="j-hotspot">
	<div class="j-hotspotTil clearfix">
		<h3 class="h3">
			<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>" class="a-title"><?php echo ($vo["post_title"]); ?></a>
		</h3>
	</div>
	<div class="clearfix mb30">
		<div class="j-hotspotPic">
			<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
				<?php if ($smeta['thumb']) { ?>
					<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
				<?php } else { ?>
					<img src="http://wangsong.com/statics/images/default_tupian1.png">
				<?php } ?>
			</a>
		</div>
		<div class="j-hotspotInfo">
			<p class="j-hotspotA">
				<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_excerpt"]); ?></a>
			</p>
			<p class="j-hotspotLink">
				<?php foreach ($keywords as $key => $value): ?>
					<a href="<?php echo u('list/keyword',array('id'=>$value));?>"><?php echo ($value); ?></a>
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
				<ul>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
				</ul>
				<h3> 政 策 </h3>
				<span class="hx"></span>
				<ul>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
				</ul>
				<h3> 公 告 </h3>
				<span class="hx"></span>
				<div class="imgblock">
					<img src="http://wangsong.com/statics/images/default_tupian1.png">
					<img src="http://wangsong.com/statics/images/default_tupian1.png">
				</div>
				<ul>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
				</ul>
				<h3> 人 才 </h3>
				<span class="hx"></span>
				<ul>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
					<li>
						<a title="百度宣布转型成功：移动搜索收入首超PC" href="/article/index/id/15.html">百度宣布转型成功：移动搜索收入首超PC</a>
					</li>
					<li>
						<a title="断崖式跌落，阿里股价去泡沫化的开始？" href="/article/index/id/1.html">断崖式跌落，阿里股价去泡沫化的开始？</a>
					</li>
					<li>
						<a title="2015年中国A股上市互联网企业发展情况预测" href="/article/index/id/11.html">2015年中国A股上市互联网企业发展情况预测</a>
					</li>
				</ul>
			</div>
			<a href="<?php echo u('user/register/index');?>">
				<img src="http://wangsong.com/statics/images/wl.png" width="100%">
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
		<?php if(is_array($jcsj)): foreach($jcsj as $key=>$vo): ?><a href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
    </div>

    <div class="link">
		<a href=""><img src="http://wangsong.com/statics/images/y1.png"></a>
		<a href=""><img src="http://wangsong.com/statics/images/y2.png"></a>
		<a href=""><img src="http://wangsong.com/statics/images/y3.png"></a>
		<a href=""><img src="http://wangsong.com/statics/images/y4.png"></a>
		<a href=""><img src="http://wangsong.com/statics/images/y5.png"></a>
		<a href=""><img src="http://wangsong.com/statics/images/y6.png"></a>
    </div>
</div>
<link href="http://wangsong.com/statics/js/slippry/slippry.css" rel="stylesheet">
<script src="http://wangsong.com/statics/js/slippry/slippry.min.js"></script>
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