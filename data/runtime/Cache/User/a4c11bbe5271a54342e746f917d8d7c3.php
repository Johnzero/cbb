<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html xmlns:ng="http://angularjs.org">
	<head>
		<title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($seo_description); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
		<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); ?>
		<base href="/">
		<meta charset="utf-8">
		<link href="http://www.ahwenhui.com/statics/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="http://www.ahwenhui.com/statics/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://www.ahwenhui.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
		<link href="http://www.ahwenhui.com/statics/css/style.css" rel="stylesheet">
		<script type="text/javascript">
			var GV = {
				DIMAUB: "http://www.ahwenhui.com/",
				JS_ROOT: "statics/js/",
				TOKEN: ""
			};
		</script>
		<!--[if IE]>
			<script src="http://www.ahwenhui.com/statics/js/respond.min.js"></script>
			<script src="http://www.ahwenhui.com/statics/js/angular/es5-shim.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script>
				document.createElement('ng-include');
				document.createElement('ng-pluralize');
				document.createElement('ng-view');
				document.createElement('ng:include');
				document.createElement('ng:pluralize');
				document.createElement('ng:view');
			</script>
		<![endif]-->

		<!--[if lt IE 7]>
            <script src="http://www.ahwenhui.com/statics/js/IE7.js"></script>
        <![endif]-->
        <!--[if lt IE 8]>
            <script src="http://www.ahwenhui.com/statics/js/IE8.js"></script>
		 	<script src="http://www.ahwenhui.com/statics/js/json3.min.js"></script>
        <![endif]-->
		<script src="http://www.ahwenhui.com/statics/js/jquery.js"></script>
		<script src="http://www.ahwenhui.com/statics/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body ng-app="cultural" class="ng-app:cultural" id="ng-app">
		<!--[if lt IE 8]>
	        <div class="alert alert-danger" style="margin-bottom: 0">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a target="_blank" href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
	    <![endif]-->
		<div class="tophead">
	<div class="headtopNav">
		<div class="pull-left">
			<span>欢迎访问 <a href="http://www.ahwenhui.com"><?php echo ($site_name); ?></a></span>
			<?php $days = array('星期天','星期一','星期二','星期三','星期四','星期五','星期六');$today = date('w'); ?>
			<span class="date"><?php echo date(Y年m月d日); ?> <?php echo $days[$today]; ?></span>
		</div>
		<div class="right-bar">
			<ul>
				<li class="li-after">
					<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="javaScript:void(0);">
						<?php if(empty($user['avatar'])): ?><img src="http://www.ahwenhui.com/statics/images/headicon.png" class="headicon"/>
						<?php else: ?>
							<img src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
						<?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
					</ul>
					<?php else: ?>
					<a href="<?php echo u('user/login/index');?>" class="login"><i class="fa fa-sign-in"></i>&nbsp;登录&nbsp;</a>
					<a href="<?php echo u('user/register/index');?>" class="login"><i class="fa fa-user"></i>&nbsp;注册</a><?php endif; ?>
				</li>
				<li>
					<form class="form-search active" ng-submit="onSearchSubmit()" ng-controller="searchCtl">
						<input type="text" ng-model="searchForm.keyword" placeholder="站内搜索..." name="keyword" value="<?php echo I('get.keyword');?>"/>
						<i class="fa fa-search" type="submit" ng-click="onSearchSubmit()"></i>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="navbar">
	<div class="navbar-inner">
		<a class="pull-left" href="http://www.ahwenhui.com/"><img src="http://www.ahwenhui.com/statics/images/logo.png"/></a>
		<img src="http://www.ahwenhui.com/statics/images/1.png" class="pull-left wz1">
		<img src="http://www.ahwenhui.com/statics/images/2.png" class="pull-left wz2">
		<img src="http://www.ahwenhui.com/statics/images/3.png" class="pull-left wz3">
		<img src="http://www.ahwenhui.com/statics/images/4.png" class="pull-left wz4">
		<img src="http://www.ahwenhui.com/statics/images/top.png" class="pull-right">
	</div>
</div>
<div class="navbar navbar-menu headroom" style="min-width:1170px !important;margin:0 auto">
	<div class="menu">
		<div class="menu-section">
			<a href="http://www.ahwenhui.com"><i class="fa fa-home" style="font-size: 35px;margin-top: 2px;"></i>首页</a>
		</div>

		<div class="menu-section">
			<a href="<?php echo u('list/index',array('id'=>3));?>" class="gesp">
			<img src="http://www.ahwenhui.com/statics/images/dszx.png" width="30" style="margin-top: 15px;"><br/>
			电商资讯</a>
			<ul class="sub-menu">
				<li><a href="<?php echo u('list/index',array('id'=>14));?>">电商新闻</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>15));?>">行业数据</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>16));?>">人物观点</a></li><br/>
				<li><a href="<?php echo u('list/index',array('id'=>17));?>">典型案例</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>18));?>">电商干货</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>19));?>">电商专题</a></li>
			</ul>
		</div>

		<div class="menu-section">
			<a class="gesp">
			<img src="http://www.ahwenhui.com/statics/images/whcy.png" width="20" style="margin-top: 14px;"><br/>文化产业</a>
			<ul class="sub-menu">
				<li><a href="<?php echo u('list/index',array('id'=>20));?>">文产新闻</a></li>
				<li><a href="<?php echo u('company/index');?>">文化企业</a></li><br/>
				<li><a href="<?php echo u('list/index',array('id'=>22));?>">项目对接</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>23));?>">文化活动</a></li>
			</ul>
		</div>

		<div class="menu-section">
			<a class="gesp"><img src="http://www.ahwenhui.com/statics/images/lmkj.png" width="25" style="margin-top: 12px;"><br/>联盟空间</a>
			<ul class="sub-menu">
				<li><a href="<?php echo u('page/index',array('id'=>47));?>">联盟简介</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>25));?>">联盟动态</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>26));?>">政策法规</a></li><br/>
				<li><a href="<?php echo u('list/index',array('id'=>27));?>">联盟公告</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>28));?>">联盟文库</a></li>
				<li><a href="<?php echo u('list/index',array('id'=>29));?>">联盟服务</a></li>
			</ul>
		</div>

	</div>
</div>

<!-- ng-Layout -->
<div id="layout" ui-view="" class="slide-left">

</div>

<!-- JavaScript -->
<!-- Javascript -->
<script src="http://www.ahwenhui.com/statics/js/headroom/headroom.js"></script>
<script src="http://www.ahwenhui.com/statics/js/headroom/jQuery.headroom.js"></script>
<link rel="stylesheet" href="http://www.ahwenhui.com/statics/js/sweetalert/sweet-alert.css">
<script src="http://www.ahwenhui.com/statics/js/sweetalert/sweet-alert.min.js"></script>
<script type="text/javascript" src="http://ueditor.baidu.com/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="http://ueditor.baidu.com/ueditor/ueditor.all.js"></script>
<script src="http://www.ahwenhui.com/statics/js/angular/angular.js"></script>
<script src="http://www.ahwenhui.com/statics/js/angular/angular-ui-router.js"></script>
<script src="http://www.ahwenhui.com/statics/js/angular/angular-animate.js"></script>
<script src="http://www.ahwenhui.com/statics/slick/slick.min.js"></script>
<!--[if IE]>
<script>
    window.FileAPI = {
        jsUrl: 'http://www.ahwenhui.com/statics/js/angular/FileAPI.min.js',
        flashUrl: 'http://www.ahwenhui.com/statics/js/angular/FileAPI.flash.swf',
    }
</script>
<script src="http://www.ahwenhui.com/statics/js/angular/angular-file-upload-shim.min.js"></script>
<![endif]-->
<script src="http://www.ahwenhui.com/statics/js/angular/angular-file-upload.min.js"></script>
<script src="http://www.ahwenhui.com/statics/js/angular/loading-bar.js"></script>
<link href='http://www.ahwenhui.com/statics/js/angular/loading-bar.css' rel='stylesheet' />
<script type="text/javascript">
	
	var cultural = angular.module('cultural',['ui.router','angular-loading-bar','angularFileUpload','ngAnimate']);
	cultural.run(
		['$rootScope', '$state', '$stateParams',
			function ($rootScope,   $state,   $stateParams) {
				$rootScope.$state = $state;
				$rootScope.$stateParams = $stateParams;
			}
		]
	).config(function(cfpLoadingBarProvider,$stateProvider, $urlRouterProvider,$locationProvider,$httpProvider) {
		// $urlRouterProvider.otherwise(function($injector, $location){
		// 	$injector.invoke(['$state', function($state) {
		// 		window.location = $location['$$absUrl'];
		// 	}]);
		// });
		$urlRouterProvider.otherwise('/');  
		$urlRouterProvider.when('', '/');
		$stateProvider
			.state("index", {
				url: "/",
				templateUrl: "/index"
			})
			.state("index.page", {
				url: "index/page/p/:pageId.html",
				views: {
					'subview': {
						templateUrl: function ($stateParams){
							$('html, body').animate({
								scrollTop : 900
							}, 500,function(){
								scrolling=false;
							});
							return '/index/page/p/' + $stateParams.pageId + '.html';
						}
					}
				}
			})
			.state("index.content", {
				url: "index/content/id/:Id.html",
				views: {
					'subview': {
						templateUrl: function ($stateParams){
							// $('html, body').animate({
							// 	scrollTop : 900
							// }, 500,function(){
							// 	scrolling=false;
							// });
							return '/index/content/id/' + $stateParams.Id + '.html';
						}
					}
				}
			})
			.state("index.content/page", {
				url: "index/content/id/:Id/p/:pageId.html",
				views: {
					'subview': {
						templateUrl: function ($stateParams){
							// $('html, body').animate({
							// 	scrollTop : 900
							// }, 500,function(){
							// 	scrolling=false;
							// });
							return '/index/content/id/' + $stateParams.Id +'/p/' + $stateParams.pageId + '.html'
						}
					}
				}
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
			.state("page", {
				url: "/page/index/id/:pageId.html",
				templateUrl: function ($stateParams){
					return '/page/index/id/' + $stateParams.pageId + '.html';
				}
			})
			.state("company/index", {
				url: "/company/index.html",
				templateUrl: function ($stateParams){
					return '/company/index.html';
				}
			})
			.state("company/detail", {
				url: "/company/detail/id/:dId.html",
				templateUrl: function ($stateParams){
					$('html, body').animate({
						scrollTop : 0
					}, 0,function(){
						scrolling=false;
					});
					return '/company/detail/id/' + $stateParams.dId + '.html';
				}
			})
			.state("list", {
				url: "/list/index/id/:listId.html",
				templateUrl: function ($stateParams){
					return '/list/index/id/' + $stateParams.listId + '.html';
				}
			})
			.state("list/page", {
				url: "/list/page/id/:listId/p/:pageId.html",
				templateUrl: function ($stateParams){
					$('html, body').animate({
						scrollTop : 100
					}, 500,function(){
						scrolling=false;
					});
					return '/list/index/id/' + $stateParams.listId +'/p/' + $stateParams.pageId + '.html';
				}
			})
			.state("list/keyword", {
				url: "/list/keyword/id/:keyWord.html",
				templateUrl: function ($stateParams){
					return '/list/keyword/id/' + $stateParams.keyWord + '.html';
				}
			})
			.state("article", {
				url: "/article/index/id/:articleId.html",
				templateUrl: function ($stateParams){
					$('html, body').scrollTop(0);
					return '/article/index/id/' + $stateParams.articleId + '.html';
				},
				controller: function($scope) {
					if (window._bd_share_main != undefined) {
						window._bd_share_main.init();
					}
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
		$locationProvider.hashPrefix('!');
		$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
		$httpProvider.defaults.headers.common['X-Requested-With'] = 'application/angularjs';
		$httpProvider.defaults.headers.common['Cache-control'] = 'no-cache';
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

	cultural.directive('ueditor', [function($scope) {
        return {
            restrict: 'A',
            link: function($scope, element, attrs){
              	// var editor = new UE.ui.Editor({initialContent: $scope.post.post_content});
              	var editor = new UE.ui.Editor();
              	editor.render(element[0]);
              	editor.ready(function(){
	                editor.addListener('contentChange', function(){
	                  	$scope.post['post_content'] = editor.getContent();
	                  	$scope.$root.$$phase || $scope.$apply();
	                });
                });
            }
        };
    }])

    cultural.controller('postCtl', function ($scope, $http, $state, $upload) {
		$scope.postAdd = function($event) {
			if ( !$scope.post ) {
				sweetAlert("投稿错误！", "请填写完整信息!", "error");
				return;
			}else if ( !$scope.post.post_title ) {
				sweetAlert("投稿错误！", "请填写标题!", "error");
				return;
			}else if ( !$scope.post.term_id ) {
				sweetAlert("投稿错误！", "请选择栏目!", "error");
				return;
			}else if ( !$scope.post.post_keywords ) {
				sweetAlert("投稿错误！", "请填写关键词!", "error");
				return;
			}else if ( !$scope.post.post_excerpt ) {
				sweetAlert("投稿错误！", "请填写摘要!", "error");
				return;
			}else if ( !$scope.post.post_content ) {
				sweetAlert("投稿错误！", "请填写内容!", "error");
				return;
			}else if ( !$scope.post.smeta.thumb ) {
				sweetAlert("投稿错误！", "请上传缩略图!", "error");
				return;
			}
			$http({
				method  : 'POST',
				url     : "<?php echo u('user/post/add_post');?>",
				data    : $.param($scope.post),
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			})
			.success(function(data) {
				sweetAlert(data.info, data.data, data.status);
				if ( data.status == "success" ) {
					$state.go("user", {"actionName":"post","tplName":"index"}, {reload: true});
				}
			})
			.error( function () {
				sweetAlert("投稿错误！", "网络异常，请稍后重试！","error");
			});

			$event.preventDefault();
		}
		$scope.usingFlash = window.FileAPI && window.FileAPI.upload != null;
	    if ( (typeof (window.FileAPI) != 'undefined') ) {
	    	var thumb = document.getElementById('file_input');
	    	window.FileAPI.event.on(thumb, 'change', function (evt){
			    var files = window.FileAPI.getFiles(thumb);
			    $scope.thumb(files);
			});
	    }

		$scope.thumb = function (files) {
	        if (files && files.length) {
	            for (var i = 0; i < files.length; i++) {
	                var file = files[i];
	                $upload.upload({
	                    url: "/user/index/postupload.html",
	                    file: file
	                }).progress(function (evt) {
	                	$scope.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	                }).success(function (response, status, headers, config) {
                		if ( response.status == "error" ) {
							sweetAlert(response.info, response.data, response.status);
						}else {
							$scope.post.smeta.thumb = response.data;
							$("#thumb").val("/data/upload/post/"+response.data);
							$("#thumb_preview").attr("src","/data/upload/post/"+response.data);
						}
	                });
	            }
	        }
	    };
	});

	cultural.controller('searchCtl', function ($scope, $state, $location) {
		$scope.onSearchSubmit = function() {
			if (!$scope.searchForm) {
				sweetAlert("请输入关键词！", "", "error");
				return;
			}
			$state.go("search", {keyword: $scope.searchForm.keyword}, {reload:true,inherit:true});
		}
	});

	cultural.controller('avatarCtl', function ($scope, $state, $upload) {
	    $scope.usingFlash = window.FileAPI && window.FileAPI.upload != null;
	    if ( (typeof (window.FileAPI) != 'undefined') ) {
	    	var el = document.getElementById('avatar_uploder');
	    	window.FileAPI.event.on(el, 'change', function (evt){
			    var files = window.FileAPI.getFiles(el);
			    $scope.upload(files);
			});
	    }
	    $scope.upload = function (files) {
	        if (files && files.length) {
	            for (var i = 0; i < files.length; i++) {
	                var file = files[i];
	                $upload.upload({
	                    url: "/user/profile/avatar_upload.html",
	                    file: file
	                }).progress(function (evt) {
	                    file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	                }).success(function (response, status, headers, config) {
                    	if ( response.status == "error" ) {
							sweetAlert(response.info, response.data, "error");
						}else {
							$(".headicon").attr("src","/data/upload/avatar/"+response.data);
						}
	                });
	            }
	        }
	    };
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
		$scope.profileEdit = function($event) {
			$http({
				method  : 'POST',
				url     : "<?php echo u('user/profile/edit_post');?>",
				data    : $.param($scope.profileForm),  
				headers : {'Content-Type': 'application/x-www-form-urlencoded'}
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

	cultural.controller('passeditCtl', function ($scope, $http, $location) {
		$scope.passEdit = function($event) {
			if ( !$scope.passeditForm ) {
				sweetAlert("修改密码", "请填写内容!", "error");
				return;
			}
			$http({
				method  : 'POST',
				url     : "<?php echo u('profile/password_post');?>",
				data    : $.param($scope.passeditForm),  
				headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
			})
			.success(function(data) {
				sweetAlert(data.info, data.data, data.status);
				if ( data.status == "success") {
					$location.path(data.referer).replace();
				}
			})
			.error( function () {
				sweetAlert("网络错误！", "网络异常，请稍后重试！","error");
			});
			$event.preventDefault();
		}
	});
		
	cultural.controller('companyCtl', function ($scope, $http, $window, $upload) {
		$scope.companySubmit = function($event) {
			if ( !$scope.companyForm ) {
				sweetAlert("认证错误！", "请填写完整信息!", "error");
				return;
			}else if ( !$scope.companyForm.name ) {
				sweetAlert("认证错误！", "请填写公司名称!", "error");
				return;
			}else if ( !$scope.companyForm.location ) {
				sweetAlert("认证错误！", "请填写公司地址!", "error");
				return;
			}else if ( !$scope.companyForm.tel ) {
				sweetAlert("认证错误！", "请填写公司电话!", "error");
				return;
			}else if ( !$scope.companyForm.contact ) {
				sweetAlert("认证错误！", "请填写联系人姓名!", "error");
				return;
			}else if ( !$scope.companyForm.ctel ) {
				sweetAlert("认证错误！", "请填写联系人电话!", "error");
				return;
			}else if ( !$scope.companyForm.email ) {
				sweetAlert("认证错误！", "请填写电子邮箱!", "error");
				return;
			}else if ( !$scope.companyForm.code ) {
				sweetAlert("认证错误！", "请填写营业执照号!", "error");
				return;
			}else if ( !$scope.companyForm.group ) {
				sweetAlert("认证错误！", "请填写组织机构代码!", "error");
				return;
			}else if ( !$scope.companyForm.code_pic ) {
				sweetAlert("认证错误！", "请上传营业执照电子版!", "error");
				return;
			}else if ( !$scope.companyForm.group_pic ) {
				sweetAlert("认证错误！", "请上传组织机构电子版!", "error");
				return;
			}
			$http({
				method  : 'POST',
				url     : "<?php echo u('user/profile/company');?>",
				data    : $.param($scope.companyForm),
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
				sweetAlert("认证错误！", "网络异常，请稍后重试！","error");
			});
			$event.preventDefault();
		}

		$scope.usingFlash = window.FileAPI && window.FileAPI.upload != null;
	    if ( (typeof (window.FileAPI) != 'undefined') ) {
	    	var code = document.getElementById('code_pic');
	    	var group = document.getElementById('group_pic');
	    	window.FileAPI.event.on(code, 'change', function (evt){
			    var files = window.FileAPI.getFiles(code);
			    $scope.code(files);
			});
			window.FileAPI.event.on(group, 'change', function (evt){
			    var files = window.FileAPI.getFiles(group);
			    $scope.group(files);
			});
	    }

		$scope.code = function (files) {
	        if (files && files.length) {
	            for (var i = 0; i < files.length; i++) {
	                var file = files[i];
	                $upload.upload({
	                    url: "/user/index/picupload.html",
	                    file: file
	                }).progress(function (evt) {
	                    $scope.code_progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	                }).success(function (response, status, headers, config) {
                		if ( response.status == "error" ) {
							sweetAlert(response.info, response.data, response.status);
						}else {
							$scope.companyForm.code_pic = response.data;
							$("input[name='code_pic']").prev().attr("src","/data/upload/company/"+response.data);
						}
	                });
	            }
	        }
	    };

	    $scope.group = function (files) {
	        if (files && files.length) {
	            for (var i = 0; i < files.length; i++) {
	                var file = files[i];
	                $upload.upload({
	                    url: "/user/index/picupload.html",
	                    file: file
	                }).progress(function (evt) {
	                	$scope.group_progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
	                }).success(function (response, status, headers, config) {
                		if ( response.status == "error" ) {
							sweetAlert(response.info, response.data, response.status);
						}else {
							$scope.companyForm.group_pic = response.data;
							$("input[name='group_pic']").prev().attr("src","/data/upload/company/"+response.data);
						}
	                });
	            }
	        }
	    };
	});

	cultural.controller('registerCtl', function ($scope, $http, $window, $location) {
		$scope.registerSubmit = function($event,FileUploader) {
			if ( !$scope.register ) {
				sweetAlert("注册出错！！", "请填写完整信息!", "error");
				return;
			}else if ( !$scope.register.username ) {
				sweetAlert("注册出错！！", "请输入账号!", "error");
				return;
			}else if ( !$scope.register.email ) {
				sweetAlert("注册出错！！", "请输入邮箱!", "error");
				return;
			}else if ( !$scope.register.password ) {
				sweetAlert("注册出错！！", "请输入密码!", "error");
				return;
			}else if ( !$scope.register.repassword ) {
				sweetAlert("注册出错！！", "请再输入一次密码!", "error");
				return;
			}else if ( !$scope.register.verify ) {
				sweetAlert("注册出错！！", "请输入验证码!", "error");
				return;
			}

			$http({
				method  : 'POST',
				url     : "<?php echo u('user/register/doregister');?>",
				data    : $.param($scope.register),
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
				sweetAlert("注册出错！！", "网络异常，请稍后重试！","error");
			});
			$event.preventDefault();
		}
	});
</script>
<script type="text/javascript">
	$(function(){
		$(".headroom").headroom({
			"tolerance": 10,
			"offset": 205,
			"classes": {
			    "initial": "animated",
			    "pinned": "flipInX",
			    "unpinned": "flipOutX"
  			}
  		});
		$('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
		;(function($){
			$.fn.totop=function(opt){
				var scrolling=false;
				return this.each(function(){
					var $this=$(this);
					$(window).scroll(function(){
						if(!scrolling){
							var sd = $(window).scrollTop();
							if(sd > 250){
								$this.fadeIn();
								$(".headroom").addClass("header--fixed");
							}else{
								$this.fadeOut();
								$(".headroom").removeClass("header--fixed");
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

		if (document.createElement('input').placeholder !== '') {
	        $('[placeholder]').focus(function () {
	            var input = $(this);
	            if (input.val() == input.attr('placeholder')) {
	                input.val('');
	                input.removeClass('placeholder');
	            }
	        }).blur(function () {
	            var input = $(this);
	            if (input.val() == '' || input.val() == input.attr('placeholder')) {
	                input.addClass('placeholder');
	                input.val(input.attr('placeholder'));
	            }
	        }).blur().parents('form').submit(function () {
	            $(this).find('[placeholder]').each(function () {
	                var input = $(this);
	                if (input.val() == input.attr('placeholder')) {
	                    input.val('');
	                }
	            });
	        });
	    }  
	});	
</script>
<!--[if gt IE 8]><!--> 
<script type="text/javascript">
	$(document).ready(function () {
		fadeto = function (){
	    	var value = Math.random();
	    	$(".wz1").fadeTo("slow",value);
	    	value = Math.random();
	    	$(".wz2").fadeTo("slow",value);
	    	value = Math.random();
	    	$(".wz3").fadeTo("slow",value);
	    	value = Math.random();
	    	$(".wz4").fadeTo("slow",value);
	    };
		setInterval("fadeto()",2000);
	})
</script>
<!--<![endif]-->

<!-- Footer -->
<div class="footer">
    <div class="links">
        <!-- <?php $links=sp_getlinks(); ?>
        <?php if(is_array($links)): foreach($links as $key=>$vo): ?><a href="<?php echo ($vo["link_url"]); ?>" target="<?php echo ($vo["link_target"]); ?>"><?php echo ($vo["link_name"]); ?></a><?php endforeach; endif; ?> -->
        <p>
            中国安徽在线网站(中安在线)版权所有&nbsp;1999-2014
        </p>
        <p>
            中国安徽在线网站(中安在线)版权所有 未经允许 请勿复制或镜像
        </p>
    </div>
</div>
<div id="backtotop"><i class="fa fa-arrow-circle-up"></i></div>
</body>
</html>