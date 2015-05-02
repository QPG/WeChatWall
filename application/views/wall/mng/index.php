<?php require('common.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 list_wrapper">
			<div class="panel panel-primary user_panel"><div class="panel-body">
				<span>Refresh Mode</span><button type="button" class="btn-xs btn btn-primary" onclick="btn_manual(this)">Manual</button><button type="button" class="btn-xs btn btn-info" onclick="btn_auto(this)">Automatic</button>
			</div></div>
			<table class="table table-striped table-hover">
				<tr class="warning"><th>ID</th><th>NickName</th><th>Type</th><th>Content</th><th>Interval</th><th>Review</th></tr>
				<?php foreach ($list as $k => $v) { ?>
				<tr data-id="<?=$v['id'];?>">
				<td><?=$v['id'];?></td>
				<td><?=$v['nickname'];?></td>
				<?php if($v['type']){ ?>
				<td>Image</td>
				<td><img class="image_msg" src="<?=$v['message'];?>"></td>
				<?php }else{ ?>
				<td>Text</td>
				<td><?=$v['message'];?></td>
				<?php } ?>
				<td><?php echo intval((time()-$v['create_time'])/60).'min'; ?></td>
				<td><button type="button" class="btn-xs btn btn-success" onclick="btn_allow(this)">Allow</button><button type="button" class="btn-xs btn btn-warning" onclick="btn_delete(this)">Delete</button><button type="button" class="btn-xs btn btn-danger" onclick="btn_blacklist(this)">BlackList</button></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>	
</div>
<script type="text/javascript">
	var lastTime = <?=$lastTime;?>;
</script>
<script src="<?=base_url().'static/wall/display/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/mng/js/bootstrap.min.js';?>"></script>
<script src="<?=base_url().'static/wall/mng/js/run.js';?>"></script>
</body>
</html>