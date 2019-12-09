<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>RBAC ACL</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?php echo base_url();?>assets/backend/js/app.js"></script>
	<!-- /theme JS files -->
	
	<style>
	.cover-image-login { background:url('<?php echo base_url();?>assets/backend/global_assets/images/login_cover.jpg');		
		-webkit-background-size:cover;
		-moz-background-size:cover;
		-o-background-size: cover;
		background-size: cover;
		width: 100%;
  height: auto;
		}
	</style>

</head>

<body >

	<!-- Page content -->
	<div class="page-content cover-image-login">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" action="<?php echo base_url('rbaclogin/auth');?>" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<img src="<?php echo base_url();?>assets/backend/global_assets/images/rbac.png" class="responsive " height="70" width="70">
								
								<!--<i class="icon-users4 icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>-->
								<h5 class="mb-0">RBAC ACL</h5>
								<span class="d-block text-muted">Login to Your Account</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Email" required/>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control"  placeholder="Password" required />
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>
							

							<span class="form-text text-center text-muted">&copy; 2019 - <?php echo date('Y'); ?>. <a href="#">No One</a></span>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

	
	<?php include 'swal_login.php';?>
</body>
</html>
