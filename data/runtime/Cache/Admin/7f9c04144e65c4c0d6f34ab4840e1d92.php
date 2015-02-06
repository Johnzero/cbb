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
		<link href="/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/statics/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="/statics/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
		<!--[if IE 7]>
		<link rel="stylesheet" href="/statics/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link href="/statics/css/style.css" rel="stylesheet">
		<script type="text/javascript">
			var GV = {
				DIMAUB: "/",
				JS_ROOT: "statics/js/",
				TOKEN: ""
			};
		</script>
		<script src="/statics/js/jquery.js"></script>
		<script src="/statics/bootstrap/js/bootstrap.min.js"></script>
		<!--[if lte IE 7]>
		    <script src="/statics/js/json2.js"></script>
		 <![endif]-->
		<!--[if lte IE 8]>
			<script>
				document.createElement('ng-include');
				document.createElement('ng-pluralize');
				document.createElement('ng-view');

				// Optionally these for CSS
				document.createElement('ng:include');
				document.createElement('ng:pluralize');
				document.createElement('ng:view');
			</script>
		<![endif]-->
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
			<a class="brand" href="/" target="_self"><img src="/statics/images/logo.png"/></a>
			<div class="nav-collapse collapse" id="main-menu">
				<?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; echo sp_get_menu("main",$effected_id,$filetpl,$foldertpl,$ul_class,$li_class,$style,$showlevel,$dropdown); ?>
				<ul class="nav pull-right" id="main-menu-left">
					<li class="dropdown">
						<?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="#">
							<?php if(empty($user['avatar'])): ?><img src="/statics/images/headicon.png" class="headicon"/>
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
							<img src="/statics/images/headicon.png" class="headicon"/>登录<b class="caret"></b>
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
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px;text-align: center; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; text-align: center;}
.system-message .jump{ padding-top: 10px}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
<div class="system-message">
<?php if(isset($message)): ?><h1>^_^</h1>
<p class="success"><?php echo($message); ?></p>
<?php else: ?>
<h1>&gt;_&lt;</h1>
<p class="error"><?php echo($error); ?></p><?php endif; ?>
	<p class="detail"></p>
	<p class="jump">
	ThinkCMF：页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
	</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>

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