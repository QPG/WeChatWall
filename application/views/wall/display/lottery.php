<?php require('common.php'); ?>
<div id="wallMain">
	<div id="topbox" class="topbox">
		<div class="topbox_l">
			<div class="topic">
				<h1 class="msg_tit">已中奖用户：<strong class="red">0</strong> 位</h1>
			</div>
		</div>
	</div>
	<div >
		<div class="win_animate">
			<div class="win_animate_top"><span>现场抽奖</span></div>
			<div class="win_animate_body">
				<div class="win_animate_body_avatar">
					<img src="<?=base_url().'static/wall/display/images/lottery_default.jpg';?>" id="lottery_avatar">
				</div>
				<div class="win_animate_body_name"><span>... ...</span></div>
			<div class="win_animate_bottom">
				<a href="">START!</a>
			</div>
			</div>
		</div>
		<div class="win_list">
			<div class="win_list_top"><span>获奖名单</span></div>
			<div class="win_list_head"><span>获奖序号</span><span>名称</span></div>
			<div class="win_list_body">
				<ul class="win_list_ul">
					<li>
						
					</li>
				</ul>
			</div>
			<div class="win_list_bottom"><a>重新抽奖</a></div>
		</div>
	</div>
</div>

<?php require('sidebar.php'); ?>
<script src="<?=base_url().'static/wall/display/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/action.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/lottery.js';?>"></script>
<script type="text/javascript">
window.onload = function(){
	sidebar_run();
}
</script>
</body>
</html>
