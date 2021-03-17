<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Usuario <b><?= $user->username ?></b></h1>
			<a href="<?= base_url('backoffice/usuarios') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<div class="card border-0 mb-3 shadow-sm">
				<p class="px-3 py-2 my-0">
					<b>Usuario:</b>
					<br /><?= $user->username ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Correo electrónico:</b>
					<br /><?= $user->email ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Nivel de acceso:</b>
					<br /><?php
						switch ($user->auth_level) {
							case 1:
								echo 'Estudiante';
								break;
							case 2:
								echo 'Invitado';
								break;
							case 3:
								echo 'Empleado';
								break;
							case 4:
								echo 'Docente';
								break;
							case 6:
								echo 'Administrador';
								break;
							case 9:
								echo 'Superusuario';
								break;
						}
					?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Banneado:</b>
					<br /><?= $user->banned == 0 ? 'No' : 'Si' ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>UID:</b>
					<br /><?= $user->user_id ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Último acceso:</b>
					<br /><?= $user->last_login ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Último modificación:</b>
					<br /><?= $user->modified_at ?>
				</p>
				<p class="px-3 py-2 my-0">
					<b>Creado:</b>
					<br /><?= $user->created_at ?>
				</p>
				<p class="px-3 py-2 mt-0 mb-3">
					<a href="<?= base_url('backoffice/usuario/'. $user->user_id .'/editar') ?>" class="btn btn-outline-warning btn-block" role="button">Editar</a>
				</p>
			</div>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
