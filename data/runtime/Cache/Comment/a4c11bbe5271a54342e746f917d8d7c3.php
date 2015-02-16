<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html xmlns:ng="http://angularjs.org">
	<head>
		<title><?php echo ($name); ?> <?php echo ($seo_title); ?> <?php echo ($site_name); ?></title>
		<meta name="keywords" content="<?php echo ($seo_keywords); ?>" />
		<meta name="description" content="<?php echo ($seo_description); ?>">
		<?php $portal_index_lastnews=2; $portal_hot_articles="1,2"; $portal_last_post="1,2"; $tmpl=sp_get_theme_path(); ?>
		<base href="/">
		<meta charset="utf-8">
		<!--[if !IE]><!--> 
			<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':8080/livereload.js?snipver=1"></' + 'script>')</script>
		<!--<![endif]-->
		<link href="http://wangsong.com/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://wangsong.com/statics/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://wangsong.com/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="http://wangsong.com/statics/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="http://wangsong.com/statics/css/style.css" rel="stylesheet">
		<script type="text/javascript">
			var GV = {
				DIMAUB: "http://wangsong.com/",
				JS_ROOT: "statics/js/",
				TOKEN: ""
			};
		</script>
		<!--[if IE]>
			<script src="http://wangsong.com/statics/js/angular/es5-shim.min.js"></script>
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
            <script src="http://wangsong.com/statics/js/IE7.js"></script>
        <![endif]-->
        <!--[if lt IE 8]>
            <script src="http://wangsong.com/statics/js/IE8.js"></script>
		 	<script src="http://wangsong.com/statics/js/json3.min.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="http://wangsong.com/statics/js/IE9.js"></script>
		 	<script src="http://wangsong.com/statics/js/json3.min.js"></script>
        <![endif]-->

		<script src="http://wangsong.com/statics/js/jquery.js"></script>
		<script src="http://wangsong.com/statics/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body ng-app="cultural" class="ng-app:cultural" id="ng-app">
		<!--[if lt IE 8]>
	        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
	    <![endif]-->
		<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="http://wangsong.com/" target="_self"><img src="http://wangsong.com/statics/images/logo.png"/></a>
			<div class="nav-collapse collapse" id="main-menu">
				<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
				<ul class="nav pull-right" id="main-menu-left">
					<li class="dropdown">
						<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="javaScript:void(0);">
							<?php if(empty($user['avatar'])): ?><img src="http://wangsong.com/statics/images/headicon.png" class="headicon"/>
							<?php else: ?>
							<img src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
						<?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
						<ul class="dropdown-menu pull-right">
							<li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
						</ul>
						<?php else: ?>
						<a class="dropdown-toggle user" data-toggle="dropdown" href="javaScript:void(0);">
							<img src="http://wangsong.com/statics/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
						</a>
						<ul class="dropdown-menu pull-right">
							<!-- <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li> -->
							<!-- <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li> -->
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
<div id="layout" ui-view>

</div>

<!-- JavaScript -->
<!-- Javascript -->
<link rel="stylesheet" href="http://wangsong.com/statics/js/sweetalert/sweet-alert.css">
<script src="http://wangsong.com/statics/js/sweetalert/sweet-alert.min.js"></script>
<script type="text/javascript" src="http://ueditor.baidu.com/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="http://ueditor.baidu.com/ueditor/ueditor.all.js"></script>
<script src="http://wangsong.com/statics/js/angular/angular.min.js"></script>
<!-- <script src="http://wangsong.com/statics/js/angular/angular.js"></script> -->
<script src="http://wangsong.com/statics/js/angular/angular-ui-router.js"></script>
<!--[if IE]>
<script>
    window.FileAPI = {
        jsUrl: 'http://wangsong.com/statics/js/angular/FileAPI.min.js',
        flashUrl: 'http://wangsong.com/statics/js/angular/FileAPI.flash.swf',
    }
</script>
<script src="http://wangsong.com/statics/js/angular/angular-file-upload-shim.min.js"></script>
<![endif]-->
<script src="http://wangsong.com/statics/js/angular/angular-file-upload.min.js"></script>
<script src="http://wangsong.com/statics/js/angular/loading-bar.js"></script>
<link href='http://wangsong.com/statics/js/angular/loading-bar.css' rel='stylesheet' />

<script type="text/javascript">
	
	var cultural = angular.module('cultural',['ui.router','angular-loading-bar','angularFileUpload']);
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
			.state("/", {
				url: "/",
				templateUrl: "/index"
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
					// console.log($stateParams.actionName);
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