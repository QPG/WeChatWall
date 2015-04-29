<?php require('common.php'); ?>
<div id="wallMain">
	<div id="topbox" class="topbox">
		<div class="topbox_l">
			<div class="topic">
				<h1 class="msg_tit">搜索公众号 <strong class="red"><?=$setting['account']?></strong></h1>
				<h1 class="msg_tit" style="display:none;">添加公众号 <strong class="red"><?=$setting['account'];?></strong></h1>
				<span class="addCnt">发送 {loop $setting['keyword'] $row}<span class="red Topic_cnt">{$row['content']}</span>，{/loop} 发送内容，自动上墙</span>
			</div>
		</div>
	</div>
	<div class="msg_list" id="msg_list_wrap">
		<div id="msg_list" style="position:absolute;">
		</div>
	</div>
</div>

<div class="side_div">
	<div class="side_item"><a href="javascript:;" id="remaintime" style="color:red; font-weight:600;">8</a></div>
	<div class="side_item"><a href="#" id="status">暂停</a></div>
	<div class="side_item"><a href="">二维码</a></div>
	<div class="side_item"><a href="">抽奖</a></div>
	<div class="side_item"><a href="javascript:screenModel()">全屏</a></div>
</div>

<div class="msg_block"></div>

<script src="<?=base_url().'static/wall/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/js/action.js';?>"></script>
<script src="<?=base_url().'static/wall/js/wall.js';?>"></script>
<script type="text/javascript">
window.onload = function(){
	sidebar();
	wall.clock();
	wall.heart();
}
</script>
</body>
</html>
