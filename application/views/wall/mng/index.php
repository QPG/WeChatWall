<?php require('common.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 list_wrapper">
			<table class="table table-striped table-hover">
				<tr class="warning"><th>ID</th><th>NickName</th><th>Type</th><th>Content</th><th>Interval</th><th>Review</th></tr>
				<?php foreach ($list as $k => $v) { ?>
				<tr data-id="<?=$v['id'];?>">
				<th><?=$v['id'];?></th>
				<th><?=$v['nickname'];?></th>
				<?php if($v['type']){ ?>
				<th>Image</th>
				<th><img class="image_msg" src="<?=$v['message'];?>"></th>
				<?php }else{ ?>
				<th>Text</th>
				<th><?=$v['message'];?></th>
				<?php } ?>
				<th><?php echo intval((time()-$v['create_time'])/60).'min'; ?></th>
				<th><button type="button" class="btn-xs btn btn-success" onclick="btn_allow(this)">Allow</button><button type="button" class="btn-xs btn btn-warning" onclick="btn_delete(this)">Delete</button><button type="button" class="btn-xs btn btn-danger" onclick="btn_blacklist(this)">BlackList</button></th>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>	
</div>

<script src="<?=base_url().'static/wall/display/js/jquery.min.js';?>"></script>
<script src="<?=base_url().'static/wall/mng/js/bootstrap.min.js';?>"></script>
<script src="<?=base_url().'static/wall/mng/js/run.js';?>"></script>
</body>
</html>