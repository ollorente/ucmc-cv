<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Configuración</b></h1>
			<a href="<?= base_url('backoffice') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<div class="card border-0 mb-3 shadow-sm">
				<a class="btn btn-primary btn-block" href="<?= base_url('backoffice/configuracion/menus') ?>" role="button">Menús</a>
				<a class="btn btn-primary btn-block" href="<?= base_url('backoffice/configuracion/objetos') ?>" role="button">Objetos</a>
				<a class="btn btn-primary btn-block" href="<?= base_url('backoffice/configuracion/recursos') ?>" role="button">Recursos</a>
				<a class="btn btn-primary btn-block" href="<?= base_url('backoffice/configuracion/roles') ?>" role="button">Roles</a>
				<?php if (isset($__usuario)) { ?><a class="btn btn-primary btn-block" href="<?= base_url('backoffice/configuracion/usuarios') ?>" role="button">Usuarios</a><?php } ?>
			</div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
