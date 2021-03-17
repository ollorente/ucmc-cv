<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Objeto <b><?= $object->_id ?></b></h1>
			<a href="<?= base_url('backoffice/objetos') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<div class="card border-0 mb-3 shadow-sm">
				<p class="px-3 py-2 my-0">
					<b>Imagen:</b>
					<br>
					<div class="px-3 text-center">
						<?php if ($object->objectLink) { ?>
						<img src="<?= base_url($object->objectLink) ?>" class="img-fluid rounded">
						<?php } else { ?>
						<img src="<?= base_url('assets/img/no-hay.png') ?>" class="rounded">
						<?php } ?>
					</div>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Youtube:</b>
					<br>
					<div class="px-3 text-center">
						<?php if ($object->objectYoutube) { ?>
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item"
								src="https://www.youtube.com/embed/<?= $object->objectYoutube ?>?rel=0"
								allowfullscreen></iframe>
						</div>
						<?php } else { ?>
						<img src="<?= base_url('assets/img/no-hay.png') ?>" class="rounded">
						<?php } ?>
					</div>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Objeto:</b>
					<br><?= $object->objectObject ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Área:</b>
					<br><?= $object->objectArea ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Área del conocimiento:</b>
					<br><?= $object->objectKnowlessTopic ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Localización:</b>
					<br><?= $object->objectHosting ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Título:</b>
					<br><?= $object->objectTitle ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Descripción:</b>
					<br><?= $object->objectDescription ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Lenguaje:</b>
					<br><?= $object->objectLanguage ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Palabras clave:</b>
					<br><?= $object->objectKeyWords ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Formato:</b>
					<br><?= $object->objectFormat ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Tamaño:</b>
					<br><?= $object->objectSize ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Requerimientos:</b>
					<br><?= $object->objectRequirement ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Instrucciones:</b>
					<br><?= $object->objectInstructions ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Versión:</b>
					<br><?= $object->objectVersion ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Contribuidores:</b>
					<br><?= $object->objectContributors ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Entidades:</b>
					<br><?= $object->objectEntities ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Creado:</b>
					<br><?php $fecha = explode(' ', $object->objectCreatedAt); echo $fecha[0] ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Interactividad:</b>
					<br><?= $object->objectInteractivity ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Costo:</b>
					<br><?= $object->objectCost ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Derechos:</b>
					<br><?= $object->objectRights ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Uso:</b>
					<br><?= $object->objectUse ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Clasificación:</b>
					<br><?= $object->objectClasification ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Taxonomía:</b>
					<br><?= $taxonomy->objectTaxonomyName ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Vistas:</b>
					<br><?= $object->objectViews ?>
				</p>
				<p class="px-3 py-2 my-0">
					<div class="custom-control custom-switch mx-3">
						<input type="checkbox" class="custom-control-input" name="isActive" id="isActive"
							<?php if ($object->isObjectActive == 1) { echo 'checked="checked"'; } else { echo ''; } ?>>
						<label class="custom-control-label" for="isActive">Activo</label>
					</div>
				</p>
				<p class="px-3 py-2 mt-0 mb-3">
					<a href="<?= base_url('backoffice/objeto/'. $object->_id .'/editar') ?>"
						class="btn btn-outline-warning btn-block" role="button">Editar</a>
				</p>
			</div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
