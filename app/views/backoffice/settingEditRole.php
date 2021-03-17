<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar role <b><?= $role->roleName ?></b></h1>
			<a href="<?= base_url('backoffice/configuracion/role/') . $role->roleNameUrl ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open() ?>
				<div class="form-group">
					<label for="name">Título del curso</label>
					<input type="text" class="form-control" name="name" value="<?= $role->roleName ?>" id="name" placeholder="Título del role" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link del curso</label>
					<input type="text" class="form-control" name="url" value="<?= $role->roleNameUrl ?>" id="url" placeholder="Link del role" required>
				</div>
				<div class="form-group">
					<label for="url">Imagen</label>
					<input type="text" class="form-control" name="image" value="<?= $role->roleImage ?>" id="image" placeholder="Archivo">
				</div>
				<div class="form-group">
					<label for="url">Order</label>
					<input type="number" class="form-control" name="order" value="<?= $role->roleOrder ?>" id="order" placeholder="Orden">
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
