<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>天外天微投票</title>
	<link rel="stylesheet" href="<?=base_url();?>static/css/base.css">
	<link rel="stylesheet" href="<?=base_url();?>static/css/write.css">
	<script src="<?=base_url();?>static/js/write.js"></script>
</head>
<body>
	<div class="header">
		<div class="logo"></div>
		<div class="user"></div>
	</div>
	<div class="main">
		<form>
		<?php foreach ($res as $k => $v) { ?>
			<div class="item">
				<p><?=$v['text'];?></p>
				<input type="checkbox" />
			</div>
		<?php } ?>
		<a class="submit_btn"></a>
		</form>
	</div>

</body>
</html>