<?php if (!defined('THINK_PATH')) exit(); $cat_id = intval($_GET['id']) ? intval($_GET['id']):3; $posts = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",7); ?>
<?php if (!empty($posts['posts'])) { ?>
<?php if(is_array($posts['posts'])): foreach($posts['posts'] as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $keywords = explode(" ",$vo['post_keywords']); $date = date('Y-m-d',strtotime($vo['post_date'])); $termid = $vo['term_id']; $term = M("Terms")->where("term_id='$termid'")->find(); ?>
<div class="j-hotspot">
	<div class="j-hotspotTil clearfix">
		<h3 class="h3">
			<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>" class="a-title"><?php echo ($vo["post_title"]); ?></a>
		</h3>
	</div>
	<div class="clearfix mb30">
		<div class="j-hotspotPic">
			<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
				<?php if ($smeta['thumb']) { ?>
					<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
				<?php } else { ?>
					<img src="http://www.ahwenhui.com/statics/images/default_tupian1.png">
				<?php } ?>
			</a>
		</div>
		<div class="j-hotspotInfo">
			<div>
	            <span class="author">分类：<a href="/list/index/id/<?php echo ($term["term_id"]); ?>.html"> <?php echo ($term["name"]); ?> </a> </span>
				<span class="author">时间：<?php echo ($date); ?> </span>
				<span class="author">阅读：<?php echo ($vo["post_hits"]); ?> 次 </span>
	        </div>
			<p class="j-hotspotA">
				<a target="_blank" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
					<?php echo mb_substr($vo['post_excerpt'],0,100,'utf-8'); ?>....
				</a>
			</p>
			<p class="j-hotspotLink">
				<?php foreach ($keywords as $key => $value): ?>
					<a target="_blank" href="<?php echo u('list/keyword',array('id'=>$value));?>"><?php echo ($value); ?></a>
				<?php endforeach ?>
			</p>
		</div>
	</div>
</div><?php endforeach; endif; ?>
<div class="pagination text-right">
	<ul>
		<?php echo ($posts['page']); ?>
	</ul>
</div>
<?php }else { ?>
<div class="j-hotspot" style="width: 730px;text-align:center;">
	<div class="j-hotspotTil clearfix">
		<h1>暂无新闻</h1>
	</div>
</div>
<?php } ?>