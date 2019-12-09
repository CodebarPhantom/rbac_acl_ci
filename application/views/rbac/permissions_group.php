<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permissions Group</h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>
	</div>
</div>
<!-- /page header -->
<!-- Row toggler -->
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<div class="col-md-12">
				<div class="form-group row">
					<div class="col-lg-3">
						<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left" data-toggle="modal"
							data-target="#modal_add_permissions_group"><b><i class="icon-grid6"></i></b>
							<?php echo $lang_add_permissions_group; ?></button>
					</div>

					<div class="col-lg-8">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary text-white">
									<i class="icon-search4"></i>
								</span>
							</span>
							<form action="<?php echo site_url('rolespermissions/permissions-group'); ?>"
								class="form-inline" method="get">
								<input type="text" class="form-control border-left-0" name="q" value="<?php echo $q; ?>"
									placeholder="<?php echo $lang_search_permissions_group; ?>">
								<span class="input-group-append">
									<button class="btn btn-light" type="submit"> Search</button>
									<?php if ($q <> ''){?>
									<a href="<?php echo site_url('rolespermissions/permissions-group'); ?>"
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

		<table class="table table-bordered table-togglable table-hover table-xs  ">
			<thead>
				<tr>
					<th data-hide="phone">#</th>
					<th data-toggle="true"><?php echo $lang_permissions_group_name; ?></th>
					<th data-toggle="true"><?php echo $lang_status; ?></th>
					<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getpermissions_group_data as $getpermissions_group){?>
				<tr>
					<td><?php echo ++$start; ?></td>
					<td><i class="<?= $getpermissions_group->display_icon; ?>"></i>
						&nbsp;<?= $getpermissions_group->permissions_groupname; ?></td>
					<td><?php if($getpermissions_group->status === '0') { ?>
						<span class="badge badge-danger d-block">Inactive</span>
						<?php }else if ($getpermissions_group->status === '1'){ ?>
						<span class="badge badge-success d-block">Active</span>
						<?php } ?></td>

					<td class="text-center">
						<div class="list-icons">
							<div class="dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal"
										data-target="#modal_edit_permissions_group<?=$getpermissions_group->idpermissions_group;?>"
										class="dropdown-item"><i class="icon-pencil"></i><?php echo $lang_edit_permissions_group; ?></a>

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
<div id="modal_add_permissions_group" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_add_permissions_group; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/insert_permissions_group" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_permissions_group_name; ?></label>
								<input type="text" name="permissions_groupname" placeholder="Permissions Group Name..."
									class="form-control" required>
							</div>
							<div class="col-sm-6">
								<label><?php echo $lang_display_icon; ?></label>
								<input type="text" name="display_icon" placeholder="Class Icon" class="form-control"
									required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
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

<!-- Vertical form modal -->
<?php foreach ($getpermissions_group_data as $getpermissions_group){?>
<div id="modal_edit_permissions_group<?=$getpermissions_group->idpermissions_group;?>" class="modal fade" tabindex="-1"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_edit_permissions_group; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/update_permissions_group" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_permissions_group_name; ?></label>
								<input type="text" name="permissions_groupname" placeholder="Permissions Group Name..."
									class="form-control" value="<?=$getpermissions_group->permissions_groupname; ?>"
									required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_display_icon; ?></label>
								<input type="text" name="display_icon" placeholder="Class Icon" class="form-control"
									value="<?=$getpermissions_group->display_icon; ?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="status" class="form-control" required autocomplete="off">
									<option><?php echo $lang_choose_status; ?></option>
									<option
										<?php if ($getpermissions_group->status === '1') {echo 'selected="selected"';} ?>
										value="1"><?php echo $lang_active; ?></option>
									<option
										<?php if ($getpermissions_group->status === '0') {echo 'selected="selected"';} ?>value="0">
										<?php echo $lang_inactive; ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="idpermissions_group" class="form-control"
						value="<?=$getpermissions_group->idpermissions_group;?>" required>
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