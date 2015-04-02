<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{height:auto !important}
	#article_content {word-wrap: break-word;}
	#layout {
		background: #E4E4E4 !important;
	}
	.common_block_title {
		margin: 10px;
	}
	p{
		margin: 5px 0;
		font-size:16px;
	}
	.sidePageLeft li {
		list-style: none;
		height: 30px;
		line-height: 30px;
		text-indent: 15px;
	}
	.span3 .contact{
		background: url(/statics/images/apg_sidepage_03.gif) repeat-y;
	}
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span9">
			<div class="tc-box article-box">
				<div class="common_block_title">
					<h2 style="margin-bottom: 0;padding-bottom: 0;text-align: center;"><?php echo ($post_title); ?></h2>
				</div>
				<hr/>
				<div id="article_content">
					<?php echo ($post_content); ?>
					<div class="bdsharebuttonbox bdshare-button-style0-16"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
					<hr/>
				</div>
			</div>
		</div>
		<div class="span3" style="width: 250px;">
			<div class="contact" style="margin-top: 0px">
				<div class="common_block_title_right" style="display:inline-block;">
					联盟简介
				</div>
				<ul class="sidePageLeft">
					<li><a href="/page/index/id/47.html#introduce"><i class="fa fa-bookmark"></i> 联盟介绍</a></li>
					<li><a href="/page/index/id/47.html#member"><i class="fa fa-bookmark"></i> 成员单位</a></li>
					<li><a href="/page/index/id/47.html#org"><i class="fa fa-bookmark"></i> 组织机构</a></li>
					<li><a href="/page/index/id/47.html#outh"><i class="fa fa-bookmark"></i> 联盟盟约</a></li>
				</ul>
			</div>
			<div class="contact" style="margin-top: 10px">
				<div class="common_block_title_right" style="display:inline-block;">
					联系我们
				</div>
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
<script type="text/javascript">
	$(document).ready(function () {
		window._bd_share_config={"common":{"bdSnsKey":{},"bdDesc":'<?php echo ($post_excerpt); ?>',"bdText":"<?php echo ($post_title); ?>","bdMini":"2","bdMiniList":false,"bdPic":location.origin+"/data/upload/post/<?php echo ($smeta["thumb"]); ?>","bdStyle":"0","bdSize":"22"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	})
</script>