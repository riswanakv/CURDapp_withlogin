<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form creation</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/form/css/bootstrap.min.css';?>">
</head>
<body>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="a" class="navbar-brand">APPLICATION FORM </a>
		</div>
	</div>
	
	<div class="container" style="padding-top: 10px;">
		<h3>Create User</h3>
		<hr><form method="post"name="createUser"enctype="multipart/form-data" action="<?php echo base_url().'index.php/user/insert';?>">
		<div class="row">
			
				<div class="col-md-6">
					<div class="form-group">
						<label>Name</label>
						<input type="text" value="<?php echo set_value('name');?>"name="name" class="form-control">
						<?php echo form_error('name');?>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" value="<?php echo set_value('email');?>" name="email" class="form-control">
						<?php echo form_error('email');?>
					</div>
					
						<label>Upload image</label>

						<input type="file" name="profile_image" class="form-control" id="profile_image">
						
					<br>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Create</button>
						<a href="<?php echo base_url().'index.php/user/index';?>"class="btn btn-secondary">View</a>
					</div>
				</div>
			</form>
		</div>
	
</div>
</body>
</html>