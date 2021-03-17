<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Nuevo rol</b></h1>
			<a href="<?= base_url('/backoffice/configuracion/roles') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $created ) ? $created : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título del role</label>
					<input type="text" class="form-control" name="name" id="name" placeholder="Título del role" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link del role</label>
					<input type="text" class="form-control" name="url" id="url" placeholder="Link del role" required>
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
                        <option value="0" selected>No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-primary btn-block">Crear</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
