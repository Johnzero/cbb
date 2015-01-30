<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
	<div class="row">
		<div class="span6 offset3">
			<h2 class="text-center">忘记密码</h2>
			<form class="form-horizontal J_ajaxForm" action="<?php echo U('user/login/doforgot_password');?>" method="post">
				<div class="control-group">
					<label class="control-label" for="input_email">注册邮箱</label>
					<div class="controls">
						<input type="email" id="input_email" name="email" class="span3">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_verify">验证码</label>
					<div class="controls">
						<input type="text" id="input_verify" name="verify" class="span3">
						<?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<button class="btn btn-primary J_ajax_submit_btn" type="submit">确定</button>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_repassword"></label>
					<div class="controls">
						<ul class="inline">
							<li><a href="<?php echo U('user/register/index');?>">现在注册</a></li>
							<li><a href="<?php echo U('user/login/index');?>">现在登录</a></li>
						</ul>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>