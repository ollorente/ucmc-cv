<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Editar usuario <b><?= $user->username ?></b></h1>
			<a href="<?= base_url('backoffice/usuario/') . $user->user_id ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset( $updated ) ? $updated : '' ?>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" name="username" value="<?= $user->username ?>" id="username" placeholder="Usuario" required autofocus>
				</div>
				<div class="form-group">
					<label for="email">Correo electrónico</label>
					<input type="text" class="form-control" name="email" value="<?= $user->email ?>" id="email" placeholder="Correo electrónico" required>
				</div>
				<div class="form-group">
					<label for="auth_level">Nivel de acceso</label>
					<select class="form-control" name="auth_level" id="auth_level">
						<?php if ( $this->auth_level > 1 ) { ?><option <?php if ( $user->auth_level == 1 ) { echo 'selected'; }; ?> value="1">Estudiante</option><?php } ?>
						<?php if ( $this->auth_level > 2 ) { ?><option <?php if ( $user->auth_level == 2 ) { echo 'selected'; }; ?> value="2">Invitado</option><?php } ?>
						<?php if ( $this->auth_level > 3 ) { ?><option <?php if ( $user->auth_level == 3 ) { echo 'selected'; }; ?> value="3">Empleado</option><?php } ?>
						<?php if ( $this->auth_level > 4 ) { ?><option <?php if ( $user->auth_level == 4 ) { echo 'selected'; }; ?> value="4">Docente</option><?php } ?>
						<?php if ( $this->auth_level > 6 ) { ?><option <?php if ( $user->auth_level == 6 ) { echo 'selected'; }; ?> value="6">Administrador</option><?php } ?>
						<?php if ( $this->auth_level > 9 ) { ?><option <?php if ( $user->auth_level == 9 ) { echo 'selected'; }; ?> value="9">Superusuario</option><?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="banned">Banneado</label>
					<select class="form-control" name="banned" id="banned">
						<option <?php if ( $user->banned == 1 ) { echo 'selected'; } ?> value="1">Si</option>
						<option <?php if ( $user->banned == 0 ) { echo 'selected'; } ?> value="0">No</option>
					</select>
				</div>
				<div class="form-group">
					<label for="user_id">UID</label>
					<input type="text" class="form-control" name="user_id" value="<?= $user->user_id ?>" id="user_id" placeholder="UID" disabled>
				</div>
				<button type="submit" class="btn btn-warning btn-block">Actualizar</button>
			<?= form_close() ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
