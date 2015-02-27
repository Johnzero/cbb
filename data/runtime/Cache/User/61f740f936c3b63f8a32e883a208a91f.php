<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main register">
	<div class="row">
		<div class="span6 offset3">
			<h2 class="text-center">创建账号</h2>
			<form class="form-horizontal" ng-submit="registerSubmit($event)" ng-controller="registerCtl">
				<div class="control-group">
					<label class="control-label" for="input_username">账号：</label>
					<div class="controls">
						<input type="text" name="username" placeholder="请输入账号" class="span3" ng-model="register.username">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_email">邮箱：</label>
					<div class="controls">
						<input type="text" name="email" placeholder="请输入邮箱" class="span3" ng-model="register.email">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_password">密码：</label>
					<div class="controls">
						<input type="password" name="password" placeholder="请输入密码" class="span3" ng-model="register.password">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword">重复密码：</label>
					<div class="controls">
						<input type="password" name="repassword" placeholder="请输入重复密码" class="span3" ng-model="register.repassword">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_verify">验证码：</label>
					<div class="controls">
						<input type="hidden" name="terms" ng-model="register.terms" value="1">
						<input type="text" name="verify" placeholder="请输入验证码" class="span3" ng-model="register.verify">
						<?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="submit"></label>
					<div class="controls">
						<button class="btn confirm-btn" type="submit">确定注册</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="login"></label>
					<div class="controls">
						<p>
						已有账号? <a href="<?php echo u('user/login/index');?>">点击此处登录</a>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>