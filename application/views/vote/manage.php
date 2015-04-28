<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head lang="zh-CN">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>新建投票</title>
	<link rel="stylesheet" href="<?=base_url();?>static/css/base.css">
	<link rel="stylesheet" href="<?=base_url();?>static/css/publish.css">
	<script src="<?=base_url();?>static/js/publish.js"></script>
</head>
<body>
	<div class="header">
		<div class="logo"></div>
		<div class="user"></div>
	</div>
	<div class="container">
		<div class="form_wrapper">
			<form>
				<div class="base_info">
					<ul>
						<li class="option"><label>标题</label><span><input type="text"></span></li>
						<li class="option"><label>发布者</label><span><input type="text"></span></li>
						<li class="option"><label>截止时间</label><span><input type="text"></span></li>
						<li class="option"><label>介绍</label><span><textarea></textarea></span></li>
					</ul>
				</div>
				<div class="question">
					
				</div>
			</form>
		</div>
	</div>
	<div class="footer">
		
	</div>
</body>
</html>