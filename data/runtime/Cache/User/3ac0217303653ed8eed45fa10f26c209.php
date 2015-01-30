<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span6 offset3">
			<h2 class="text-center">用户登录</h2>
			<form ng-submit="processForm()" ng-controller="formController">

				<div class="form-group">
					<label>账号</label>
					<input type="text" name="username" class="form-control" placeholder="请输入用户名或者邮箱..." ng-model="formData.username">
				</div>

				<div class="form-group" >
					<label>密码</label>
					<input type="text" name="password" class="form-control" placeholder="请输入密码..." ng-model="formData.password">
				</div>
				
				<div class="control-group">
					<label class="control-label" for="input_verify">验证码</label>
					<div class="controls">
						<input type="text" id="input_verify" name="verify"  placeholder="请输入验证码" class="span3" ng-model="formData.verify">
						<?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<label class="checkbox persistent"><input type="checkbox" name="terms" value="1">我同意
						<a href="#">网站内容服务条款</a></label>
					</div>
				</div>

				<button type="submit" class="btn btn-success btn-lg btn-block">
					<span class="glyphicon glyphicon-flash"></span> 提交!
				</button>

				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<ul class="inline">
							<li><a href="<?php echo U('user/register/index');?>">现在注册</a></li>
							<li><a href="<?php echo U('user/login/forgot_password');?>">忘记密码</a></li>
						</ul>
					</div>
				</div>

			</form>
			
		</div>
	</div>
</div>