<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
    <div class="row">
        <div class="span3">
            <div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-edit"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/company');?>"><i class="fa fa-shield"></i> 企业认证</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-file-text-o"></i> 我的投稿</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>

</div>
        </div>
        <div class="span9">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-lock"></i> 认证信息</a></li>
                </ul>
                
                <h4 class="well text-error">系统通知：已认证通过！</h4>
                
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form class="form-horizontal">
                            <h2>公司及联系人信息</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司名称：</label>
                                <div class="controls">
                                    <input type="text" name="name" value="<?php echo ($companyForm["name"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司详细地址：</label>
                                <div class="controls">
                                    <input type="text" name="location" value="<?php echo ($companyForm["location"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司电话：</label>
                                <div class="controls">
                                    <input type="text" name="tel" value="<?php echo ($companyForm["tel"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>联系人姓名：</label>
                                <div class="controls">
                                    <input type="text" name="contact" value="<?php echo ($companyForm["contact"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>联系人电话：</label>
                                <div class="controls">
                                    <input type="text" name="ctel"value="<?php echo ($companyForm["ctel"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>电子邮箱：</label>
                                <div class="controls">
                                    <input type="text" name="email" value="<?php echo ($companyForm["email"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <h2>营业执照信息</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>营业执照号：</label>
                                <div class="controls">
                                    <input type="text" name="code" value="<?php echo ($companyForm["code"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>营业执照电子版：</label>
                                <div class="controls">
                                    <img src="/data/upload/company/<?php echo ($companyForm["code_pic"]); ?>" class="headicon">
                                </div>
                            </div>
                            <h2>组织机构代码证</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>组织机构代码：</label>
                                <div class="controls">
                                    <input type="text" name="group" value="<?php echo ($companyForm["group"]); ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>组织机构代码证电子版：</label>
                                <div class="controls">
                                    <img src="/data/upload/company/<?php echo ($companyForm["group_pic"]); ?>" class="headicon">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>