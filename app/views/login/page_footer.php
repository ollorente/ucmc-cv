      <div class="col-12 col-sm-4">
				<div class="card">
					<div class="card-body">
						<ul class="list-group list-group-flush">
							<?php
								$link_protocol = USE_SSL ? 'https' : NULL;

								if( $this->router->default_controller == 'backoffice/login/home' )
									echo '<li class="list-group-item">' . anchor( site_url('', $link_protocol ),'Home') . '</li>';
							?>
							<li class="list-group-item"><?php
								echo isset( $auth_user_id )
									? logout_anchor('backoffice/login/logout', 'Logout')
									: login_anchor('backoffice/login', 'Login', 'id="login-link"' );
							?></li>
							<?php 
								if( ! isset( $auth_user_id ) )
									echo '<li class="list-group-item">' . anchor( site_url('backoffice/login/login-con-ajax', $link_protocol ), 'Login Ajax','id="ajax-login-link"') . '</li>';
							?>
							<li class="list-group-item"><?php echo anchor( site_url('backoffice/login/test-login-opcional', $link_protocol ), 'Login Optional'); ?></li>
							<li class="list-group-item"><?php echo anchor( site_url('backoffice/login/verificacion-simple', $link_protocol ), 'Verificación Simple'); ?></li>
							<li class="list-group-item"><?php echo anchor( site_url('backoffice/login/crear-usuario', $link_protocol ), 'Crear Usuario'); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>

<?php

/* End of file page_footer.php */
/* Location: /community_auth/views/login/page_footer.php */