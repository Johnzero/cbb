<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span8">
			<div class="main-title">
				<?php $result=sp_sql_posts_paged_bykeyword($keyword,"",20); ?>
				<h3 style="display:inline-block;">'<?php echo ($keyword); ?>' 搜索结果 </h3>
				<p style="display:inline-block;color:gray"><?php echo ($result['count']); ?>条结果</p>
			</div>
			
			<?php if(is_array($result['posts'])): $i = 0; $__LIST__ = $result['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta = json_decode($vo['smeta'], true); $date = date('Y-m-d',strtotime($vo['post_date'])); $termid = $vo['term_id']; $term = M("Terms")->where("term_id='$termid'")->find(); ?>
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
				            <span class="author">分类：<a href="/list/index/id/<?php echo ($term["term_id"]); ?>.html"> <?php echo ($term["name"]); ?> </a> </span>
							<span class="author">时间：<?php echo ($date); ?> </span>
							<span class="author">阅读：<?php echo ($vo["post_hits"]); ?> 次 </span>
							<p class="detail"><?php echo ($vo["post_excerpt"]); ?></p>
				        </div>
				    </div>
				</div>
				<hr><?php endforeach; endif; else: echo "" ;endif; ?>
			<div class="pagination text-right">
				<ul>
					<?php echo ($result['page']); ?>
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
		<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $date = date('Y-m-d',strtotime($vo['post_date'])); ?>
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