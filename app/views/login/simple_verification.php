<div class="col-12 col-sm-8">
<h1><?= $title ?></h1>
<?php
echo '<p>';
		if( ! empty( $this->auth_role ) )
		{
			echo $this->auth_role . ' logged in!<br />
				User ID is ' . $this->auth_user_id . '<br />
				Auth level is ' . $this->auth_level . '<br />
				Username is ' . $this->auth_username;

			if( $http_user_cookie_contents = $this->input->cookie( config_item('http_user_cookie_name') ) )
			{
				$http_user_cookie_contents = unserialize( $http_user_cookie_contents );
				
				echo '<br />
					<pre>';

				print_r( $http_user_cookie_contents );

				echo '</pre>';
			}

			if( config_item('add_acl_query_to_auth_functions') && $this->acl )
			{
				echo '<br />
					<pre>';

				print_r( $this->acl );

				echo '</pre>';
			}

			/**
			 * ACL usage doesn't require ACL be added to auth vars.
			 * If query not performed during authentication, 
			 * the acl_permits function will query the DB.
			 */
			if( $this->acl_permits('general.secret_action') )
			{
				echo '<p>ACL permission grants action!</p>';
			}
		}
		else
		{
			echo 'Nobody logged in.';
		}

		echo '</p>';
?>
</div>