<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar diplomado <b><?= $graduate->_id ?></b></h1>
			<a href="<?= base_url('backoffice/diplomado/') . $graduate->_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título de diplomado</label>
					<input type="text" class="form-control" name="name" value="<?= $graduate->graduateName ?>" id="name" placeholder="Título de diplomado" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link de diplomado</label>
					<input type="text" class="form-control" name="url" value="<?= $graduate->graduateNameUrl ?>" id="url" placeholder="Link de diplomado" required>
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($graduate->isGraduateActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($graduate->isGraduateActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close(); ?>

		</div>

	</div>
</div>
<!-- /.container-fluid -->
