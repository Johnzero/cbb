<?php if (!defined('THINK_PATH')) exit();?><div class="container tc-main">
    <div class="row">
        <div class="span3">
            <div class="list-group">
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
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-list-alt"></i> 修改资料</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one">
                        <form class="form-horizontal J_ajaxForm" action="<?php echo u('profile/edit_post');?>" method="post">
                            <div class="control-group">
                                <label class="control-label" for="input-user_nicename">昵称</label>
                                <div class="controls">
                                    <input type="text" id="input-user_nicename" placeholder="昵称" name="user_nicename" value="<?php echo ($user_nicename); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-sex">性别</label>
                                <div class="controls">
                                    <?php $sexs=array("0"=>"保密","1"=>"男","2"=>"女"); ?>
                                    <select id="input-sex" name="sex">
                                        <?php if(is_array($sexs)): foreach($sexs as $key=>$vo): $sexselected=$key==$sex?"selected":""; ?>
                                        <option value="<?php echo ($key); ?>" <?php echo ($sexselected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-birthday">生日</label>
                                <div class="controls">
                                    <input class="J_date" type="text" id="input-birthday" placeholder="2013-01-04" name="birthday" value="<?php echo ($birthday); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-user_url">公司网址</label>
                                <div class="controls">
                                    <input type="text" id="input-user_url" name="user_url" value="<?php echo ($user_url); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input-signature">个性签名</label>
                                <div class="controls">
                                    <textarea id="input-signature" placeholder="个性签名" name="signature"><?php echo ($signature); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn J_ajax_submit_btn">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>