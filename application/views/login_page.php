
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
		<!-- Meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- //Meta tags -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" type="text/css" media="all" /><!-- Style-CSS -->
    <link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet"><!-- font-awesome-icons -->
</head>

<body>
	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>Login</h3>
					
					<form action="<?php echo base_url()?>index.php/sign_up/can_login" method="post" class="signin-form">
						
						<div class="form-input">
							<span class="fa fa-envelope-o" aria-hidden="true"></span> <input type="email" name="email" placeholder="Email" required />
							<div class="text-danger"><?php echo form_error('email');?></div>
						</div>
						<div class="form-input">
							<span class="fa fa-key" aria-hidden="true"></span><input type="password" name="password" placeholder="Password"
								required />
								<div class="text-danger"><?php echo form_error('password');?></div>
						</div>
						
						
						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox">
								<span class="checkmark"></span>
								<p class="remember">Remember me</p>
							</label>
							<button class= "submit btn theme-button">Login</button>
						</div>
					</form>
		
					<p class="signup">Create an account? <a href="<?php echo base_url('index.php/sign_up')?>" class="signuplink">Signup</a></p>
				</div>

				
			</div>
		</div>
	</section>
</body>
</html>