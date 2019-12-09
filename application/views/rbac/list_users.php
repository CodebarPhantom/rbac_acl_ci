<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Users</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->

<!-- Row toggler -->
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<div class="col-md-10">
				<div class="form-group row">
					<div class="col-lg-3">
						<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal"
							data-target="#modal_add_user"><b><i class="icon-user"></i></b> Add Users</button>
					</div>

					<div class="col-lg-7">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary text-white">
									<i class="icon-search4"></i>
								</span>
							</span>
							<form action="<?php echo site_url('rbac/list_users'); ?>" class="form-inline" method="get">
								<input type="text" class="form-control border-left-0" name="q" value="<?php echo $q; ?>"
									placeholder="Search Users">
								<span class="input-group-append">
									<button class="btn btn-light" type="submit"> Search</button>
									<?php if ($q <> ''){?>
									<a href="<?php echo site_url('rbac/list_users'); ?>" class="btn btn-light">Reset</a>
									<?php } ?>
								</span>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
				</div>
			</div>
		</div>

		<table class="table table-bordered table-togglable table-hover table-xs  ">
			<thead>
				<tr>
					<th data-hide="phone">#</th>
					<th data-toggle="true"> <?php echo $lang_username; ?></th>
					<th data-hide="phone,tablet"> <?php echo $lang_email; ?></th>
					<th data-hide="phone,tablet"> <?php echo $lang_level; ?></th>
					<th data-hide="phone,tablet"> <?php echo $lang_departement; ?></th>


					<th data-hide="phone"> <?php echo $lang_status; ?></th>
					<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($rbac_users_data as $rbac_users){?>
				<tr>
					<td><?php echo ++$start; ?></td>
					<td><?php echo $rbac_users->user_name; ?></td>
					<td><?php echo $rbac_users->user_email; ?></td>
					<td><?php echo $rbac_users->roles_name; ?></td>
					<td> <span
							class="badge <?php echo $rbac_users->background_class; ?> d-block"><?php echo $rbac_users->deptname; ?></span>
					</td>



					<td><?php if($rbac_users->user_status === '0') { ?>
						<span class="badge badge-danger d-block">Inactive</span>
						<?php }else if ($rbac_users->user_status === '1'){ ?>
						<span class="badge badge-success d-block">Active</span>
						<?php } ?></td>
					<td class="text-center">
						<div class="list-icons">
							<div class="dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#modal_edit_user<?=$rbac_users->iduser;?>"
										class="dropdown-item"><i
											class="icon-pencil"></i><?php echo $lang_edit_user; ?></a>
									<a data-toggle="modal" data-target="#modal_change_password<?=$rbac_users->iduser;?>"
										class="dropdown-item"><i
											class="icon-key"></i><?php echo $lang_change_password; ?></a>
									<a href="<?php echo base_url('rbac/delete-user/'.$rbac_users->iduser);?>"
										class="dropdown-item delete_data"><i
											class="icon-cross2"></i><?php echo $lang_delete_user; ?></a>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<div>
			<?php echo $pagination ?>
		</div>
	</div>
</div>
<!-- /row toggler -->

<?php foreach ($rbac_users_data as $rbac_users){?>
<div id="modal_change_password<?=$rbac_users->iduser;?>" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_change_password_for; ?> <?=$rbac_users->user_name;?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rbac/update_password_user" method="post">
				<div class="modal-body">
					<input type="hidden" name="iduser" value="<?=$rbac_users->iduser;?>" required>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_new_password; ?></label>
								<input type="password" name="newpassword" class="form-control" required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_confirm_password; ?></label>
								<input type="password" name="conpassword" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" aria-hidden="true"
						data-dismiss="modal"><?php echo $lang_close; ?></button>
					<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>

<!-- Vertical form modal -->
<div id="modal_add_user" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_add_user; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rbac/insert_user" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_username; ?></label>
								<input type="text" name="user_name" placeholder="Username..." class="form-control"
									required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_email; ?></label>
								<input type="email" name="user_email" placeholder="Email..." class="form-control"
									required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_password; ?></label>
								<input type="password" name="user_password" placeholder="Password..."
									class="form-control" required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_departement; ?></label>
								<select name="iddept" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_departement; ?></option>
									<?php
													$deptData = $this->Rbac_users_model->getDataAll('rbac_dept', 'iddept', 'ASC');
													for ($p = 0; $p < count($deptData); ++$p) {
														$iddept = $deptData[$p]->iddept;
														$deptname = $deptData[$p]->deptname;?>
									<option value="<?php echo $iddept; ?>">
										<?php echo $deptname; ?>
									</option>
									<?php
														unset($iddept);
														unset($deptname);
													}
												?>
								</select>
							</div>


						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_level; ?></label>
								<select name="user_level" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_level; ?></option>
									<?php $rolesData = $this->Rolespermissions_model->getDataAll('roles', 'roles_name', 'ASC');
													for ($p = 0; $p < count($rolesData); ++$p) {
														$idroles = $rolesData[$p]->idroles;
														$rolesname = $rolesData[$p]->roles_name;?>
									<option value="<?php echo $idroles; ?>">
										<?php echo $rolesname; ?>
									</option>
									<?php
														unset($idroles);
														unset($rolesname);
													}
												?>
								</select>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="user_status" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_status; ?></option>
									<option value="1"><?php echo $lang_active; ?></option>
									<option value="0"><?php echo $lang_inactive; ?></option>
								</select>
							</div>


						</div>
					</div>

					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" aria-hidden="true"
						data-dismiss="modal"><?php echo $lang_close; ?></button>
					<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /vertical form modal -->

<!-- Vertical form modal -->
<?php foreach ($rbac_users_data as $rbac_users){?>
<div id="modal_edit_user<?=$rbac_users->iduser;?>" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_edit_user; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rbac/update_user" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_username; ?></label>
								<input type="text" name="user_name" placeholder="Username..." class="form-control"
									value="<?=$rbac_users->user_name;?>" required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_email; ?></label>
								<input type="email" name="user_email" placeholder="Email..."
									value="<?=$rbac_users->user_email;?>" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">


							<div class="col-sm-6">
								<label><?php echo $lang_departement; ?></label>
								<select name="iddept" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_departement; ?></option>
									<?php
													$departement = $rbac_users->iddept;
													$deptData = $this->Rbac_users_model->getDataAll('rbac_dept', 'iddept', 'ASC');
													for ($p = 0; $p < count($deptData); ++$p) {
														$iddept = $deptData[$p]->iddept;
														$deptname = $deptData[$p]->deptname;?>
									<option value="<?php echo $iddept;?>" <?php if ($departement == $iddept) {
																echo 'selected="selected"';
															} ?>>
										<?php echo $deptname; ?>
									</option>
									<?php
														unset($iddept);
														unset($deptname);
													}
												?>
								</select>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_level; ?></label>
								<select name="user_level" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_level; ?></option>
									<?php
													$roles = $rbac_users->user_level;
													$rolesData = $this->Rolespermissions_model->getDataAll('roles', 'roles_name', 'ASC');
													for ($p = 0; $p < count($rolesData); ++$p) {
														$idroles = $rolesData[$p]->idroles;
														$rolesname = $rolesData[$p]->roles_name;?>
									<option value="<?php echo $idroles; ?>" <?php if ($roles == $idroles) {
																echo 'selected="selected"';
															} ?>>
										<?php echo $rolesname; ?>
									</option>
									<?php
														unset($idroles);
														unset($rolesname);
													}
												?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="user_status" class="form-control" required autocomplete="off">
									<option><?php echo $lang_choose_status; ?></option>
									<option <?php if ($rbac_users->user_status === '1') {echo 'selected="selected"';} ?>
										value="1"><?php echo $lang_active; ?></option>
									<option
										<?php if ($rbac_users->user_status === '0') {echo 'selected="selected"';} ?>value="0">
										<?php echo $lang_inactive; ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="iduser" class="form-control" value="<?=$rbac_users->iduser;?>" required>
					<button type="button" class="btn btn-link" aria-hidden="true"
						data-dismiss="modal"><?php echo $lang_close; ?></button>
					<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
<!-- /vertical form modal -->