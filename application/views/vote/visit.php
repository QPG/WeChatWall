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
	<link rel="stylesheet" href="<?=base_url();?>static/css/visit.css">
	<script src="<?=base_url();?>static/js/visit.js"></script>
</head>
<body>
	<div class="header">
		<div class="logo"></div>
		<div class="user"></div>
	</div>
	<div class="main">
		<div class="list">
			<?php foreach ($res as $k => $v) { ?>
			<div class="item"><a href="<?=site_url('write?id='.$v['fid']);?>"><?php echo $v['title'];?></a></div>
			<?php } ?>
		</div>
	</div>
	<div class="footer">
		
	</div>
</body>
</html>