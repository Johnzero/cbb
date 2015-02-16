<?php if (!defined('THINK_PATH')) exit();?><style>
	#article_content img{height:auto !important}
	#article_content {word-wrap: break-word;}
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span9">
			
			<div class="tc-box first-box article-box">
				<h2><?php echo ($post_title); ?></h2>
				<div class="article-infobox">
					<span><?php echo ($post_date); ?> by <?php echo ($user_nicename); ?></span>
					<span>
					<a href="javascript:;"><i class="fa fa-eye"></i><span><?php echo ($post_hits); ?></span></a>
					<a href="<?php echo U('article/do_like',array('id'=>$object_id));?>" class="J_count_btn"><i class="fa fa-thumbs-up"></i><span class="count"><?php echo ($post_like); ?></span></a>
					<a href="<?php echo U('user/favorite/do_favorite',array('id'=>$object_id));?>" class="J_favorite_btn" data-title="<?php echo ($post_title); ?>" data-url="<?php echo U('article/index',array('id'=>$tid));?>" data-key="<?php echo sp_get_favorite_key('posts',$object_id);?>">
						<i class="fa fa-star-o"></i>
					</a>
					</span>
				</div>
				<hr>
				<div id="article_content">
					<?php echo ($post_content); ?>
				</div>
				
				<br>
<h3>评论</h3>
<div class="comment-area" id="comments">

	<hr>
	<form class="form-horizontal comment-form" action="<?php echo u('comment/comment/post');?>" method="post">
	  <div class="control-group">
		  <div class="comment-postbox-wraper">
		  	<textarea class="form-control comment-postbox" placeholder="Write your comment here" style="min-height:90px;"  name="content"></textarea>
		  </div>
	  </div>
	  
	  <div class="control-group">
	   		<button type="submit" class="btn pull-right btn-primary J_ajax_submit_btn"><i class="fa fa-comment-o"></i> 发表评论</button>
	  </div>
	  
	  <input type="hidden" name="post_table" value="<?php echo ($post_table); ?>"/>
	  <input type="hidden" name="post_id" value="<?php echo ($post_id); ?>"/>
	  <input type="hidden" name="to_uid" value="0"/>
	  <input type="hidden" name="parentid" value="0"/>
	</form>
	
	<script class="comment-tpl" type="text/html">
		<div class="comment" data-username="<?php echo ($user["user_nicename"]); ?>" data-uid="<?php echo ($user["id"]); ?>">
		  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$user['id']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$user['id']));?>" class="headicon"/>
		  </a>
		  <div class="comment-body">
		    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$user['id']));?>"><?php echo ($user["user_nicename"]); ?></a>:<span class="content"></span></div>
		    <div><span class="time">刚刚</span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		  </div>
		  <div class="clearfix"></div>
		</div>
	</script>
	
	<script class="comment-reply-box-tpl" type="text/html">
		<div class="comment-reply-submit">
                    <div class="comment-reply-box">
                        <input type="text" class="textbox" placeholder="回复">
                    </div>
                    <button class="btn pull-right" onclick="comment_submit(this);">回复</button>
                </div>
	</script>
	
	
	<hr>
	<div class="comments">
	<?php if(is_array($comments)): foreach($comments as $key=>$vo): ?><div class="comment" data-id="<?php echo ($vo["id"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>" data-username="<?php echo ($vo["full_name"]); ?>"  id="comment<?php echo ($vo["id"]); ?>">
		  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>">
		    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$vo['uid']));?>" class="headicon"/>
		  </a>
		  <div class="comment-body">
		    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?></a>:<span><?php echo ($vo["content"]); ?></span></div>
		    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
		    
		    <?php if(!empty($vo['children'])): if(is_array($vo["children"])): foreach($vo["children"] as $key=>$voo): ?><div class="comment" data-id="<?php echo ($voo["id"]); ?>" data-uid="<?php echo ($voo["uid"]); ?>" data-username="<?php echo ($voo["full_name"]); ?>" id="comment<?php echo ($voo["id"]); ?>">
					  <a class="pull-left" href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>">
					    <img class="media-object avatar" src="<?php echo U('user/public/avatar',array('id'=>$voo['uid']));?>" class="headicon"/>
					  </a>
					  <div class="comment-body">
					    <div class="comment-content"><a href="<?php echo U('user/index/index',array('id'=>$voo['uid']));?>"><?php echo ($voo["full_name"]); ?></a>:<span>回复 <a href="<?php echo U('user/index/index',array('id'=>$voo['to_uid']));?>"><?php echo ($parent_comments[$voo['parentid']]['full_name']); ?></a> <?php echo ($voo["content"]); ?></span></div>
					    <div><span class="time"><?php echo date('m月d日  H:i',strtotime($voo['createtime']));?></span> <a onclick="comment_reply(this);" href="javascript:;"><i class="fa fa-comment"></i></a></div>
					  </div>
					  <div class="clearfix"></div>
					</div><?php endforeach; endif; endif; ?>
		    
		    
		  </div>
		  <div class="clearfix"></div>
		</div><?php endforeach; endif; ?>
	</div>
	
</div>


			</div>
			
			<?php $ad=sp_getad("portal_article_bottom"); ?>
			<?php if(!empty($ad)): ?><div class="tc-box">
				<div class="headtitle">
					<h2>赞助商</h2>
				</div>
				<div>
					<?php echo ($ad); ?>
				</div>
			</div><?php endif; ?>
			
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
					<h2>最新评论</h2>
				</div>
				<div class="comment-ranking">
					<?php $last_comments=sp_get_comments("field:*;limit:0,5;order:createtime desc;"); ?>
					<?php if(is_array($last_comments)): foreach($last_comments as $key=>$vo): ?><div class="comment-ranking-inner">
						<i class="fa fa-comment"></i>
						<a href="<?php echo U('user/index/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["full_name"]); ?>:</a>
						<span><?php echo ($vo["content"]); ?></span>
						<a href="http://wangsong.com/<?php echo ($vo["url"]); ?>#comment<?php echo ($vo["id"]); ?>">查看原文</a>
						<span class="comment-time"><?php echo date('m月d日  H:i',strtotime($vo['createtime']));?></span>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>