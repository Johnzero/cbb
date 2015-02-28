<?php if (!defined('THINK_PATH')) exit(); $cat_id = intval($_GET['id']) ? intval($_GET['id']):3; $posts = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",2); ?>
<?php if (!empty($posts['posts'])) { ?>
<?php if(is_array($posts['posts'])): foreach($posts['posts'] as $key=>$vo): $smeta = json_decode($vo['smeta'],true); $keywords = explode(" ",$vo['post_keywords']); ?>
<div class="j-hotspot">
	<div class="j-hotspotTil clearfix">
		<h3 class="h3">
			<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>" class="a-title"><?php echo ($vo["post_title"]); ?></a>
		</h3>
	</div>
	<div class="clearfix mb30">
		<div class="j-hotspotPic">
			<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
				<?php if ($smeta['thumb']) { ?>
				<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
				<?php } else { ?>
				<img src="http://wangsong.com/statics/images/default_tupian1.png">
				<?php } ?>
			</a>
		</div>
		<div class="j-hotspotInfo">
			<p class="j-hotspotA">
				<a href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_excerpt"]); ?></a>
			</p>
			<p class="j-hotspotLink">
				<?php foreach ($keywords as $key => $value): ?>
				<a href=""><?php echo ($value); ?></a>
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