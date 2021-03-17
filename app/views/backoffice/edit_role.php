<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar rol <b><?= $role->_id ?></b></h1>
			<a href="<?= base_url('backoffice/role/') . $role->_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open() ?>
				<div class="form-group">
					<label for="name">Título del rol</label>
					<input type="text" class="form-control" name="name" value="<?= $role->roleName ?>" id="name" placeholder="Título del rol" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link del rol</label>
					<input type="text" class="form-control" name="url" value="<?= $role->roleNameUrl ?>" id="url" placeholder="Link del rol" required>
				</div>
                <div class="form-group">
                    <label for="role_order">Orden</label>
                    <select class="form-control" name="role_order" id="role_order">
                        <?php $_role = $role->roleOrder; for ($i = 0; $i <= 10; $i++) { ?>
                        <option value="<?= $i ?>" <?= $_role == $i ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($role->isRoleActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($role->isRoleActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close() ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
