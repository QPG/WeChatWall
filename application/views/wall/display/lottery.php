<?php require('common.php'); ?>
<div id="wallMain">
	<div id="topbox" class="topbox">
		<div class="topbox_l">
			<div class="topic">
				<h1 class="msg_tit">已中奖用户：<strong class="red" id="num_show">0</strong> 位</h1>
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
				<div class="win_animate_body_name"><span id="lottery_name">... ...</span></div>
			<div class="win_animate_bottom">
				<a href="javascript:start();" id="btn_start">START!</a>
			</div>
			</div>
		</div>
		<div class="win_list">
			<div class="win_list_top"><span>获奖名单</span></div>
			<div class="win_list_head"><span>获奖序号</span><span>名称</span></div>
			<div class="win_list_body">
				<ul class="win_list_ul">
				</ul>
			</div>
			<div class="win_list_bottom"><a href="javascript:restart();">重新抽奖</a></div>
		</div>
	</div>
</div>

<?php require('sidebar.php'); ?>

<script src="<?=base_url().'static/wall/display/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/action.js';?>"></script>
<script src="<?=base_url().'static/wall/display/js/lottery.js';?>"></script>
<script type="text/javascript">
var list_data = <?php echo $list;?>;
var total_num = list_data.length;
window.onload = function(){
	sidebar_run();
}
</script>
</body>
</html>
