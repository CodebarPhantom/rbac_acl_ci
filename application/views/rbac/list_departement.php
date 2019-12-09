<script type="text/javascript">
	$(function () {
		$('.table-togglable').footable();
	});
</script>
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Departement</h4>
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
							data-target="#modal_add_departement"><b><i class="icon-tree6"></i></b>Add
							Departement</button>
					</div>

					<div class="col-lg-7">
						<div class="input-group">
							<span class="input-group-prepend">
								<span class="input-group-text bg-primary border-primary text-white">
									<i class="icon-search4"></i>
								</span>
							</span>
							<form action="<?php echo site_url('rbac/list_departement'); ?>" class="form-inline"
								method="get">
								<input type="text" class="form-control border-left-0" name="q" value="<?php echo $q; ?>"
									placeholder="Search Department">
								<span class="input-group-append">
									<button class="btn btn-light" type="submit"> Search</button>
									<?php if ($q <> ''){?>
									<a href="<?php echo site_url('rbac/list_departement'); ?>"
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
					<th data-toggle="true">Departement</th>
					<th data-hide="phone">Background Color</th>
					<th class="text-center" style="width: 30px;"><i class="icon-menu-open2"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
							foreach ($rbac_departement_data as $rbac_departement){?>
				<tr>
					<td><?php echo ++$start; ?></td>
					<td><?php echo $rbac_departement->deptname; ?></td>
					<td><span class="badge <?php echo $rbac_departement->background_class; ?> d-block">Color</span></td>
					<td class="text-center">
						<div class="list-icons">
							<div class="dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal"
										data-target="#modal_edit_departement<?=$rbac_departement->iddept;?>"
										class="dropdown-item"><i
											class="icon-pencil"></i><?php echo $lang_edit_departement; ?></a>
									<a href="<?php echo base_url('rbac/delete_departement/'.$rbac_departement->iddept);?>"
										class="dropdown-item delete_data"><i
											class="icon-cross2"></i><?php echo $lang_delete_departement; ?></a>
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
<div id="modal_add_departement" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Departement</h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rbac/insert_departement" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Departement</label>
								<input type="text" name="departement" placeholder="Departement..." class="form-control"
									required>
							</div>

							<div class="col-sm-6">
								<label>Background Color</label>
								<select name="bgcolor" class="form-control" required autocomplete="off">
									<option>Choose Background Color</option>
									<option value="bg-blue"><?php echo "Blue"; ?></option>
									<option value="bg-brown"><?php echo "Brown"; ?></option>
									<option value="bg-green"><?php echo "Green"; ?></option>
									<option value="bg-grey"><?php echo "Grey"; ?></option>
									<option value="bg-indigo"><?php echo "Indigo"; ?></option>
									<option value="bg-orange"><?php echo "Orange"; ?></option>
									<option value="bg-pink"><?php echo "Pink"; ?></option>
									<option value="bg-purple"><?php echo "Purple"; ?></option>
									<option value="bg-danger"><?php echo "Red"; ?></option>
									<option value="bg-slate"><?php echo "Slate"; ?></option>
									<option value="bg-teal"><?php echo "Teal"; ?></option>
									<option value="bg-violet"><?php echo "Violet"; ?></option>
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
<?php foreach ($rbac_departement_data as $rbac_departement){?>
<div id="modal_edit_departement<?=$rbac_departement->iddept;?>" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $lang_edit_departement; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form action="<?=base_url()?>rbac/update_departement" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label>Departement</label>
								<input type="text" name="departement" placeholder="Departement..." class="form-control"
									value="<?=$rbac_departement->deptname;?>" required>
							</div>

							<div class="col-sm-6">
								<label><?php echo $lang_background_color; ?></label>
								<select name="bgcolor" class="form-control" required autocomplete="off">
									<option><?php echo $lang_choose_bg_color; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-blue') {echo 'selected="selected"';} ?>
										value="bg-blue"> <?php echo "Blue"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-brown') {echo 'selected="selected"';} ?>
										value="bg-brown"><?php echo "Brown"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-green') {echo 'selected="selected"';} ?>
										value="bg-green"><?php echo "Green"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-grey') {echo 'selected="selected"';} ?>
										value="bg-grey"><?php echo "Grey"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-indigo') {echo 'selected="selected"';} ?>
										value="bg-indigo"><?php echo "Indigo"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-orange') {echo 'selected="selected"';} ?>
										value="bg-orange"><?php echo "Orange"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-pink') {echo 'selected="selected"';} ?>
										value="bg-pink"><?php echo "Pink"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-purple') {echo 'selected="selected"';} ?>
										value="bg-purple"><?php echo "Purple"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-danger') {echo 'selected="selected"';} ?>
										value="bg-danger"><?php echo "Red"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-slate') {echo 'selected="selected"';} ?>
										value="bg-slate"><?php echo "Slate"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-teal') {echo 'selected="selected"';} ?>
										value="bg-teal"><?php echo "Teal"; ?></option>
									<option
										<?php if ($rbac_departement->background_class === 'bg-violet') {echo 'selected="selected"';} ?>
										value="bg-violet"><?php echo "Violet"; ?></option>

								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<input type="hidden" name="iddept_old" class="form-control" value="<?=$rbac_departement->iddept;?>"
						required>
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