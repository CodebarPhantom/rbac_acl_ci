<?php if ($this->session->flashdata('input_success')) {?>   
			<script type="text/javascript">
			$(function(){
				swal({
                title: '<?php echo $lang_input_success; ?>',
                text: '<?php echo $lang_success_input_data; ?>',
                type: 'success',
                confirmButtonClass: 'btn btn-primary'
                });
			});
			</script>
<?php }?>

<?php if ($this->session->flashdata('delete_success')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: '<?php echo $lang_delete_success; ?>',
                    text: '<?php echo $lang_success_delete_data; ?>',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>

<?php if ($this->session->flashdata('update_password_failure')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: '<?php echo $lang_update_password_failure; ?>',
                    text: '<?php echo $lang_failure_update_password; ?>',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>

<?php if ($this->session->flashdata('update_password_notsame')) {?>   
			<script type="text/javascript">
			$(function(){
                    swal({
                    title: '<?php echo $lang_update_password_failure; ?>',
                    text: '<?php echo $lang_new_password_must_same; ?>',
                    type: 'error',
                    confirmButtonClass: 'btn btn-primary'
                    });
				});
			</script>
<?php }?>

<script>		
        jQuery(document).ready(function($){
            $('.delete_data').on('click',function(){
               
				var url = $(this).attr('href');
				swal({
					title: '<?php echo $lang_delete_data; ?>',					
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					cancelButtonColor: ' #3085d6',
					confirmButtonText: '<?php echo $lang_delete_confirm; ?>',
                    confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger',
                     closeOnConfirm: false
					}).then(function(result) {
                        if(result.value) {
                            window.location.href = url
                        }
                        else if(result.dismiss === swal.DismissReason.cancel) {
                            
                        }
                    });
                
                return false;
            });
        });
</script>

<script>		
        jQuery(document).ready(function($){
            $('.cancel').on('click',function(){
               
				var url = $(this).attr('href');
				swal({
					title: '<?php echo $lang_cancel_data; ?>',					
					type: 'info',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					cancelButtonColor: ' #3085d6',
					confirmButtonText: '<?php echo $lang_cancel_confirm; ?>',
                    cancelButtonText: 'No',
                    confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger',
                     closeOnConfirm: false
					}).then(function(result) {
                        if(result.value) {
                            window.location.href = url
                        }
                        else if(result.dismiss === swal.DismissReason.cancel) {
                            
                        }
                    });
                
                return false;
            });
        });
</script>

<?php if ($this->session->flashdata('update_success')) {?>   
	<script type="text/javascript">
	    $(function(){
			swal({
                title: '<?php echo $lang_update_success; ?>',
                text: '<?php echo $lang_success_update_data; ?>',
                type: 'info',
                confirmButtonClass: 'btn btn-primary'
                });
			});
	</script>
<?php }?>

<?php if ($this->session->flashdata('success_login')) {?>   
	<script type="text/javascript">
	    $(function(){
			new PNotify({  
                
                title: 'Success Login',
                text: 'Welcome <?php echo $user_na; ?> !',
                addclass: 'bg-success border-success'
            });
			});
	</script>
<?php }?>

