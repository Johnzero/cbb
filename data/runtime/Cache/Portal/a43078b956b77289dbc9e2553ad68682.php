<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{
		text-align:center;
		max-width:100%;
	}
	#article_content {word-wrap: break-word;}
	#layout {
		background: #E4E4E4 !important;
	}
	p{
		margin: 5px 0;
	}
	.font9blue {
		width:100%;
		text-align:center;
		margin-top:10px;
		margin-bottom:20px;
	}
	#article_content p {
		font: 16px/28px Microsoft YaHei, Arial;
		margin-top: 15px !important;
	}
	/*#article_content * {
		max-width:;
	}*/
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span8">
			<div class="tc-box article-box">
				<div class="common_block_title">
					<h2><?php echo ($post_title); ?></h2>
					<?php $keywords = explode(" ",$post_keywords); $date = date('Y-m-d',strtotime($post_date)); ?>
					<div class="article-infobox">
						<?php if ($post_source) { ?>
							<span>来源：<a><?php echo ($post_source); ?></a></span>
						<?php }?>
						<?php if ($post_authorname) { ?>
						<span>作者：<a><?php echo ($post_authorname); ?></a></span>
						<?php }?>
						<span>分类：<a href="/list/index/id/<?php echo ($term["term_id"]); ?>.html"><?php echo ($term["name"]); ?></a> </span>
						<span>时间：<a><?php echo ($date); ?></a> </span>
						<span>阅读：<a><?php echo ($post_hits); ?></a> 次 </span>
					</div>
				</div>
				<hr/>
				<div class="font9blue">
					【<b>字体：<a href="javascript:fontZoom(20)"><font style="color:rgb(188, 0, 0)">大</font></a>&nbsp;<a href="javascript:fontZoom(16)"><font style="color:rgb(188, 0, 0)">中</font></a>&nbsp;<a href="javascript:fontZoom(12)"><font style="color:rgb(188, 0, 0)">小</font></a></b>】【<b>视力保护：</b><a href="javascript:divbgColor('#ffffff')" style="color:#ffffff;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#F6F6F6')" style="color:#F6F6F6;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#CCCCCC')" style="color:#CCCCCC;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#E7FAEC')" style="color:#E7FAEC;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#AFE3A8')" style="color:#AFE3A8;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#FFFFE1')" style="color:#FFFFE1;font-size: 20px">■</a> 
	            	<a href="javascript:divbgColor('#DFCCD8')" style="color:#DFCCD8;font-size: 20px">■</a> 
	            】</div>
				<div id="article_content">
					<?php echo ($post_content); ?>
					<div class="clearfix"></div>
				</div>
				<div class="pagination text-center">
					<ul>
						<?php echo ($page); ?>
					</ul>
				</div>
				<br>
				<div class="article-infobox" style="float:left;">
					<span>关键词：
						<?php foreach ($keywords as $key => $value): ?>
							<a href="<?php echo u('list/keyword',array('id'=>$value));?>"><?php echo ($value); ?></a>
						<?php endforeach ?>
					</span>
				</div>
				<div class="bdsharebuttonbox bdshare-button-style0-16" style="float:right;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a><a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
				<div class="clearfix"></div>
				<hr/>
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
		<span>地址：安徽省合肥市蜀山区潜山路1469号</span>
		<span>电话：0551-65179957</span>
		<span>联系人：阮晓昕</span>
		<span>邮箱：ahciec@163.com</span>
		<span>QQ群：159560648</span>
	</blockquote>
</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://ahwenhui.com/statics/js/jquery.cookie.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		window._bd_share_config={"common":{"bdSnsKey":{},"bdDesc":'<?php echo ($post_excerpt); ?>',"bdText":"<?php echo ($post_title); ?>","bdMini":"2","bdMiniList":false,"bdPic":location.origin+"/data/upload/post/<?php echo ($smeta["thumb"]); ?>","bdStyle":"0","bdSize":"22"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
		if ($.cookie('color')) {
	  		document.getElementsByClassName('article-box')[0].style.backgroundColor = $.cookie('color');
			$("#article_content").find("*").css("backgroundColor",$.cookie('color'));
		}
		if ($.cookie('font')) {
	  		$("#article_content").find("*").css("font-size",$.cookie('font')+'px');
  			$("#article_content").find("*").css("lineHeight",$.cookie('font')*2+'px');
		}
  		$("#article_content").find("*").css("max-width",$("#article_content").width()+'px');
  		$("#article_content a").attr('target', '_blank');
	})
	function fontZoom(size){
		$.cookie('font',size);
  		$("#article_content").find("*").css("font-size",size+'px');
  		$("#article_content").find("*").css("lineHeight",size*2+'px');
	}
	function divbgColor(clo){
		$.cookie('color',clo);
	  	document.getElementsByClassName('article-box')[0].style.backgroundColor = clo;
  		$("#article_content").find("*").css("backgroundColor",clo);
	}
</script>