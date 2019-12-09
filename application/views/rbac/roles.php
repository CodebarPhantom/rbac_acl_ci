<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Roles</h4>
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
						<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal"
							data-target="#modal_add_roles"><b><i class="icon-key"></i></b>
							<?php echo $lang_add_roles; ?></button>
					</div>

					<div class="col-lg-8">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary text-white">
									<i class="icon-search4"></i>
								</span>
							</span>
							<form action="<?php echo site_url('rolespermissions/roles'); ?>" class="form-inline"
								method="get">
								<input type="text" class="form-control border-left-0" name="q" value="<?php echo $q; ?>"
									placeholder="<?php echo $lang_search_roles; ?>">
								<span class="input-group-append">
									<button class="btn btn-light" type="submit"> <?php echo $lang_search; ?></button>
									<?php if ($q <> ''){?>
									<a href="<?php echo site_url('rolespermissions/roles'); ?>"
										class="btn btn-light">Reset</a>
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

		<table class="table table-bordered table-togglable table-hover table-xs ">
			<thead>
				<tr>
					<th data-hide="phone">#</th>
					<th data-toggle="true"><?php echo $lang_roles_name; ?></th>
					<th data-toggle="true"><?php echo $lang_status; ?></th>
					<th class="text-center" style="width: 30px;" data-toggle="true">Matrix</th>
					<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($getroles_data as $getroles){?>
				<tr>
					<td><?php echo ++$start; ?></td>
					<td><?php echo $getroles->roles_name; ?></td>
					<td><?php if($getroles->status === '0') { ?>
						<span class="badge badge-danger d-block">Inactive</span>
						<?php }else if ($getroles->status === '1'){ ?>
						<span class="badge badge-success d-block">Active</span>
						<?php } ?></td>
					<td>
						<a href="<?=base_url('rolespermissions/roles-permissions/').$getroles->idroles; ?>"
							class="btn btn-outline bg-brown border-brown text-brown-800 btn-icon"><i
								class="icon-equalizer"></i></a>

					</td>


					<td class="text-center">
						<div class="list-icons">
							<div class="dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#modal_edit_roles<?=$getroles->idroles;?>"
										class="dropdown-item"><i
											class="icon-pencil"></i><?php echo $lang_edit_roles; ?></a>

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

<!-- Vertical form modal -->
<div id="modal_add_roles" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_add_roles; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/insert_roles" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_roles_name; ?></label>
								<input type="text" name="roles_name" placeholder="Roles Name..." class="form-control"
									required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="status" class="form-control" required autocomplete="off">
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
<?php foreach ($getroles_data as $getroles){?>
<div id="modal_edit_roles<?=$getroles->idroles;?>" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_edit_roles; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/update_roles" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_roles_name; ?></label>
								<input type="text" name="roles_name" placeholder="Roles Name..." class="form-control"
									value="<?=$getroles->roles_name;?>" required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="status" class="form-control" required autocomplete="off">
									<option><?php echo $lang_choose_status; ?></option>
									<option <?php if ($getroles->status === '1') {echo 'selected="selected"';} ?>
										value="1"><?php echo $lang_active; ?></option>
									<option
										<?php if ($getroles->status === '0') {echo 'selected="selected"';} ?>value="0">
										<?php echo $lang_inactive; ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="idroles" class="form-control" value="<?=$getroles->idroles;?>" required>
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