<!-- Begin Page Content -->
<div class="container-fluid" id="main">

  <div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Herramienta <b><?= $tool->_id ?></b></h1>
			<a href="<?= base_url('backoffice/herramientas') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<div class="card border-0 mb-3 shadow-sm">
				<p class="px-3 py-2 my-0">
					<b>Nombre:</b>
					<br /><?= $tool->toolName ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Link:</b>
					<br /><?= $tool->toolNameUrl ?>
				</p>
				<div class="px-3 py-2 my-0">
					<b>Descripción:</b>
					<br /><?= $tool->toolDescription ?>
				</div>
				<p class="px-3 py-2 my-0">
					<b>A quien va dirigido:</b>
					<br /><?= $role->roleName ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Imagen:</b>
					<br /><img src="<?php if ($tool->toolImageUrl) { echo $tool->toolImageUrl; } else { echo base_url('/assets/img/no-hay.png'); } ?>" class="img-fluid rounded">
				</p>
				<p class="px-3 py-2 my-0">
					<div class="custom-control custom-switch mx-3">
						<input type="checkbox" class="custom-control-input" name="isActive" id="isActive" <?php if ($tool->isToolActive == 1) { echo 'checked="checked"'; } else { echo ''; } ?>>
						<label class="custom-control-label" for="isActive">Activo</label>
					</div>
				</p>
				<p class="px-3 py-2 mt-0 mb-3">
					<a href="<?= base_url('backoffice/herramienta/'. $tool->_id .'/editar') ?>" class="btn btn-outline-warning btn-block" role="button">Editar</a>
				</p>
			</div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
