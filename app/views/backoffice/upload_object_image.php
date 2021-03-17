<!-- Begin Page Content -->
<div class="container-fluid" id="main">

  <div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Subir imagen de objeto</h1>
			<a href="<?= base_url('backoffice/objetos') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

            <?php if (isset($error)) { echo '<span class="text-danger font-weight-bold">'. $error .'</span>'; } ?>
            <?= isset( $updated ) ? $updated : '' ?>
			<?= form_open_multipart();?>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="imgfile" id="imgfile" lang="es">
                    <label class="custom-file-label" for="imgfile" data-browse="Seleccionar">Imagen del objeto</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Subir</button>
            <?= form_close(); ?>

        </div>

    </div>

</div>
<!-- /.container-fluid -->
