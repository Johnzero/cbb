<?php if (!defined('THINK_PATH')) exit();?>
<div class="container tc-main">
	
	<div class="pg-opt pin">
		<div class="container">
			<h2><?php echo ($name); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="span9">
			<div class="">
				<?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",10); ?>
				<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta=json_decode($vo['smeta'], true); ?>
				
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
				
			</div>
			<div class="pagination">
				<ul>
					<?php echo ($lists['page']); ?>
				</ul>
			</div>
		</div>
		<div class="span3">
			<div class="tc-box first-box">
				<div class="headtitle">
					<h2>分享</h2>
				</div>
				<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqf" data-cmd="tqf" title="分享到腾讯朋友"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_youdao" data-cmd="youdao" title="分享到有道云笔记"></a></div>
				<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];</script>
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
			<div class="tc-box">
				<div class="headtitle">
					<h2>最新评论</h2>
				</div>
				<div class="comment-ranking">
					<?php $last_comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;"); ?>
					<?php if(is_array($last_comments)): foreach($last_comments as $key=>$vo): ?><div class="comment-ranking-inner">
						<i class="fa fa-comment"></i>
						<a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?>:</a>
						<span><?php echo ($vo["content"]); ?></span>
						<a href="/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
						<span class="comment-time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
			
			<div class="tc-box">
				<div class="headtitle">
					<h2>最新加入</h2>
				</div>
				<?php $last_users=sp_get_users("field:*;limit:0,8;order:create_time desc;"); ?>
				<ul class="list-unstyled tc-photos margin-bottom-30">
					<?php if(is_array($last_users)): foreach($last_users as $key=>$vo): ?><li>
						<a href="<?php echo U('user/index/index',array('id'=>$vo['id']));?>">
							<img alt="" src="<?php echo U('user/public/avatar',array('id'=>$vo['id']));?>">
						</a>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
			
			<div class="tc-box">
				<div class="headtitle">
					<h2>最新发布</h2>
				</div>
				<?php $last_post=sp_sql_posts("cid:$portal_last_post;field:post_title,post_excerpt,tid,smeta;order:listorder asc;limit:4;"); ?>
				<div class="posts">
					<?php if(is_array($last_post)): foreach($last_post as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
					<dl class="dl-horizontal">
						<dt>
						<a class="img-wraper" href="<?php echo U('article/index',array('id'=>$vo['tid']));?>">
							<?php if(empty($smeta['thumb'])): ?><img src="/tpl/default/Public/images/default_tupian4.png" class="img-responsive" alt="<?php echo ($vo["post_title"]); ?>"/>
							<?php else: ?>
							<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" class="img-responsive img-thumbnail" alt="<?php echo ($vo["post_title"]); ?>" /><?php endif; ?>
						</a>
						</dt>
						<dd><a href="<?php echo leuu('article/index',array('id'=>$vo['tid']));?>"><?php echo msubstr($vo['post_excerpt'],0,32);?></a></dd>
					</dl><?php endforeach; endif; ?>
				</div>
			</div>
			
			<?php $ad=sp_getad("portal_list_right_aside"); ?>
			<?php if(!empty($ad)): ?><div class="tc-box">
				<div class="headtitle">
					<h2>赞助商</h2>
				</div>
				<div>
					<?php echo ($ad); ?>
				</div>
			</div><?php endif; ?>
		</div>
	</div>
</div>

<!-- JavaScript -->