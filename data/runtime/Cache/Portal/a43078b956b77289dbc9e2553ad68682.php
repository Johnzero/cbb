<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{
		height:auto !important;
		width:100%;
	}
	#article_content {word-wrap: break-word;}
	#layout {
		background: #E4E4E4 !important;
	}
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span8">
			<div class="tc-box article-box">
				<div class="common_block_title">
					<h2><?php echo ($post_title); ?></h2>
					<?php $keywords = explode(" ",$post_keywords); $date = date('Y-m-d',strtotime($post_date)); ?>
					<div class="article-infobox">
						<span>分类：<a href="/list/index/id/<?php echo ($term["term_id"]); ?>.html"><?php echo ($term["name"]); ?></a> </span>
						<span>关键词：
							<?php foreach ($keywords as $key => $value): ?>
								<a href="<?php echo u('list/keyword',array('id'=>$value));?>"><?php echo ($value); ?></a>
							<?php endforeach ?>
						</span>
						<span>时间：<a><?php echo ($date); ?></a> </span>
						<span>阅读：<a><?php echo ($post_hits); ?></a> 次 </span>
					</div>
				</div>
				<hr/>
				<div id="article_content">
					<?php echo ($post_content); ?>
					<div class="bdsharebuttonbox bdshare-button-style0-16"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
					<hr/>
				</div>
			</div>
		</div>
		<div class="span4">
			<div class="tc-box">
	<div class="common_block_border blog_position">
		<div class="common_block_title_right">
			热门标签
		</div>
		<?php $hot_tags = sp_sql_tags("limit:10;"); ?>
		<div class="category_right_list">
			<ul>
				<?php foreach ($hot_tags as $key => $value): ?>
					<li>
						<a href="<?php echo u('list/keyword',array('id'=>$key));?>"><?php echo ($key); ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>

<div class="tc-box">
	<div class="common_block_border blog_position">
		<div class="common_block_title_right">
			热门文章
		</div>
		<?php $hot_articles = sp_sql_posts("field:post_title,post_hits,post_excerpt,post_date,tid,smeta;order:post_hits desc;limit:5;"); ?>
		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $date = date('Y-m-d',strtotime($vo['post_date'])); ?>
		<div class="clearfix" style="position: relative">
			<div class="common_block_left">
				<a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
					<?php if ($smeta['thumb']) { ?>
					<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
					<?php } else { ?>
					<img src="http://ahwenhui.com/statics/images/default_tupian1.png">
					<?php } ?>
				</a>
			</div>
			<div class="common_block_right">
				<div>
					<h3 class="text-more" style="width: 100%">
					<a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
					</h3>
				</div>
				<div>
					<span class="author"><?php echo ($date); ?></span>
				</div>
				<div>
				</div>
			</div>
			<span class="pull-right" style="position: absolute;right: 8px;bottom: 0">
				<span><i class="fa fa-eye"></i> <?php echo ($vo["post_hits"]); ?> </span>
			</span>
		</div>
		<div style="border-bottom: 1px dashed rgb(204, 204, 204);margin: 15px"></div><?php endforeach; endif; ?>
	</div>
</div>
<a href="<?php echo u('user/register/index');?>">
	<img src="http://ahwenhui.com/statics/images/wl.png" width="100%">
</a>
<div class="contact" style="margin-top: 10px">
	<div class="common_block_title_right" style="display:inline-block;">
		联系方式
	</div>
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
</div>
<script type="text/javascript">
	$(document).ready(function () {
		window._bd_share_config={"common":{"bdSnsKey":{},"bdDesc":'<?php echo ($post_excerpt); ?>',"bdText":"<?php echo ($post_title); ?>","bdMini":"2","bdMiniList":false,"bdPic":location.origin+"/data/upload/post/<?php echo ($smeta["thumb"]); ?>","bdStyle":"0","bdSize":"22"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	})
</script>