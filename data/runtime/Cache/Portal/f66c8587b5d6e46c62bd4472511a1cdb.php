<?php if (!defined('THINK_PATH')) exit(); $len = 6; ?>
<style>
	#layout {
		background: #E4E4E4 !important;
	}
	.detail {
		text-indent: 2em;
	}
	<?php if (in_array( $cat_id, array(25,26,27,28,29,20) )) { $len = 9; ?>
		.blog_detail {
			width: 100%;
			margin-left: 0px; 
			height: 40px;
			line-height: 40px;
			background: url(http://www.ahwenhui.com/statics/images/list_bg.jpg) no-repeat center left;
		}
		.author {
			float:right;
		}
		p.detail {
			font-size:14px;
		}
		.blog_detail .text-more {
			width:80% !important;
			white-space: nowrap;
			line-height: 35px;
			margin-left: 10px;
		}
		.media-heading a {
			font-size: 16px;
			font-weight: 600;
		}
		.list-boxes {
			padding: 0px 15px;
			margin-bottom: 0;
		}
		.list-boxes:hover {
			border-top: none;
		}
		.detail_des {
			margin-top:-5px;
			margin-bottom: 15px;
		}
	<?php } ?>
</style>
<div class="container tc-main list">
	<div class="row">
		<div class="span8">
			<div class="row circle_block_title">
                <div><?php echo ($name); ?></div>
            </div>
			<div class="list-posts">
				<?php $lists = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",$len); ?>
				<?php if(is_array($lists['posts'])): $i = 0; $__LIST__ = $lists['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta = json_decode($vo['smeta'], true); $keywords = explode(" ",$vo['post_keywords']); $date = date('Y-m-d',strtotime($vo['post_date'])); $termid = $vo['term_id']; $term = M("Terms")->where("term_id='$termid'")->find(); $post_excerpt = trim($vo['post_excerpt']); ?>
					<div class="list-boxes">
						<?php if (!in_array( $cat_id, array(25,26,27,28,29,20) )) { ?>
						    <div class="leftimg">
						        <a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
						        	<?php if ($smeta['thumb']) { ?>
										<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
									<?php } else { ?>
										<img src="http://www.ahwenhui.com/statics/images/default_tupian1.png">
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
						            <p class="detail"><?php echo ($post_excerpt); ?></p>
						        </div>
						    </div>
						<?php } else { ?>
						    <div class="blog_detail">
					            <h3 class="text-more media-heading" style="width: 100%">
					            	<a title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a></h3>
								<span class="author"><?php echo ($date); ?> </span>
						    </div>
						    <div class="detail_des">
						        <p class="detail"><?php echo ($post_excerpt); ?></p>
						    </div>
						<?php } ?>
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