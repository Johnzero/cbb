<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html xmlns:ng="http://angularjs.org">
	<head>
		<title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($seo_description); ?>">
		<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); ?>
		<base href="/">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':8080/livereload.js?snipver=1"></' + 'script>')</script>
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
		<link href="/tpl/default/Public/simpleboot/themes/cmf/theme.min.css" rel="stylesheet">
		<link href="/tpl/default/Public/simpleboot/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="/tpl/default/Public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="/tpl/default/Public/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="/tpl/default/Public/css/style.css" rel="stylesheet">
		<style type="text/css">
			/*html{filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);-webkit-filter: grayscale(1);}*/
			#backtotop{position: fixed;bottom: 50px;right:20px;display: none;cursor: pointer;font-size: 50px;z-index: 9999;}
			#backtotop:hover{color:#333;}
			.caption-wraper{position: absolute;left:50%;bottom:2em;}
			.caption-wraper .caption{
				position: relative;left:-50%;
				background-color: rgba(0, 0, 0, 0.54);
				padding: 0.4em 1em;
				color:#fff;
				-webkit-border-radius: 1.2em;
				-moz-border-radius: 1.2em;
				-ms-border-radius: 1.2em;
				-o-border-radius: 1.2em;
				border-radius: 1.2em;
			}
			@media (max-width: 767px){
				.sy-box{margin: 12px -20px 0 -20px;}
				.caption-wraper{left:0;bottom: 0.4em;}
				.caption-wraper .caption{
				left: 0;
				padding: 0.2em 0.4em;
				font-size: 0.92em;
				-webkit-border-radius: 0;
				-moz-border-radius: 0;
				-ms-border-radius: 0;
				-o-border-radius: 0;
				border-radius: 0;}
			}
			#layout{min-height:400px; height:auto!important; height:400px;}
			.tf-spin {
				text-align: center;
				margin-top: 10%;
			}
		</style>
		<script type="text/javascript">
			var GV = {
				DIMAUB: "/",
				JS_ROOT: "statics/js/",
				TOKEN: ""
			};
		</script>
		<script src="/statics/js/jquery.js"></script>
		<script src="/tpl/default/Public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
		<script src="/statics/js/wind.js"></script>
		<script src="/statics/js/frontend.js"></script>
	</head>
	<body ng-app="cultural" class="ng-app:cultural" id="ng-app">
		<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="/" target="_self"><img src="/tpl/default/Public/images/logo.png"/></a>
			<div class="nav-collapse collapse" id="main-menu">
				<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
				
				<ul class="nav pull-right" id="main-menu-left">
					<li class="dropdown">
						<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="#">
							<?php if(empty($user['avatar'])): ?><img src="/tpl/default//Public/images/headicon.png" class="headicon"/>
							<?php else: ?>
							<img src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
						<?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
						<ul class="dropdown-menu pull-right">
							<li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
						</ul>
						<?php else: ?>
						<a class="dropdown-toggle user" data-toggle="dropdown" href="#">
							<img src="/tpl/default//Public/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
							<li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
							<li><a href="<?php echo u('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo u('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
						</ul><?php endif; ?>
					</li>
				</ul>
				<div class="pull-right">
					<form method="post" class="form-inline" action="<?php echo U('/search/index');?>" style="margin:18px 0;">
						<input type="text" class="" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
						<input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ng-Layout -->
<div id="layout" data-ui-view="">
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


</div>

<!-- JavaScript -->
<!-- Javascript -->
<script src="/statics/js/angular/angular.js"></script>
<script src="/statics/js/angular/angular-animate.js"></script>
<script src="/statics/js/angular/angular-ui-router.js"></script>
<script src="/statics/js/angular/loading-bar.js"></script>
<link href='/statics/js/angular/loading-bar.css' rel='stylesheet' />

<script type="text/javascript">
	var cultural = angular.module('cultural', ['ui.router','angular-loading-bar','ngAnimate']);

	cultural.directive('goBack', function($window){
	  return function($scope, $element){
	    $element.on('click', function(){
	      $window.history.back();
	    })
	  }
	});

	cultural.controller("formController", function ($scope, $http) {
        $scope.formData = {};
        $scope.processForm = function() {
 			$http({
		        method  : 'POST',
		        url     : "<?php echo u('user/login/dologin');?>",
		        data    : $.param($scope.formData),  // pass in data as strings
		        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  
		    })
	        .success(function(data) {
	            console.log(data);
	            if (!data.success) {
	               
	            } else {

	                $scope.message = data.message;

	            }
	        });
        };
    });


	cultural.config(function($rootScope,cfpLoadingBarProvider,$stateProvider, $urlRouterProvider,$locationProvider,$httpProvider) {

		$urlRouterProvider.when("", "/")
		.otherwise(function($injector, $location){
			$injector.invoke(['$state', function($state) {
    			window.location = $location['$$absUrl'];
  			}]);
  		});
		// $rootScope.$viewHistory.backView = null;
		$stateProvider
		.state("/", {
			url: "/",
			templateUrl: "/"
		})
		.state("search", {
			url: "/search/index.html",
			templateUrl: "/search/index.html"
		})
		.state("user", {
			url: "/user/:actionName/:tplName.html",
			templateUrl: function ($stateParams){
			    return '/user/' + $stateParams.actionName + '/' + $stateParams.tplName + '.html';
			}
		})
		.state("list", {
			url: "/list/index/id/:listId.html",
			templateUrl: function ($stateParams){
			    return '/list/index/id/' + $stateParams.listId + '.html';
			}
		})
		.state("article", {
			url: "/article/index/id/:articleId.html",
			templateUrl: function ($stateParams){
			    return '/article/index/id/' + $stateParams.articleId + '.html';
			}
		})
		.state("comment", {
			url: "/comment/comment/:tplName.html",
			templateUrl: function ($stateParams){
			    return '/comment/comment/' + $stateParams.tplName + '.html';
			}
		})
		

		cfpLoadingBarProvider.includeSpinner = true;
		$locationProvider.html5Mode(true);
		$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
		$httpProvider.defaults.headers.common['X-Requested-With'] = 'application/angularjs';
		
	});

	cultural.run(function($rootScope){
	    $rootScope
	        .$on('$stateChangeStart', 
	            function(event, toState, toParams, fromState, fromParams){ 
	                $("#layout").html("<div class='tf-spin' ng-show='loading'><i class='fa fa-spinner fa-3x fa-spin'></i><p>数据加载中</p></div>");
	        });
	    $rootScope
	        .$on('$stateChangeSuccess',
	            function(event, toState, toParams, fromState, fromParams){ 
	                $("#layout").remove(".tf-spin");
	        });

	});
</script>
<script type="text/javascript">
$(function(){
	$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
	
	;(function($){
		$.fn.totop=function(opt){
			var scrolling=false;
			return this.each(function(){
				var $this=$(this);
				$(window).scroll(function(){
					if(!scrolling){
						var sd=$(window).scrollTop();
						if(sd>100){
							$this.fadeIn();
						}else{
							$this.fadeOut();
						}
					}
				});
				
				$this.click(function(){
					scrolling=true;
					$('html, body').animate({
						scrollTop : 0
					}, 500,function(){
						scrolling=false;
						$this.fadeOut();
					});
				});
			});
		};
	})(jQuery);
	
	$("#backtotop").totop();
	
});
</script>


<!-- Footer -->

<hr>
<div id="footer" style="text-align: center;">
  <div class="links">
    <?php $links=sp_getlinks(); ?>
    <?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endforeach; endif; ?>
  </div>
  <p>
  Made by <a href="http://www.thinkcmf.com">ThinkCMF</a>
  Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" rel="nofollow" target="_blank">Apache License v2.0</a>.<br/>
  Based on <a href="http://getbootstrap.com/2.3.2/" target="_blank">Bootstrap</a>.  Icons from <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">Font Awesome</a>
  </p>
</div>
<div id="backtotop"><i class="fa fa-arrow-circle-up"></i></div>

</body>
</html>