<!-- Begin Page Content -->
<div class="container-fluid" id="main">

	<div class="row">
		<div class="col-12 d-flex justify-content-between align-items-center mb-4">
			<h1 class="h3 text-gray-800">Nuevo usuario</h1>
			<a href="<?= base_url('backoffice/usuarios') ?>" class="btn btn-outline-secondary btn-sm" role="button">Volver</a>
		</div>

		<div class="col-12">

			<?= '<span class="text-danger font-weight-bold">'. validation_errors() .'</span>' ?>
			<?= isset($error) ? '<span class="text-danger font-weight-bold">'. $error .'</span>' : '' ?>
			<?= isset( $created ) ? $created : '' ?>
			<?= form_open(); ?>
            	<div class="form-group">
					<label for="username">Usuario</label>
					<input type="text" class="form-control" name="username" id="username" placeholder="Usuario" required autofocus>
				</div>
				<div class="form-group">
					<label for="email">Correo electrónico</label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Correo electrónico" required>
				</div>
				<div class="form-group">
					<label for="passwd">Password</label>
					<input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password" required>
				</div>
				<div class="form-group">
					<label for="auth_level">Nivel de acceso</label>
					<select class="form-control" name="auth_level" id="auth_level">
						<?php if ( $this->auth_level > 1 ) { ?><option value="1">Estudiante</option><?php } ?>
						<?php if ( $this->auth_level > 2 ) { ?><option value="2">Invitado</option><?php } ?>
						<?php if ( $this->auth_level > 3 ) { ?><option value="3">Empleado</option><?php } ?>
						<?php if ( $this->auth_level > 4 ) { ?><option value="4">Docente</option><?php } ?>
						<?php if ( $this->auth_level > 6 ) { ?><option value="6">Administrador</option><?php } ?>
						<?php if ( $this->auth_level > 9 ) { ?><option value="9">Superusuario</option><?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Crear</button>
			<?= form_close(); ?>

		</div>

	</div>

</div>
<!-- /.container-fluid -->
