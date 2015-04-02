<?php if (!defined('THINK_PATH')) exit();?><style>
	#layout {
		background: #E4E4E4 !important;
	}
	.detail {
		height: 120px;
		overflow: hidden;
		font-size: 12px;
		color: #4b4b4b!important;
		line-height: 23px;
		margin-top: 10px;
	}
</style>
<div class="container tc-main list">
	<div class="row">
		<div class="span8">
			<div class="row circle_block_title">
                <div>入驻企业</div>
            </div>
			<div class="list-posts">
				<?php if(is_array($companys)): $i = 0; $__LIST__ = $companys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-boxes">
					    <div class="leftimg">
					        <a href="<?php echo u('company/detail',array('id'=>$vo['id']));?>">
					        	<?php if ($vo['logo']) { ?>
									<img src="<?php echo ($vo["logo"]); ?>">
								<?php } else { ?>
									<img src="http://www.ahwenhui.com/statics/images/default_tupian1.png">
								<?php } ?>
					        </a>
					    </div>
					    <div class="blog_detail">
				            <h3 class="text-more media-heading" style="width: 100%">
				            <a title="<?php echo ($vo["name"]); ?>" href="<?php echo u('company/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></h3>
					        <div class="detail">
					            <?php echo mb_substr($vo['description'],0,240,'utf-8'); ?>...
					        </div>
					    </div>
					</div>
					<hr><?php endforeach; endif; else: echo "" ;endif; ?>
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
					<img src="http://www.ahwenhui.com/statics/images/default_tupian1.png">
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
	<img src="http://www.ahwenhui.com/statics/images/wl.png" width="100%">
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