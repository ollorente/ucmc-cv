<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Recurso <b><?= $resource->resourceCode ?></b></h1>
			<a href="<?= base_url('backoffice/recursos') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-0">
          <p class="px-3 py-2 my-0">
            <b>Imagen:</b>
            <br>
            <div class="px-3 text-center">
              <?php if ($resource->resourceLink) { ?>
              <img src="<?= base_url($resource->resourceLink) ?>" class="img-fluid rounded">
              <?php } else { ?>
              <img src="<?= base_url('assets/img/no-hay.png') ?>" class="rounded">
              <?php } ?>
            </div>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Área:</b>
            <br><?= $resource->resourceArea ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Área del conocimiento:</b>
            <br><?= $resource->resourceKnowlessTopic ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Palabras claves:</b>
            <br><?= $resource->resourceKeyWords ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Formato:</b>
            <br><?= $resource->resourceFormat ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Entidades:</b>
            <br><?= $resource->resourceEntities ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Costo:</b>
            <br><?= $resource->resourceCost ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Derechos:</b>
            <br><?= $resource->resourceRights ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Taxonomía:</b>
            <br><?= $taxonomy->resourceTaxonomyName ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Código:</b>
            <br><?= $resource->resourceCode ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Creado:</b>
            <br><?php $fecha = explode(' ', $resource->resourceCreatedAt); echo $fecha[0] ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Accesos:</b>
            <br><?= $resource->resourceCodeAccess ?>
          </p>
          <p class="px-3 py-2 my-0">
            <b>Vistas:</b>
            <br><?= $resource->resourceViews ?>
          </p>
          <p class="px-3 py-2 my-0">
            <div class="custom-control custom-switch mx-3">
              <input type="checkbox" class="custom-control-input" name="isActive" id="isActive" <?php if ($resource->isResourceActive == 1) { echo 'checked="checked"'; } else { echo ''; } ?>>
              <label class="custom-control-label" for="isActive">Activo</label>
            </div>
          </p>
          <p class="px-3 py-2 mt-0 mb-3">
            <a href="<?= base_url('backoffice/recurso/'. $resource->resourceCode .'/editar') ?>" class="btn btn-outline-warning btn-block" role="button">Editar</a>
          </p>
        </div>
      </div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
