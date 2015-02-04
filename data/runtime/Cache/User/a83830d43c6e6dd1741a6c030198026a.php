<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main center">
    <div class="row">
        <div class="span3">
            <div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-list-alt"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/avatar');?>"><i class="fa fa-user"></i> 编辑头像</a>
	<a class="list-group-item" href="<?php echo u('user/profile/bang');?>"><i class="fa fa-exchange"></i> 绑定账号</a>
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>
</div>
        </div>
        <div class="span9">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-list-alt"></i>个人中心</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one">
                        <div class="span2">
                            <a href="<?php echo u('profile/avatar');?>">
                                <?php if(empty($avatar)): ?><img src="/tpl/default//Public/images/headicon_128.png" class="headicon"/>
                                <?php else: ?>
                                <img src="<?php echo sp_get_user_avatar_url($avatar);?>" class="headicon"/><?php endif; ?>
                            </a>
                        </div>
                        <div class="span3">
                            <div class="control-group">
                                <label class="control-label" for="input-user_nicename">昵称</label>
                                <div class="controls">
                                    <?php echo ((isset($user_nicename) && ($user_nicename !== ""))?($user_nicename):'未填写'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-sex">性别</label>
                                <div class="controls">
                                    <?php $sexs=array("0"=>"保密","1"=>"程序猿","2"=>"程序媛"); ?>
                                    <?php echo ($sexs[$sex]); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-birthday">生日</label>
                                <div class="controls">
                                    <?php echo ((isset($birthday) && ($birthday !== ""))?($birthday):'未填写'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-user_url">公司网址</label>
                                <div class="controls">
                                    <?php echo ((isset($user_url) && ($user_url !== ""))?($user_url):'未填写'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-signature">个性签名</label>
                                <div class="controls">
                                    <?php echo ((isset($signature) && ($signature !== ""))?($signature):'未填写'); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <a href="<?php echo U('user/profile/edit');?>" type="submit" class="btn">编辑</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>