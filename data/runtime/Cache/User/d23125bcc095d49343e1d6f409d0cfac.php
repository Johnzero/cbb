<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    .uploaded_avatar_area{
        margin-top: 20px;
    }
    .uploaded_avatar_btns{
        margin-top: 20px;
    }
    #avatar .headicon {
        width:120px;
    }
    #avatar {
        display: inline-block;
        float: right;
    }
</style>
<div class="container tc-main">
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
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-list-alt"></i> 修改资料</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one">
                        <form class="form-horizontal" action="<?php echo u('profile/edit_post');?>" ng-submit="profileEdit($event)" class="form-horizontal" ng-controller="profileEditCtl" style="float: left">
                            <div class="control-group">
                                <label class="control-label" for="input-user_nicename">昵称</label>
                                <div class="controls">
                                    <input type="text" id="input-user_nicename" placeholder="昵称" name="user_nicename" value="<?php echo ($user_nicename); ?>" ng-model="profileForm.user_nicename">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="input-sex">性别</label>
                                <div class="controls">
                                    <?php $sexs=array("0"=>"保密","1"=>"男","2"=>"女"); ?>
                                    <select id="input-sex" name="sex" ng-model="profileForm.sex" ng-init="profileForm.sex='<?php echo ($sex); ?>'">
                                        <?php if(is_array($sexs)): foreach($sexs as $key=>$vo): ?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-birthday">生日</label>
                                <div class="controls">
                                    <input class="J_date" type="text" id="input-birthday" placeholder="2013-01-04" name="birthday" value="<?php echo ($birthday); ?>" ng-model="profileForm.birthday">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-user_url">公司网址</label>
                                <div class="controls">
                                    <input type="text" id="input-user_url" name="user_url" value="<?php echo ($user_url); ?>" ng-model="profileForm.user_url">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-signature">个性签名</label>
                                <div class="controls">
                                    <textarea id="input-signature" placeholder="个性签名" name="signature" ng-model="profileForm.signature" ng-init="profileForm.signature='<?php echo ($signature); ?>'"><?php echo ($signature); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">保存</button>
                                </div>
                            </div>
                        </form>
                        <div class="control-group" id="avatar" ng-controller="avatarCtl">
                            <div class="tab-pane active">
                                <?php if(empty($avatar)): ?><img src="/statics/images/headicon_128.png" class="headicon"/>
                                <?php else: ?>
                                    <img src="<?php echo sp_get_user_avatar_url($avatar);?>" class="headicon"/><?php endif; ?>
                                <input type="hidden" value="/statics/images/headicon_128.png" ng-model="profileForm.avatars"/>
                                <input type="file" name="file" value="<?php echo ($avatar); ?>" ng-model="profileForm.avatar" id="avatar_uploder" ng-multiple="false" ng-accept="'image/*'" ng-file-select ng-file-change="upload($files)"/>
                                 <!-- ng-show="profileForm.avatar[0].progress >= 0" -->
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': profileForm.avatar[0].progress + '%' }">{{profileForm.avatar[0].progress}}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>