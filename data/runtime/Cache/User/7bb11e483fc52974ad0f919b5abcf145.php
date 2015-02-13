<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
    <div class="row">
        <div class="span3">
            <div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-edit"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/company');?>"><i class="fa fa-shield"></i> 企业认证</a>
	<a class="list-group-item" href="<?php echo u('user/post/index');?>"><i class="fa fa-file-text-o"></i> 我的投稿</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>

</div>
        </div>
        <div class="span9">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-lock"></i> 修改密码</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one">
                        <form class="form-horizontal"  ng-submit="passEdit($event)"  ng-controller="passeditCtl">
                            <div class="control-group">
                                <label class="control-label" for="input-old_password">原始密码</label>
                                <div class="controls">
                                    <input type="password" id="input-old_password" placeholder="原始密码" name="old_password" ng-model="passeditForm.old_password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-password">新密码</label>
                                <div class="controls">
                                    <input type="password" id="input-password" placeholder="新密码" name="password" ng-model="passeditForm.password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-repassword">重复密码</label>
                                <div class="controls">
                                    <input type="password" id="input-repassword" placeholder="重复密码" name="repassword" ng-model="passeditForm.repassword">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>