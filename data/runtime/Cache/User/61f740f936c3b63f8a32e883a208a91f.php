<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span6 offset3">
			<h2 class="text-center">创建账号</h2>
			<form class="form-horizontal J_ajaxForm" action="<?php echo U('user/register/doregister');?>" method="post">
				<div class="control-group">
					<label class="control-label" for="input_username">账号</label>
					<div class="controls">
						<input type="text" id="input_username" name="username" placeholder="请输入账号" class="span3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_email">邮箱</label>
					<div class="controls">
						<input type="text" id="input_email" name="email" placeholder="请输入邮箱" class="span3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_password">密码</label>
					<div class="controls">
						<input type="password" id="input_password" name="password" placeholder="请输入密码" class="span3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword">重复密码</label>
					<div class="controls">
						<input type="password" id="input_repassword" name="repassword" placeholder="请输入重复密码" class="span3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_verify">验证码</label>
					<div class="controls">
						<input type="text" id="input_verify" name="verify" placeholder="请输入验证码" class="span3">
						<?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<label class="checkbox persistent"><input type="checkbox" name="terms" value="1">
						我同意<a href="#">网站内容服务条款</a></label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<button class="btn btn-primary J_ajax_submit_btn" type="submit" data-wait="1500">确定注册</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<p>
						已有账号? <a href="<?php echo U('user/login/index');?>">点击此处登录</a>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>