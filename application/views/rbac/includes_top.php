	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="noindex"/>
	<meta name="googlebot" content="noindex"/>
	<meta name="robots" content="noindex, nofollow"/>

	<title>RBAC ACL</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/css/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/backend/global_assets/css/extras/animate.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/tables/footable/footable.min.js"></script>

	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/inputs/inputmask.js"></script>
	<script src="<?php echo base_url();?>assets/backend/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	
		

	<script src="<?php echo base_url();?>assets/backend/js/app.js"></script>
	<!-- /theme JS files -->

	<?php
    $user_id = $this->session->userdata('iduser');
    $user_na = $this->session->userdata('user_name');  
    $user_em = $this->session->userdata('user_email');    
	$user_le = $this->session->userdata('user_level');
	$this->session->userdata('referred_from', current_url());

    

    if (empty($user_id && $user_na && $user_le)) {
        redirect(base_url(), 'refresh');
    }

	$tk_c = $this->router->class;
	$tk_m = $this->router->method;

?>