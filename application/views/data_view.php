<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form view</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/form/css/bootstrap.min.css';?>">
</head>
<body>
	<div class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="a" class="navbar-brand">APPLICATION FORM VIEW</a>
		</div>
	</div>
	
	<div class="container" style="padding-top: 10px;">
		<div class="row">
		<div class="col-md-8">
			<div class="row">
		<div class="col-md-6"><h3>View Users</h3></div>
		<div class="col-md-6">
			<a href=" <?php echo base_url().'index.php/user/user_view';?>" class= "btn btn-primary">Create</a>
		<hr>

	</div>
</div>
</div>
</div>
		<div class="container" style="padding-top: 10px;">
		
		
		<div class="row">
			<div class="col-md-12">
				<?php
				$success=$this->session->userdata('success');
					if ($success!="") {
					?>
					<div class="alert alert-success"><?php echo$success;?></div>
					<?php
					}
					?>

				<?php
				$failure=$this->session->userdata('failure');
				if ($failure!="") {
					?>
					<div class="alert alert-success"><?php echo $failure;?></div>
						<?php
						}
						?>
					</div>
					
			</div>
		<div class="col-md-6">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Image</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php if (!empty($users)) {
					
					foreach($users as $user){?>
						<tr>
							<td><?php echo $user['id']?></td>
							<td><?php echo $user['name']?></td>
							<td><?php echo $user['email']?></td>
							<td><img src="<?php echo base_url().'uploads/'.$user['image'] ?>" width="50" height="50">
							<td>
								<a href="<?php echo base_url().'index.php/user/edit/'.$user['id']?>" class="btn btn-primary">Edit</a>
							</td>
							<td><a href="<?php echo base_url().'index.php/user/delete/'.$user['id']?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
							<?php }} else{ ?>
								<tr>
									<td colspan="5">Record not found</td>
								</tr>
							<?php } ?>
				
			</table>
			<a href="<?php echo base_url().'index.php/sign_up/login';?>"class="btn btn-primary">Logout</a>
			</div>
			</div>
		</div>
	</div>
</body>
</html>