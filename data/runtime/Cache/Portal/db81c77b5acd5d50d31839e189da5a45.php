<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{height:auto !important}
	#article_content {word-wrap: break-word;}
	#layout {
		background: #E4E4E4 !important;
	}
	.common_block_title {
		margin: 10px;
		margin-bottom: 0;
	}
	.showimg img {
		background: #fff;
		color: #3498db;
		font-size: 36px;
		line-height: 100px;
		margin: 10px;
		padding: 10px;
		position: relative;
		text-align: center;
	}
</style>

<link href="http://ahwenhui.com/statics/slick/slick.css" rel="stylesheet">
<link href="http://ahwenhui.com/statics/slick/slick-theme.css" rel="stylesheet">
<script src="http://ahwenhui.com/statics/slick/slick.min.js"></script>

<div class="container tc-main">
	<div class="row">
		<div class="span12">
			<div class="tc-box article-box">
				<div class="common_block_title">
					<h2 style="margin-bottom: 0;padding-bottom: 0;text-align: center;"><?php echo ($company["name"]); ?></h2>
				</div>
				<div id="article_content">
					<div class="description">
						<table cellspacing="0" cellpadding="0" width="100%" border="0">
							<tbody>
								<tr>
									<td width="86">
										<div class="intro_title_content_01">
										公司介绍</div>
									</td>
									<td background="http://ahwenhui.com/statics/images/block.jpg">
										<div class="place_content_02">&nbsp;</div>
									</td>
								</tr>
							</tbody>
						</table>
						<?php if ($company['logo']) { ?>
							<img class="clogo" src="<?php echo ($company["logo"]); ?>" width="80%">
						<?php } else { ?>
							<img class="clogo" src="http://ahwenhui.com/statics/images/default_tupian1.png">
						<?php } ?>
						<span class="des_content">
							<?php echo ($company["description"]); ?>
						</span>
					</div>

					<div class="description">
						<table cellspacing="0" cellpadding="0" width="100%" border="0">
							<tbody>
								<tr>
									<td width="86">
										<div class="intro_title_content_01">
										项目介绍</div>
									</td>
									<td background="http://ahwenhui.com/statics/images/block.jpg">
										<div class="place_content_02">&nbsp;</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div id="article_content">
							<?php echo ($company["xm"]); ?>
						</div>
					</div>

					<div class="description">
						<table cellspacing="0" cellpadding="0" width="100%" border="0">
							<tbody>
								<tr>
									<td width="86">
										<div class="intro_title_content_01">
										企业展示</div>
									</td>
									<td background="http://ahwenhui.com/statics/images/block.jpg">
										<div class="place_content_02">&nbsp;</div>
									</td>
								</tr>
							</tbody>
						</table>
						<p>
							<div class="companyshow" >
							  <?php if(is_array($company["show"])): $i = 0; $__LIST__ = $company["show"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="showimg"><img src="<?php echo ($vo); ?>"></div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</p>
					</div>
						<script type="text/javascript">
						    $(document).ready(function(){
						      $('.companyshow').slick({
									autoplay: true,
									autoplaySpeed: 2000,
									centerMode: true,
									centerPadding: '60px',
									slidesToShow: 3,
									responsive: [
									{
									  breakpoint: 768,
									  settings: {
									    arrows: false,
									    centerMode: true,
									    centerPadding: '40px',
									    slidesToShow: 3
									  }
									},
									{
									  breakpoint: 480,
									  settings: {
									    arrows: false,
									    centerMode: true,
									    centerPadding: '40px',
									    slidesToShow: 1
									  }
									}
									]
						      });
						    });
					  	</script>
					<div class="description">
						<table cellspacing="0" cellpadding="0" width="100%" border="0">
							<tbody>
								<tr>
									<td width="86">
										<div class="intro_title_content_01">
										联系方式</div>
									</td>
									<td background="http://ahwenhui.com/statics/images/block.jpg">
										<div class="place_content_02">&nbsp;</div>
									</td>
								</tr>
							</tbody>
						</table>
						<p>
							<?php echo ($company["ct"]); ?>
						</p>
					</div>

					<div class="clearfix"></div>
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