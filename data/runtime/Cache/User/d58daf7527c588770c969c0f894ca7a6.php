<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
    .table th, .table td {
        text-align:center;
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
                    <li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-file-text-o"></i> 我的投稿</a></li>
                    <a href="<?php echo u('user/post/add');?>" style="float:right;margin-top: 10px;"><i class="fa fa-pencil-square-o"></i> 新增投稿</a>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="one">
                        <form class="J_ajaxForm" action="" method="post">
                            <div class="table_list">
                                <table width="100%" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>标题</th>
                                            <th>点击量</th>
                                            <th>缩略图</th>
                                            <th><span>发布时间</span></th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <?php $status=array("1"=>"<span style='color:red'>已审核</span>","0"=>"未审核"); ?>
                                    <?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
                                        <td><a><?php echo ($vo["tid"]); ?></a></td>
                                        <td>
                                            <a href="<?php echo u('/article/index',array('id'=>$vo['tid']));?>">
                                                <span><?php echo ($vo["post_title"]); ?></span>
                                            </a>
                                        </td>
                                        <td><?php echo ($vo["post_hits"]); ?></td>
                                        <td>
                                            <?php $smeta=json_decode($vo['smeta'],true); ?>
                                            <?php if(!empty($smeta['thumb'])): ?><a href="/data/upload/post/<?php echo ($smeta['thumb']); ?>" target='_blank'>查看</a><?php endif; ?>
                                        </td>
                                        <td><?php echo ($vo["post_date"]); ?></td>
                                        <td><?php echo ($status[$vo['post_status']]); ?></td>
                                        <td>
                                            <a href="<?php echo u('post/delete',array('term'=>empty($term['term_id'])?'':$term['term_id'],'tid'=>$vo['tid']));?>" class="J_ajax_del" >删除</a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                </table>
                                <div class="pagination"><?php echo ($Page); ?></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/statics/js/jquery-migrate-1.2.1.js"></script>
<script src="/statics/js/wind.js"></script>
<script src="/statics/js/common.js"></script>