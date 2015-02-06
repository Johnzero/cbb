<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.tab-content{overflow: visible;}
.uploaded_avatar_area{
	margin-top: 20px;
}
.uploaded_avatar_btns{
	margin-top: 20px;
}
.headicon {
	width:120px;
}
.uploaded_avatar_area .uploaded_avatar_btns{display: none;}
</style>
<div class="container tc-main">
	<div class="row">
		<div class="span3">
			<div class="list-group">
	<a class="list-group-item" href="<?php echo u('user/center/index');?>"><i class="fa fa-list-alt"></i> 个人中心</a>
	<a class="list-group-item" href="<?php echo u('user/profile/edit');?>"><i class="fa fa-user"></i> 修改资料</a>
	<a class="list-group-item" href="<?php echo u('user/profile/password');?>"><i class="fa fa-lock"></i> 修改密码</a>
	<a class="list-group-item" href="<?php echo u('user/profile/avatar');?>"><i class="fa fa-user"></i> 编辑头像</a>
	<!-- <a class="list-group-item" href="<?php echo u('user/profile/bang');?>"><i class="fa fa-exchange"></i> 绑定账号</a> -->
	<a class="list-group-item" href="<?php echo u('user/favorite/index');?>"><i class="fa fa-star-o"></i> 我的收藏</a>
	<a class="list-group-item" href="<?php echo u('comment/comment/index');?>"><i class="fa fa-comments-o"></i> 我的评论</a>
</div>
		</div>
		<div class="span9" >
			<div class="tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#one" data-toggle="tab"><i class="fa fa-user"></i> 修改头像</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="one">
						<?php if(empty($avatar)): ?><img src="/tpl/default//Public/images/headicon_128.png" class="headicon"/>
						<?php else: ?>
						<img src="<?php echo sp_get_user_avatar_url($avatar);?>" class="headicon"/><?php endif; ?>
						<input type="file" onchange="avatar_upload(this)" id="avatar_uploder"  name="file"/>
						<div class="uploaded_avatar_area">
							
							<div class="uploaded_avatar_btns">
								<a class="btn btn-primary confirm_avatar_btn" onclick="update_avatar()">确定</a>
								<a class="btn" onclick="reloadPage()">取消</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function update_avatar(){
		var area=$(".uploaded_avatar_area img").data("area");
		$.post("<?php echo U('profile/avatar_update');?>",area,
				function(data){
			if(data.status==1){
				reloadPage(window);
			}
			
		},"json");
		
	}
	function avatar_upload(obj){
		var $fileinput=$(obj);
		/* $(obj)
		.show()
		.ajaxComplete(function(){
			$(this).hide();
		}); */
		Wind.css("jcrop");
		Wind.use("ajaxfileupload","jcrop","noty",function(){
			$.ajaxFileUpload({
				url:"<?php echo U('profile/avatar_upload');?>",
				secureuri:false,
				fileElementId:"avatar_uploder",
				dataType: 'json',
				data:{},
				success: function (data, status){
					if(data.status==1){
						$("#avatar_uploder").hide();
						var $uploaded_area=$(".uploaded_avatar_area");
						$uploaded_area.find("img").remove();
						var $img=$("<img/>").attr("src","/data/upload//avatar/"+data.data.file);
						$img.prependTo($uploaded_area);
						$(".uploaded_avatar_btns").show();
						$img.Jcrop({
						aspectRatio:1/1,
						setSelect: [ 0, 0, 100, 100 ],
						onSelect: function(c){
							$img.data("area",c);
						}
					});
						
					}else{
						noty({text: data.info,
							type:'error',
							layout:'center'
						});
					}
					
				},
				error: function (data, status, e){}
			});
		});
		return false;
	}
</script>