<script>
	 $('.form-input-styled').uniform();
</script>

<?php if ($this->session->flashdata('account_suspend')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: 'Cannot Login to Your Account',
                    text: 'Your account is suspended! Please contact to Administrator!',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>

<?php if ($this->session->flashdata('invalid_password')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: 'Cannot Login to Your Account',
                    text: 'Invalid Password',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>

<?php if ($this->session->flashdata('invalid_email')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: 'Cannot Login to Your Account',
                    text: 'Email Address do not exist at the system!',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>