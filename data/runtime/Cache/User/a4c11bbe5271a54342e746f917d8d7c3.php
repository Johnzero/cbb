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
					<form ng-submit="onSearchSubmit()" class="form-inline" style="margin:18px 0;" ng-controller="searchCtl">
						<input type="text" class="" ng-model="searchForm.keyword" placeholder="Search" name="keyword" value="<?php echo I('get.keyword');?>"/>
						<input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- ng-Layout -->
<div id="layout" data-ui-view="">

</div>

<!-- JavaScript -->
<!-- Javascript -->
<script src="/statics/js/sweetalert/sweet-alert.min.js"></script>
<link rel="stylesheet" href="/statics/js/sweetalert/sweet-alert.css">
<script src="/statics/js/angular/angular.js"></script>
<script src="/statics/js/angular/angular-animate.js"></script>
<script src="/statics/js/angular/angular-ui-router.js"></script>
<script src="/statics/js/angular/loading-bar.js"></script>
<link href='/statics/js/angular/loading-bar.css' rel='stylesheet' />
<script type="text/javascript">
	var cultural = angular.module('cultural', ['ui.router','angular-loading-bar','ngAnimate']);
	
	cultural.config(function(cfpLoadingBarProvider,$stateProvider, $urlRouterProvider,$locationProvider,$httpProvider) {
		
		$urlRouterProvider.otherwise('/');

		$stateProvider
		.state("/", {
			url: "/",
			templateUrl: "/"
		})
		.state("search", {
			url: "/search/:keyword",
			templateUrl: function ($stateParams){
				if ($stateParams.keyword) {
					return '/search/index.html?keyword=' + $stateParams.keyword;
				}
				else {
					return "/";
				}
			}
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
	})

	cultural.directive('input', function ($parse) {
		return {
			restrict: 'E',
			require: '?ngModel',
			link: function (scope, element, attrs) {
				if (attrs.ngModel && attrs.value) {
			    	$parse(attrs.ngModel).assign(scope, attrs.value);
				}
			}
		};
	});
	
	cultural.controller('searchCtl', function ($scope, $state, $location) {
		$scope.onSearchSubmit = function() {
			$state.go("search", {keyword: $scope.searchForm.keyword}, {reload:true,inherit:true});
		}
	});

	cultural.controller('loginCtl', function ($scope, $http, $state, $location, $window) {
		$scope.onloginSubmit = function($event) {
			if ( !$scope.loginForm ) {
				sweetAlert("登陆错误！", "请填写内容!", "error");
				return;
			}else if ( !$scope.loginForm.username ) {
				sweetAlert("登陆错误！", "请填写用户名!", "error");
				return;
			}else if ( !$scope.loginForm.verify ) {
				sweetAlert("登陆错误！", "请输入验证码!", "error");
				return;
			}else if ( !$scope.loginForm.password ) {
				sweetAlert("登陆错误！", "请输入密码!", "error");
				return;
			}else if ( !$scope.loginForm.terms ) {
				sweetAlert("登陆错误！", "请同意网站内容服务条款!", "error");
				return;
			}

			$http({
				method  : 'POST',
				url     : "<?php echo u('user/login/dologin');?>",
				data    : $.param($scope.loginForm),  // pass in data as strings
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			})
			.success(function(data) {

				sweetAlert(data.info, data.data, data.status);
				if ( data.status == "success" ) {
					// $location.path(data.referer).replace();
					// $window.location.reload(true);
					// $state.go("user", {"actionName":"center","tplName":"index"}, {reload: true});
					$window.location.href = data.referer;
				}
			})
			.error( function () {
				sweetAlert("登陆错误！", "网络异常，请稍后重试！","error");
			});

			$event.preventDefault();
		}
	});

	cultural.controller('profileEditCtl', function ($scope, $http, $location) {
		// $scope.profileForm.user_nicename = '';
		$scope.profileEdit = function($event) {
			$http({
				method  : 'POST',
				url     : "<?php echo u('user/profile/edit_post');?>",
				data    : $.param($scope.profileForm),  
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			})
			.success(function(data) {
				sweetAlert(data.info, data.data, data.status);
				if ( data.status == "success") {
					$location.path(data.referer).replace();
				}
			})
			.error( function () {
				sweetAlert("登陆错误！", "网络异常，请稍后重试！","error");
			});

			$event.preventDefault();
		}
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