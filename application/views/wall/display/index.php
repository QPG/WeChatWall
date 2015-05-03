<?php require('common.php'); ?>
<div id="wallMain">
	<div id="topbox" class="topbox">
		<div class="topbox_l">
			<div class="topic">
				<h1 class="msg_tit">搜索公众号 <strong class="red"><?=$setting['account']?></strong></h1>
				<h1 class="msg_tit" style="display:none;">添加公众号 <strong class="red"><?=$setting['account'];?></strong></h1>
				<span class="addCnt">回复关键字<span class="red Topic_cnt"><?=$setting['keyword']?></span>，发送内容，自动上墙</span>
			</div>
		</div>
	</div>
	<div class="msg_list_wrapper">
		<div id="msg_list"></div>
	</div>
</div>

<?php require('sidebar.php'); ?>

<script src="<?=base_url().'static/wall/display/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/action.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/wall.js';?>"></script>
<script type="text/javascript">
window.onload = function(){
	sidebar_run();
	wall.clock();
	wall.heart();
}
</script>
</body>
</html>
