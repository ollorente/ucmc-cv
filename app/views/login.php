
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
                  <?= form_open('', 'class="form-signin text-center"') ?>
                    <a href="<?= base_url() ?>"><img class="mb-4" src="<?= base_url('assets/img/logo_sietic.png') ?>" alt="" width="72" height="72" /></a>

                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

                    <label for="login_string" class="sr-only">Correo Institucional</label>
                    <input type="email" id="login_string" class="form-control border-0" name="login_string" value="" placeholder="micorreo@unicolmayor.edu.co" required autofocus />

                    <label for="login_pass" class="sr-only">Contraseña</label>
                    <input type="password" id="login_pass" class="form-control border-0" name="login_pass" value="" placeholder="Contraseña" required />

                    <button class="btn btn--azul btn-block" type="submit" name="submit" value="Login" id="submit_button">ENTRAR</button>
                    <p class="mt-5 mb-3 text-muted">UCMC &copy; <?= date('Y') ?></p>
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
                                Su acceso a inicio de sesión y recuperación de cuenta ha sido bloqueado por <?= ( (int) config_item('seconds_on_hold') / 60 ) ?> minutos.
                            </p>
                            <p>
                                Utilice la <a href="<?= base_url('examples/recover') ?>">Recuperación de cuenta</a> después de que hayan pasado <?= ( (int) config_item('seconds_on_hold') / 60 ) ?> minutos,<br />
                                o contáctenos si necesita ayuda para acceder a su cuenta.
                            </p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </main>