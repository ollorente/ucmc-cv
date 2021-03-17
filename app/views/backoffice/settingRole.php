<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Role</b></h1>
			<a href="<?= base_url('backoffice/configuracion/roles') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

            <div class="card border-0 mb-3 shadow-sm">
				<p class="px-3 py-2 my-0">
					<b>Nombre:</b>
					<br /><?= $role->roleName ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Link:</b>
					<br /><?= $role->roleNameUrl ?>
				</p>
				<p class="px-3 py-2 my-0">
					<div class="custom-control custom-switch mx-3">
						<input type="checkbox" class="custom-control-input" name="isActive" id="isActive"
							<?php if ($role->isRoleActive == 1) { echo 'checked="checked"'; } else { echo ''; } ?>>
						<label class="custom-control-label" for="isActive">Activo</label>
					</div>
				</p>
				<p class="px-3 py-2 mt-0 mb-3">
					<a href="<?= base_url('backoffice/configuracion/role/'. $role->roleNameUrl .'/editar') ?>" class="btn btn-outline-warning btn-block" role="button">Editar</a>
				</p>
            </div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
