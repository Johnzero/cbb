<?php if (!defined('THINK_PATH')) exit();?><div class="container" style="width:1170px !important">
	<div id="adSmall" class="ad">
		<a href="http://ah.anhuinews.com/system/2015/04/10/006751590.shtml" target="_blank"><img src="/statics/images/b2.jpg" width="100%"></a>
	</div>
	<div id="adBig" class="ad">
		<a href="http://ah.anhuinews.com/system/2015/04/10/006751590.shtml" target="_blank"><img src="/statics/images/b1.jpg" width="100%"></a>
	</div>
	<script>
		$(function(){
			$("#adBig").slideDown(1000);
		    setTimeout("showImage();",5000);
		});
		function showImage()
		{
		    $("#adBig").slideUp(1000,function(){$("#adSmall").slideDown(1000);});
		}
	</script>
	<?php $home_slides = sp_getslide("sliders"); ?>
	<ul id="homeslider" class="unstyled">
		<?php if(is_array($home_slides)): foreach($home_slides as $key=>$vo): ?><li>
			<div class="caption-wraper">
				<div class="caption"><?php echo ($vo["slide_name"]); ?></div>
			</div>
			<a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt=""></a>
		</li><?php endforeach; endif; ?>
	</ul>
	<div class="lastnews">
		<h3> 今日聚焦 </h3>
		<span class="hr"></span>
		<hr>
		<ul>
			<?php if(is_array($hot_articles)): foreach($hot_articles as $key=>$vo): ?><li><a target="_blank" title="<?php echo ($vo["title"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
	<div class="clearfix"></div>
	<div class="block1">
		<div>
			<h3> <a target="_blank" href="<?php echo u('list/index',array('id'=>20));?>">快&nbsp;&nbsp;报</a> </h3>
			<?php $kb = sp_getslide("kb"); ?>
			<?php if(is_array($kb)): foreach($kb as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
			<?php $xm = sp_sql_posts("cid:20;order:listorder DESC,post_date DESC;limit:3"); ?>
			<ul>
				<?php if(is_array($xm)): $i = 0; $__LIST__ = $xm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div>
			<h3><a target="_blank" href="<?php echo u('company/index');?>">企&nbsp;&nbsp;业</a></h3>
			<?php $qy = sp_getslide("qy"); ?>
			<?php if(is_array($qy)): foreach($qy as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
			<ul>
				<?php if(is_array($companys)): $i = 0; $__LIST__ = $companys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a  target="_blank" title="<?php echo ($vo["name"]); ?>" href="<?php echo u('company/detail',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div>
			<h3><a target="_blank" href="<?php echo u('list/index',array('id'=>23));?>">项&nbsp;&nbsp;目</a></h3>
			<?php $xm = sp_getslide("xm"); ?>
			<?php if(is_array($xm)): foreach($xm as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
			<?php $hd = sp_sql_posts("cid:22;order:listorder DESC,post_date DESC;limit:3"); ?>
			<ul>
				<?php if(is_array($hd)): $i = 0; $__LIST__ = $hd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
	<!-- <a href=""><img src="http://ahwenhui.com/statics/images/adv.png" width="100%"></a> -->

	<div class="row-fluid">
	 	<div class="w790 pull-left">
	 		<a style="height: 35px;display: block;width: 155px;float: left;" ng-class="{active: $stateParams.Id == '3'}" ui-sref="index.content({Id:3})"></a>
	 		<ul class="cats">
				<li><a ng-class="{active: $stateParams.Id == '14'}" ui-sref="index.content({Id:14})">电商新闻</a></li>
				<li><a ng-class="{active: $stateParams.Id == '15'}" ui-sref="index.content({Id:15})">行业数据</a></li>
				<li><a ng-class="{active: $stateParams.Id == '16'}" ui-sref="index.content({Id:16})">人物观点</a></li>
				<li><a ng-class="{active: $stateParams.Id == '17'}" ui-sref="index.content({Id:17})">典型案例</a></li>
				<li><a ng-class="{active: $stateParams.Id == '18'}" ui-sref="index.content({Id:18})">电商干货</a></li>
				<li><a ng-class="{active: $stateParams.Id == '19'}" ui-sref="index.content({Id:19})">电商专题</a></li>
	 		</ul>
	        <div class="j-hotspotWrap ml20 slide-left" ui-view="subview">
	        	<?php $cat_id = intval($_GET['id']) ? intval($_GET['id']):3; $posts = sp_sql_posts_paged("cid:$cat_id;order:post_date DESC;",7); ?>
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
					<img src="http://ahwenhui.com/statics/images/default_tupian1.png">
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
	        </div>
	    </div>
	    <div class="w380 pull-right">
	    	<div class="content1">
		 		<h3><a target="_blank" href="<?php echo u('list/index',array('id'=>25));?>">动&nbsp;&nbsp;态</a></h3>
				<span class="hx"></span>
				<?php $dt = sp_sql_posts("cid:25;order:listorder DESC,post_date DESC;limit:6"); ?>
				<div class="imgblock clearfix">
					<?php if(is_array($dt)): $i = 0; $__LIST__ = array_slice($dt,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $smeta = json_decode($vo['smeta'],true); ?>
						<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>">
							<?php if ($smeta['thumb']) { ?>
								<img src="/data/upload/<?php echo ($smeta["thumb"]); ?>">
							<?php } else { ?>
								<img src="http://ahwenhui.com/statics/images/default_tupian1.png">
							<?php } ?>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<ul class="left-ul">
					<?php if(is_array($dt)): $i = 0; $__LIST__ = array_slice($dt,2,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<h3><a target="_blank" href="<?php echo u('list/index',array('id'=>26));?>">政&nbsp;&nbsp;策</a></h3>
				<span class="hx"></span>
				<?php $zc = sp_sql_posts("cid:26;order:listorder DESC,post_date DESC;limit:5"); ?>
				<ul class="left-ul">
					<?php if(is_array($zc)): $i = 0; $__LIST__ = $zc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>

			<?php $sider_ad = sp_getslide("left"); ?>
			<?php if(is_array($sider_ad)): foreach($sider_ad as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>" style="margin-bottom:20px;display: block;">
					<img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" width="100%">
				</a><?php endforeach; endif; ?>

			<div class="content1">
				<h3><a target="_blank" href="<?php echo u('list/index',array('id'=>27));?>">公&nbsp;&nbsp;告</a></h3>
				<span class="hx"></span>
				<?php $gg = sp_sql_posts("cid:27;order:listorder DESC,post_date DESC;limit:5"); ?>
				<ul class="left-ul">
					<?php if(is_array($gg)): $i = 0; $__LIST__ = $gg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<h3><a target="_blank" href="<?php echo u('list/index',array('id'=>29));?>">服&nbsp;&nbsp;务</a></h3>
				<span class="hx"></span>
				<?php $fw = sp_sql_posts("cid:29;order:listorder DESC,post_date DESC;limit:5"); ?>
				<ul class="left-ul">
					<?php if(is_array($fw)): $i = 0; $__LIST__ = $fw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" title="<?php echo ($vo["post_title"]); ?>" href="<?php echo u('article/index',array('id'=>$vo['tid']));?>"><?php echo ($vo["post_title"]); ?></a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<a target="_blank" href="<?php echo u('user/register/index');?>">
				<img src="http://ahwenhui.com/statics/images/wl.png" width="100%">
			</a>
			<div class="contact">
				<h3> 联系方式 </h3>
				<span class="hx" style="width:250px;"></span>
				<blockquote class="clearfix" style="margin-top: 15px;">
					<span>地址：安徽省合肥市蜀山区潜山路1469号</span>
					<span>电话：0551-65179957</span>
					<span>联系人：阮晓昕</span>
					<span>邮箱：ahciec@163.com</span>
					<span>QQ群：159560648</span>
				</blockquote>
			</div>
	    </div>
    </div>
    <link href="http://ahwenhui.com/statics/slick/slick.css" rel="stylesheet">
    <div class="jcsj">
		<?php $jcsj = sp_getslide("jcsj"); ?>
		<?php if(is_array($jcsj)): foreach($jcsj as $key=>$vo): ?><a target="_blank" href="<?php echo ($vo["slide_url"]); ?>"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" alt="<?php echo ($vo["slide_name"]); ?>"></a><?php endforeach; endif; ?>
    </div>
    <script type="text/javascript">
	    $(document).ready(function(){
	      $('.jcsj').slick({
				autoplay: true,
				autoplaySpeed: 2000,
				slidesToShow: 4,
	      });
	    });
  	</script>

    <div class="link">
		<a target="_blank" href="http://www.cnci.gov.cn/" title="中国文化产业网"><img src="http://ahwenhui.com/statics/images/y1.jpg"></a>
		<a target="_blank" href="http://www.ccdy.cn/" title="中国文化传媒网"><img src="http://ahwenhui.com/statics/images/y2.gif"></a>
		<a target="_blank" href="http://www.ccitimes.com/" title="中国文化创意产业网"><img src="http://ahwenhui.com/statics/images/y3.jpg"></a>
		<a target="_blank" href="http://www.chncia.org/" title="中国文化产业协会"><img src="http://ahwenhui.com/statics/images/y4.png"></a>
		<a target="_blank" href="http://www.ccmedu.com/default.htm" title="文化发展论坛"><img src="http://ahwenhui.com/statics/images/y5.gif"></a>
		<a target="_blank" href="http://www.ccm.gov.cn/swordcms/publish/default/static/main/index.htm" title="中国文化市场网"><img src="http://ahwenhui.com/statics/images/y6.png"></a>
		<br/>
		<a target="_blank" href="http://www.ce.cn/culture/" title="中国经济网文化产业"><img src="http://ahwenhui.com/statics/images/y7.gif"></a>
		<a target="_blank" href="http://culture.people.com.cn/GB/index.html" title="人民网文化"><img src="http://ahwenhui.com/statics/images/y8.gif"></a>
		<a target="_blank" href="http://cul.china.com.cn/" title="中国网文化"><img src="http://ahwenhui.com/statics/images/y9.jpg"></a>
		<a target="_blank" href="http://cul.sohu.com/" title="搜狐文化"><img src="http://ahwenhui.com/statics/images/y10.gif"></a>
		<a target="_blank" href="http://www.hubeici.com/index.shtml" title="文谷网"><img src="http://ahwenhui.com/statics/images/y11.gif"></a>
		<a target="_blank" href="http://art.china.cn/" title="艺术中国"><img src="http://ahwenhui.com/statics/images/y12.jpg"></a>

    </div>
</div>
<link href="http://ahwenhui.com/statics/js/slippry/slippry.css" rel="stylesheet">
<script src="http://ahwenhui.com/statics/js/slippry/slippry.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
	var demo1 = $("#homeslider").slippry({
		transition: 'fade',
		useCSS: true,
		captions: false,
		speed: 1000,
		pause: 3000,
		auto: true,
		preload: 'visible'
	});
})
</script>