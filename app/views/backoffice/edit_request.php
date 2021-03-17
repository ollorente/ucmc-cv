<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12">
			<h1 class="h3 mb-4 text-gray-800">Responderr solicitud</h1>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open(); ?>
				<div class="form-group">
					<label for="name">Título del solicitud</label>
					<input type="text" class="form-control" name="name" value="" id="name" placeholder="Título del solicitud" required autofocus>
				</div>
				<div class="form-group">
					<label for="url">Link del solicitud</label>
					<input type="text" class="form-control" name="url" value="" id="url" placeholder="Link del solicitud" required>
				</div>
				<div class="custom-control custom-switch mb-3">
					<input type="checkbox" class="custom-control-input" name="is_active" id="is_active">
					<label class="custom-control-label" for="is_active">Activo</label>
				</div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close(); ?>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
