<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permissions</h4>
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
							data-target="#modal_add_permissions"><b><i class="icon-list"></i></b>
							<?php echo $lang_add_permissions; ?></button>
					</div>

					<div class="col-lg-8">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary text-white">
									<i class="icon-search4"></i>
								</span>
							</span>
							<form action="<?php echo site_url('rolespermissions/permissions'); ?>" class="form-inline"
								method="get">
								<select name="q" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_permissions_group; ?></option>
									<?php
													$pgData = $this->Rolespermissions_model->getDataAll('permissions_group', 'permissions_groupname','ASC');
													for ($p = 0; $p < count($pgData); ++$p) {
														$idpg = $pgData[$p]->idpermissions_group;
														$pgname = $pgData[$p]->permissions_groupname; ?>
									<option value="<?php echo $idpg; ?>" <?php if($idpg == $q){echo "selected";} ?>>
										<?php echo $pgname; ?>
									</option>
									<?php
														unset($idpg);
														unset($pgname);
													}
												?>
								</select>
								<span class="input-group-append">
									<button class="btn btn-light" type="submit"> <?php echo $lang_search; ?></button>
									<?php if ($q <> ''){?>
									<a href="<?php echo site_url('rolespermissions/permissions'); ?>"
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
					<th data-toggle="true">Permission Group</th>
					<th data-hide="phone">Display Name</th>
					<th data-hide="phone">Code</th>
					<th data-hide="phone">Type</th>
					<th data-hide="phone">Status</th>



					<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($getpermissions_data as $getpermissions){?>
				<tr>
					<td><?php echo ++$start; ?></td>
					<td><i class="<?= $getpermissions->parent_icon; ?>"></i>
						&nbsp;<?= $getpermissions->permissions_groupname; ?></td>
					<td><i class="<?= $getpermissions->child_icon; ?>"></i>
						&nbsp;<?php echo $getpermissions->display_name; ?></td>
					<td><?php echo $getpermissions->code_class.'/'.$getpermissions->code_url; ?></td>
					<td><?php if($getpermissions->type === 'TRUE') { ?>
						<span class="badge bg-teal d-block">Sidebar</span>
						<?php }else if ($getpermissions->type === 'FALSE'){ ?>
						<span class="badge bg-slate d-block">Function</span>
						<?php } ?></td>
					<td><?php if($getpermissions->status === '0') { ?>
						<span class="badge badge-danger d-block">Inactive</span>
						<?php }else if ($getpermissions->status === '1'){ ?>
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
										data-target="#modal_edit_permissions<?=$getpermissions->idpermissions;?>"
										class="dropdown-item"><i
											class="icon-pencil"></i><?php echo $lang_edit_permissions; ?></a>

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

<div id="modal_add_permissions" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_add_permissions; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/insert_permissions" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_permissions_group; ?></label>
								<select name="idpermissions_group" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_permissions_group; ?></option>
									<?php
													$pgData = $this->Rolespermissions_model->getDataAll('permissions_group', 'permissions_groupname','ASC');
													for ($p = 0; $p < count($pgData); ++$p) {
														$idpg = $pgData[$p]->idpermissions_group;
														$pgname = $pgData[$p]->permissions_groupname; ?>
									<option value="<?php echo $idpg; ?>">
										<?php echo $pgname; ?>
									</option>
									<?php
														unset($idpg);
														unset($pgname);
													}
												?>
								</select>
							</div>
							<div class="col-sm-6">
								<label>Controller</label>
								<input type="text" name="code_class" placeholder="Controller Name" class="form-control"
									required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Function</label>
								<input type="text" name="code_method" placeholder="Function Name" class="form-control"
									required>
							</div>
							<div class="col-sm-6">
								<label>URL</label>
								<input type="text" name="code_url" placeholder="URL" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Display Name</label>
								<input type="text" name="display_name" placeholder="Display Name" class="form-control"
									required>
							</div>
							<div class="col-sm-6">
								<label><?php echo $lang_display_icon; ?></label>
								<input type="text" name="display_icon" placeholder="Display Icon" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Type</label>
								<select name="type" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_type; ?></option>
									<option value="TRUE">Sidebar</option>
									<option value="FALSE">Function</option>
								</select>
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

<?php foreach ($getpermissions_data as $getpermissions){?>
<div id="modal_edit_permissions<?=$getpermissions->idpermissions;?>" class="modal fade" tabindex="-1"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_edit_permissions; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rolespermissions/update_permissions" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label><?php echo $lang_permissions_group; ?></label>
								<select name="idpermissions_group" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_permissions_group; ?></option>
									<?php
													$pgroup = $getpermissions->idpermissions_group;
													$pgData = $this->Rolespermissions_model->getDataAll('permissions_group', 'permissions_groupname','ASC');
													for ($p = 0; $p < count($pgData); ++$p) {
														$idpg = $pgData[$p]->idpermissions_group;
														$pgname = $pgData[$p]->permissions_groupname; ?>
									<option value="<?php echo $idpg; ?>" <?php if ($pgroup == $idpg) {
																echo 'selected="selected"';
															} ?>>
										<?php echo $pgname; ?>
									</option>
									<?php
														unset($idpg);
														unset($pgname);
													}
												?>
								</select>
							</div>
							<div class="col-sm-6">
								<label>Controller</label>
								<input type="text" name="code_class" placeholder="Controller Name" class="form-control"
									value="<?=$getpermissions->code_class; ?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Function</label>
								<input type="text" name="code_method" placeholder="Function Name" class="form-control"
									value="<?=$getpermissions->code_method; ?>" required>
							</div>
							<div class="col-sm-6">
								<label>URL</label>
								<input type="text" name="code_url" placeholder="URL" class="form-control"
									value="<?=$getpermissions->code_url; ?>" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Display Name</label>
								<input type="text" name="display_name" placeholder="Display Name"
									value="<?=$getpermissions->display_name; ?>" class="form-control" required>
							</div>
							<div class="col-sm-6">
								<label><?php echo $lang_display_icon; ?></label>
								<input type="text" name="display_icon" placeholder="Display Icon"
									value="<?=$getpermissions->child_icon; ?>" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Type</label>
								<select name="type" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_type; ?></option>
									<option
										<?php if ($getpermissions->type === 'TRUE') {echo 'selected="selected"';} ?>value="TRUE">
										Sidebar</option>
									<option
										<?php if ($getpermissions->type === 'FALSE') {echo 'selected="selected"';} ?>value="FALSE">
										Function</option>
								</select>
							</div>
							<div class="col-sm-6">
								<label><?php echo $lang_status; ?></label>
								<select name="status" class="form-control" required autocomplete="off">
									<option value=""><?php echo $lang_choose_status; ?></option>
									<option <?php if ($getpermissions->status === '1') {echo 'selected="selected"';} ?>
										value="1"><?php echo $lang_active; ?></option>
									<option
										<?php if ($getpermissions->status === '0') {echo 'selected="selected"';} ?>value="0">
										<?php echo $lang_inactive; ?></option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="idpermissions" class="form-control"
						value="<?=$getpermissions->idpermissions;?>" required>
					<button type="button" class="btn btn-link" aria-hidden="true"
						data-dismiss="modal"><?php echo $lang_close; ?></button>
					<button type="submit" class="btn bg-primary"><?php echo $lang_submit; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>