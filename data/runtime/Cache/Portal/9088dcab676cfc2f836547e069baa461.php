<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{height:auto !important}
	#article_content {word-wrap: break-word;}
	#layout {
		background: #E4E4E4 !important;
	}
	.common_block_title {
		margin: 10px;
	}
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span12">
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
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		window._bd_share_config={"common":{"bdSnsKey":{},"bdDesc":'<?php echo ($post_excerpt); ?>',"bdText":"<?php echo ($post_title); ?>","bdMini":"2","bdMiniList":false,"bdPic":location.origin+"/data/upload/post/<?php echo ($smeta["thumb"]); ?>","bdStyle":"0","bdSize":"22"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	})
</script>