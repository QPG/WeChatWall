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
		<div class="q_header">
			<p class="title"><?=$info['title'];?></p>
			<p class="organizer"><?=$info['organizer'];?></p>
			<p class="about"><?=$info['about'];?></p>
			<p class="time"><?=$info['start_time'];?>---<?=$info['end_time'];?></p>
		</div>
		<div class="q_list">
		<form>
		<?php foreach ($res as $k => $v) { ?>
			<div class="item">
				<?php if($v['imgurl']!='0'){ ?>
				<div class="img_show"><img src="<?= $v['imgurl'];?>"></div>
				<?php } ?>
				<div class="text_show"><p><?=$v['text'];?></p></div>
				<input type="checkbox" name="<?=$v['qid'];?>" />
			</div>
		<?php } ?>
		<a class="submit_btn">投票</a>
		</form>
		</div>
	</div>

</body>
</html>