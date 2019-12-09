<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});

	function checkPermissions() {
		var check = document.getElementById("check");
		check.value = check.checked;
	}
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permissions Roles Matrix</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->
<!-- Row toggler -->
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<div class="col-md-11">
				<div class="form-group row">
					<div class="col-lg-3">

					</div>


				</div>
			</div>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
				</div>
			</div>
		</div>
		<form action="<?php echo base_url()?>rolespermissions/insert_roles_permissions" method="post"
			accept-charset="utf-8">
			<table class="table table-bordered table-togglable table-hover table-xs ">
				<thead>
					<tr>
						<th data-hide="phone">#</th>
						<th data-toggle="true">Permission Group</th>
						<th data-hide="phone">Permissions</th>
					</tr>
					<input type="hidden" name="idroles_edit" value="<?php echo $idroles_edit; ?>">
				</thead>
				<tbody>
					<?php $start = 0; foreach ($getpermissions_group_data as $getpermissions_group){?>
					<tr>
						<td><?php echo ++$start; ?></td>
						<td><i class="<?= $getpermissions_group->display_icon; ?>"></i>
							&nbsp;<?= $getpermissions_group->permissions_groupname; ?></td>
						<td>
							<?php $list_permissions =  $this->Rolespermissions_model->get_permissions($getpermissions_group->idpermissions_group, $idroles_edit);?>
							<?php foreach ($list_permissions as $permissions){
										$checkedlist_permission =  $this->Rolespermissions_model->get_checkedlist_permissions($permissions->idpermissions, $idroles_edit); ?>
							<div class="col-md-6">
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input type="checkbox" class="form-check-input" name="permissions[]"
											value="<?=$permissions->idpermissions; ?>"
											<?php if($checkedlist_permission->num_rows() > 0){echo "checked";}?>>
										<i class="<?= $permissions->display_icon; ?>"></i>
										&nbsp;<?= $permissions->display_name; ?>
									</label>
								</div>

								<input type="hidden" name="permissions_group[]"
									value="<?= $permissions->idpermissions_group; ?>" />

							</div>
							<?php } ?>


						</td>



					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<div class="text-center">

				<button type="submit" class="btn bg-teal-400"><?php echo $lang_submit;?></button>
			</div>
			<br />
		</form>

	</div>
</div>