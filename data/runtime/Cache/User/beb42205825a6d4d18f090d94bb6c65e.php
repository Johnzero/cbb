<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
	border-top:none;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
	border-top:none;
}
.nav-tabs {margin-bottom: 0;}
.table_full {
	padding-top:20px;
	background: white;
	padding-bottom: 20px;
}
.nav-tabs>.active>a {
	background:white;
}
.progress {
	margin-top: 10px;
	height: 20px;
	width: 90%;
	margin-bottom: 0;
	margin-left: 5%;
}
</style>
</head>
<div class="container tc-main">
<div class="row">
	<div class="span12">
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab"><i class="fa fa-file-text-o"></i> 我的投稿</a></li>
				<a href="<?php echo u('user/post/add');?>" style="float:right;margin-top: 10px;"><i class="fa fa-pencil-square-o"></i> 新增投稿</a>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="one">
					<form name="myform" class="form-horizontal" ng-submit="postAdd($event)" ng-controller="postCtl">
						<div class="col-right">
							<div class="table_full">
								<span style="text-align: center;display:block;width:100%">缩略图</span>
								<div style="text-align: center;">
									<img src='/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='margin-bottom: 10px;' />
									<input type="file" name="smeta[thumb]" id='file_input' value="/statics/images/icon/upload-pic.png" ng-model="post.smeta.thumb" ng-multiple="false" ng-accept="'image/*'" ng-file-select ng-file-change="thumb($files)" style="width:90%"/>
	                                <div class="progress" ng-show="progress >= 0">
	                                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': progress + '%' }">{{progress}}%</div>
	                                </div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							function file_select() {
								$("#file_input").click();
							}
						</script>
						<div class="col-auto">
							<div class="table_full">
								<table width="100%" cellpadding="2" cellspacing="2">
									<tr>
										<th width="80">栏目</th>
										<td>
											<select name="term[term_id]" class="normal_select" ng-model="post.term_id">
												<?php echo ($taxonomys); ?>
											</select>
										</td>
									</tr>
									<tr>
										<th width="80">标题 </th>
										<td>
											<input type="text" style="width:400px;" name="post[post_title]" required value="请输入标题" class="input input_hd" placeholder="请输入标题" ng-model="post.post_title"/>
											<span class="must_red">*</span>
										</td>
									</tr>
									<tr>
										<th width="80">关键词</th>
										<td><input type='text' style="width:400px;" name='post[post_keywords]' class='input' placeholder='请输入关键字' ng-model="post.post_keywords"> 多关键词之间用空格隔开</td>
									</tr>
									<tr>
										<th width="80">摘要 </th>
										<td><textarea name='post[post_excerpt]' style="width:400px;"  placeholder='请填写摘要' ng-model="post.post_excerpt"></textarea></td>
									</tr>
									<tr>
										<th width="80">内容</th>
										<td><span class="must_red">*</span>
										<div id='content_tip'></div>
										<textarea id="content" ueditor style="height:500px; width:98%;" ng-model="post.post_content"></textarea>
										<script type="text/javascript">
											var editorURL = GV.DIMAUB;
										</script>

										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				<div class="form-actions">
					<input class="btn btn-primary" type="submit" value="提交">
					<a class="btn" href="<?php echo u('user/post/index');?>">返回</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>