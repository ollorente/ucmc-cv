<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar programa <b><?= $program->_id ?></b></h1>
			<a href="<?= base_url('backoffice/programa/') . $program->_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título del programa</label>
					<input type="text" class="form-control" name="name" value="<?= $program->programName ?>" id="name" placeholder="Título del programa" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link del programa</label>
					<input type="text" class="form-control" name="url" value="<?= $program->programNameUrl ?>" id="url" placeholder="Link del programa" required>
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($program->isProgramActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($program->isProgramActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
