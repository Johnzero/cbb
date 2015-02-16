<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span9">
			<div class="main-title">
				<?php $result=sp_sql_posts_paged_bykeyword($keyword,"",20); ?>
				<h3>'<?php echo ($keyword); ?>' 搜索结果 </h3>
				<p><?php echo ($result['count']); ?>条结果</p>
			</div>
			
			<?php if(is_array($result['posts'])): $i = 0; $__LIST__ = $result['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'], true); ?>
			
			<div class="list-boxes">
				<h2><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h2>
				<p><?php echo ($vo["post_excerpt"]); ?></p>
				<div>
					<div class="pull-left">
						<div class="list-actions">
							<a href="javascript:;"><i class="fa fa-eye"></i><span><?php echo ($vo["post_hits"]); ?></span></a>
							<a href="<?php echo U('article/do_like',array('id'=>$vo['object_id']));?>" class="J_count_btn"><i class="fa fa-thumbs-up"></i><span class="count"><?php echo ($vo["post_like"]); ?></span></a>
							<a href="<?php echo U('user/favorite/do_favorite',array('id'=>$vo['object_id']));?>" class="J_favorite_btn" data-title="<?php echo ($vo["post_title"]); ?>" data-url="<?php echo U('portal/article/index',array('id'=>$vo['tid']));?>" data-key="<?php echo sp_get_favorite_key('posts',$vo['object_id']);?>">
								<i class="fa fa-star-o"></i>
							</a>
						</div>
					</div>
					<a class="btn btn-warning pull-right" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>">查看更多</a>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<div class="pagination">
				<ul>
					<?php echo ($result['page']); ?>
				</ul>
			</div>
		</div>
		<div class="span3">
			<div class="tc-box first-box">
				<div class="headtitle">
					<h2>分享</h2>
				</div>
				<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
				<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{},"image":{"viewList":["weixin","tsina","qzone","tqq","renren"],"viewText":"分享到：","viewSize":"32"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","tqq","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			</div>
			
			<div class="tc-box">
				<div class="headtitle">
					<h2>热门文章</h2>
				</div>
				<div class="ranking">
					<?php $hot_articles=sp_sql_posts("cid:$portal_index_lastnews;field:post_title,post_excerpt,tid,smeta;order:post_hits desc;limit:5;"); ?>
					<ul class="unstyled">
						<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $top=$key<3?"top3":""; ?>
						<li class="<?php echo ($top); ?>"><i><?php echo ($key+1); ?></i><a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>