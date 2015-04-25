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
			<div class="about"><p><?=$info['about'];?></p></div>
			<p class="organizer">发起人：<?=$info['organizer'];?></p>
		</div>
		<div class="q_rule">
			<?=$info['rule'];?>
			<p class="time">投票时间：<?=$info['start_time'];?>---<?=$info['end_time'];?></p>
		</div>
		<div class="q_list">
		<form method="post" id="form_write" action="<?=site_url('write/handle/?id='.$fid);?>">
		<?php foreach ($res as $k => $v) { ?>
			<div class="item">
				<?php if($v['imgurl']!='0'){ ?>
				<div class="img_show"><img src="<?= get_img_url($v['imgurl']);?>"></div>
				<?php } ?>
				<div class="text_show"><p><?=$v['title'];?></p><p><?=$v['text'];?></p></div>
				<div class="check_show"><input type="checkbox" name="option[<?=$v['qid'];?>]"/></div>
			</div>
		<?php } ?>
		<a class="submit_btn" href="javascript:execute()">投票</a>
		</form>
		</div>
	</div>
	<div class="footer">
		<p>Copyright 2014 TWT Studio. All rights reserved</p>
	</div>

</body>
</html>