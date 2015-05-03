<?php require('common.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 login_wrapper">
			<div class="panel panel-primary">
			  <div class="panel-heading">Login for TWT MicroWall</div>
			  <div class="panel-body">
			  <form method="post" action="<?php echo site_url('wall/validate');?>">
			    <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">@</span>
				  <input type="text" name="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
				</div>
			    <div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">@</span>
				  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
				</div>
				<div class="btn_wrapper">
					<button type="submit" class="btn btn-primary">LOG IN</button>
				</div>
			  </form>
			  </div>
			</div>
		</div>
	</div>
</div>