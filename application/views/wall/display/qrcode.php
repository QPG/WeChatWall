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
	<div id="msg_list" class="msg_list">
		<div id="msg_" style="margin:50px 0 0 40px;">
			<img src="" style="width:500px;" />
		</div>
	</div>
</div>

<?php require('sidebar.php');?>
</body>
</html>
