<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar categoría de objeto <b><?= $resourcetaxonomy->resourceTaxonomyName ?></b></h1>
			<a href="<?= base_url('backoffice/configuracion/objeto/') . $resourcetaxonomy->resourceTaxonomySlug ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open() ?>
				<div class="form-group">
					<label for="name">Título de la categoría</label>
					<input type="text" class="form-control" name="name" value="<?= $resourcetaxonomy->resourceTaxonomyName ?>" id="name" placeholder="Título del menú" required autofocus>
				</div>
				<div class="form-group">
					<label for="slug">Slug de la categoría</label>
					<input type="text" class="form-control" name="slug" value="<?= $resourcetaxonomy->resourceTaxonomySlug ?>" id="slug" placeholder="Link del menú" required>
				</div>
				<div class="form-group">
                    <label for="is_active">Activo</label>
                    <select class="form-control" name="is_active" id="is_active">
                        <option value="0" <?php if ($resourcetaxonomy->isResourceTaxonomyActive == '0') { echo 'selected'; } ?>>No</option>
                        <option value="1" <?php if ($resourcetaxonomy->isResourceTaxonomyActive == '1') { echo 'selected'; } ?>>Si</option>
                    </select>
                </div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close() ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
