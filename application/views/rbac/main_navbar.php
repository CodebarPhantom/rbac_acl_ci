

<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">
		<div class="navbar-brand">
			<a href="<?php echo base_url();?>" class="d-inline-block">
				<img src="<?php echo base_url();?>assets/backend/global_assets/images/logo_light.png" height="200px" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
			<?php // if ($tk_m == 'details_profile' ) { ?>
			<!--<button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
				<i class="icon-unfold"></i>
			</button>-->
			<?php // } ?>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>
			
			
			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">
				
				

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>assets/backend/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span><?php echo $user_na; ?></span>
						
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url('rbaclogin/logout');?>" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->