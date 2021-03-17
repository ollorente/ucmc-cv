<main id="main" class="main d-flex align-items-center">
	<div class="container d-flex align-items-center justify-content-center">
		<div class="row">

			<?php if( ! isset( $on_hold_message ) ) { ?>
			<?php
                    if( isset( $login_error_mesg ) ) {
                        echo '
                            <div class="col-12">
                                <div class="alert alert-danger" role="alert">
                                    <p>
                                        Error de inicio de sesión #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Nombre de usuario, dirección de correo electrónico o contraseña no válidos.
                                    </p>
                                    <p>
                                        El nombre de usuario, la dirección de correo electrónico y la contraseña distinguen entre mayúsculas y minúsculas.
                                    </p>
                                </div>
                            </div>
                        ';
                    }
                ?>
			<?php
                if( $this->input->get(AUTH_LOGOUT_PARAM) ) {
                    echo '
                        <div class="col-12">
                            <div class="alert alert-light" role="alert">
                                Has terminado tu sesion satisfactoriamente.
                            </div>
                        </div>
                    ';
                }
            ?>
			<?= validation_errors() ? '<div class="col-12">'. validation_errors() .'</div>' : ''; ?>
			<div class="col-12">
				<?= form_open('backoffice/login', 'class="form-signin text-center"') ?>
				<div class="form-group">
					<input type="email" class="form-control form-control-user" id="login_string" name="login_string"
						aria-describedby="emailHelp" placeholder="Ingrese usuario o Correo electrónico...">
				</div>
				<div class="form-group">
					<input type="password" class="form-control form-control-user" id="login_pass" name="login_pass"
						placeholder="Password">
				</div>
				<?php if( config_item('allow_remember_me') ) { ?>
				<div class="form-group">
					<div class="custom-control custom-checkbox small">
						<input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me"
							value="yes">
						<label class="custom-control-label" for="remember_me">Recuérdame</label>
					</div>
				</div>
				<?php } ?>
				<button class="btn btn--azul btn-block" type="submit" name="submit" value="Login"
					id="submit_button">ENTRAR</button>
				<?= form_close() ?>
			</div>
			<?php } else { ?>
			<div class="col-12">
				<div class="alert alert-light" role="alert">
					<p>
						Intentos de inicio de sesión excesivos
					</p>
					<p>
						Ha excedido el número máximo de errores de inicio de sesión<br />
						intentos que este sitio web permitirá.
						<p>
							<p>
								Su acceso a inicio de sesión y recuperación de cuenta ha sido bloqueado por
								<?= ( (int) config_item('seconds_on_hold') / 60 ) ?> minutos.
							</p>
							<p>
								Utilice la <a href="<?= base_url('examples/recover') ?>">Recuperación de cuenta</a>
								después de que hayan pasado <?= ( (int) config_item('seconds_on_hold') / 60 ) ?>
								minutos,<br />
								o contáctenos si necesita ayuda para acceder a su cuenta.
							</p>
				</div>
			</div>
			<?php } ?>

		</div>
	</div>
</main>
