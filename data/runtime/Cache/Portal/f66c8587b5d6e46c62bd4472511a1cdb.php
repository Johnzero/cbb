<?php if (!defined('THINK_PATH')) exit();?><style>
	#layout {
		background: #E4E4E4 !important;
	}
</style>
<div class="container tc-main list">
	<div class="row">
		<div class="span8">
			<div class="row circle_block_title">
                <div><?php echo ($name); ?></div>
            </div>
			<div class="list-posts">
				<?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",10); ?>
				<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta = json_decode($vo['smeta'], true); ?>
					<div class="list-boxes">
					    <div class="leftimg">
					        <a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
					        	<?php if ($smeta['thumb']) { ?>
									<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
								<?php } else { ?>
									<img src="http://wangsong.com/statics/images/default_tupian1.png">
								<?php } ?>
					        </a>
					    </div>
					    <div class="blog_detail">
				            <h3 class="text-more media-heading" style="width: 100%">
				            <a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h3>
					        <div>
					            <span class="author"><?php echo ($vo["post_date"]); ?></span>
					            <p class="detail"><?php echo ($vo["post_excerpt"]); ?></p>
					        </div>
					        <div class="blog_tags" style="margin-top: 20px">
					        </div>
					        <div class="pull-right">
					            <span><i class="fa fa-eye"></i> <?php echo ($vo["post_hits"]); ?> </span>
					        </div>

					    </div>
					</div>
					<hr><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="pagination text-right">
				<ul>
					<?php echo ($lists['page']); ?>
				</ul>
			</div>
		</div>
		<div class="span4">
			<div class="tc-box">
	<div class="common_block_border blog_position">
		<div class="common_block_title_right">
			热门文章
		</div>
		<?php $hot_articles = sp_sql_posts("field:post_title,post_hits,post_excerpt,post_date,tid,smeta;order:post_hits desc;limit:5;"); ?>
		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $smeta = json_decode($vo['smeta'],true); ?>
		<div class="clearfix" style="position: relative">
			<div class="common_block_left">
				<a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
					<?php if ($smeta['thumb']) { ?>
					<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
					<?php } else { ?>
					<img src="http://wangsong.com/statics/images/default_tupian1.png">
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
					<span class="author"><?php echo ($vo["post_date"]); ?></span>
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
	<img src="http://wangsong.com/statics/images/wl.png" width="100%">
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