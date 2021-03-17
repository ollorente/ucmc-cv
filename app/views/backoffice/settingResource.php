<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Categoría de recurso <b><?= $resourcetaxonomy->resourceTaxonomyName ?></b></h1>
			<a href="<?= base_url('backoffice/configuracion/recursos') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

            <div class="card border-0 mb-3 shadow-sm">
				<p class="px-3 py-2 my-0">
					<b>Nombre:</b>
					<br /><?= $resourcetaxonomy->resourceTaxonomyName ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Slug:</b>
					<br /><?= $resourcetaxonomy->resourceTaxonomySlug ?>
				</p>
				<p class="px-3 py-2 my-0">
					<div class="custom-control custom-switch mx-3">
						<input type="checkbox" class="custom-control-input" name="isActive" id="isActive"
							<?php if ($resourcetaxonomy->isResourceTaxonomyActive == 1) { echo 'checked="checked"'; } else { echo ''; } ?>>
						<label class="custom-control-label" for="isActive">Activo</label>
					</div>
				</p>
				<p class="px-3 py-2 mt-0 mb-3">
					<a href="<?= base_url('backoffice/configuracion/recurso/'. $resourcetaxonomy->resourceTaxonomySlug .'/editar') ?>" class="btn btn-outline-warning btn-block" menu="button">Editar</a>
				</p>
            </div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
