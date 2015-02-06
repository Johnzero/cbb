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
                <h4 class="well text-error">系统通知：阿萨德发生的</h4>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form id="test" class="form-horizontal"  ng-submit="companySubmit($event)"  ng-controller="companyCtl" method="POST" enctype="multipart/form-data">
                            <h2>公司及联系人信息</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司名称：</label>
                                <div class="controls">
                                    <input type="text" name="name" ng-model="companyForm.name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司详细地址：</label>
                                <div class="controls">
                                    <input type="text" name="location" ng-model="companyForm.location">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>公司电话：</label>
                                <div class="controls">
                                    <input type="text" name="tel" ng-model="companyForm.tel">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>联系人姓名：</label>
                                <div class="controls">
                                    <input type="text" name="contact" ng-model="companyForm.contact">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>联系人电话：</label>
                                <div class="controls">
                                    <input type="text" name="ctel" ng-model="companyForm.ctel">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>电子邮箱：</label>
                                <div class="controls">
                                    <input type="text" name="email" ng-model="companyForm.email">
                                </div>
                            </div>
                            <h2>营业执照信息</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>营业执照号：</label>
                                <div class="controls">
                                    <input type="text" name="code" ng-model="companyForm.code">
                                </div>
                            </div>
                             <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>营业执照电子版：</label>
                                <div class="controls">
                                    <?php if(empty($code_pic)): ?><img src="/statics/images/headicon_128.png" class="headicon"/>
                                    <?php else: ?>
                                        <img src="<?php echo ($code_pic); ?>" class="headicon"/><?php endif; ?>
                                    <input type="hidden" name="code_pic" ng-model="companyForm.code_pic">
                                    <input type="file" nv-file-select uploader="code"/>
                                    <span class="help-block">请确保图片清晰，文字可辨并有清晰的红色公章。</span>
                                    <div ng-repeat="item in code.queue">
                                        文件名: <span ng-bind="item.file.name"></span><br/>
                                        <button class="btn btn-success btn-xs" ng-click="item.upload()">上传</button>
                                    </div>
                                    <div class="progress" style="">
                                        <div class="progress-bar" role="progressbar" ng-style="{'width': code.progress + '%' }"></div>
                                    </div>
                                </div>
                            </div>

                            <h2>组织机构代码证</h2>
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>组织机构代码：</label>
                                <div class="controls">
                                    <input type="text" name="group" ng-model="companyForm.group">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>组织机构代码证电子版：</label>
                                <div class="controls">
                                    <?php if(empty($group_pic)): ?><img src="/statics/images/headicon_128.png" class="headicon"/>
                                    <?php else: ?>
                                        <img src="<?php echo ($group_pic); ?>" class="headicon"/><?php endif; ?>
                                    <input type="hidden" name="group_pic" ng-model="companyForm.group_pic">
                                    <input type="file" nv-file-select uploader="group"/>
                                    <span class="help-block">请确保图片清晰，文字可辨并有清晰的红色公章。</span>
                                    <div ng-repeat="item in group.queue">
                                        文件名: <span ng-bind="item.file.name"></span><br/>
                                        <button class="btn btn-success btn-xs" ng-click="item.upload()">上传</button>
                                    </div>
                                    <div class="progress" style="">
                                        <div class="progress-bar" role="progressbar" ng-style="{'width': group.progress + '%' }"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>