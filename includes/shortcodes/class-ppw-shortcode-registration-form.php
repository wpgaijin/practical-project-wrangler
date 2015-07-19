<?php
/**
 * Fontend registration form shortcode
 *
 * @package     PPW
 * @subpackage  PPW/Includes/Shortcodes
 * @since       0.0.1
 */

if( !class_exists( 'PPW_Shortcode_Registration_Form' ) ) {
	class PPW_Shortcode_Registration_Form {

		/**
		 * Shortcode ID
		 *
		 * @since  0.0.1
		 * @var    string $shortcode_id the shortcode ID
		 */
		protected $shortcode_id;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->shortcode_id = PPW_PREFIX . '_registration_form';
			add_shortcode( PPW_PREFIX . '_registration_form', array( $this, 'shortcode' ) );
			add_action( 'init', array( $this, 'add_new_user' ) );
		} // end __construct

		public function shortcode() {
			// check to make sure user registration is enabled
			$registration_enabled = get_option( 'users_can_register' );
			// only show the registration form if allowed
			if( current_user_can( 'manage_options' ) ) {
				$output = $this->registration_form_fields();
			} else {
				$output = __( 'Please Contact Fulcrum Creatives for an Account' );
			}
			return $output;
        } // end shortcode

        public function registration_form_fields() {
        	$this->show_error_messages();
        	// Close the comments
			ppw_close_comments( $this->shortcode_id );
			// Enqueue the comments off JavaScript
			ppw_enqueue_if_registered( PPW_PREFIX . '-comments-off' );
			// Enqueue the password strength meter
			wp_enqueue_script( 'password-strength-meter' );
			// Return the registration form template
			return ppw_get_plugin_part( 'includes/views/template-ppw-registration-form' );
        } // end registration_form_fields

        public function add_new_user() {
		  	if( isset( $_POST["user_login"] ) && wp_verify_nonce( $_POST[PPW_PREFIX . '_register_nonce'], PPW_PREFIX . '-register-nonce' ) ) {
		  		$user_client	= $_POST["user_client"];
				$user_login		= $_POST["user_login"];	
				$user_email		= $_POST["user_email"];
				$user_pass		= $_POST["user_pass"];
				$pass_confirm 	= $_POST["pass_confirm"];
				$user_first 	= $_POST["user_first"];
				$user_last	 	= $_POST["user_last"];
				$user_client	= $_POST["user_client"];
				// this is required for username checks
				require_once( ABSPATH . WPINC . '/registration.php' );
				if( username_exists( $user_login ) ) {
					// Username already registered
					$this->errors()->add( 'username_unavailable', __( 'Username already taken' ) );
				}
				if( !validate_username($user_login) ) {
					// invalid username
					$this->errors()->add( 'username_invalid', __( 'Invalid username') );
				}
				if( $user_login == '' ) {
					// empty username
					$this->errors()->add( 'username_empty', __( 'Please enter a username') );
				}
				if(!is_email($user_email)) {
					//invalid email
					$this->errors()->add( 'email_invalid', __( 'Invalid email' ) );
				}
				$errors = $this->errors()->get_error_messages();
				// only create the user in if there are no errors
				if( empty( $errors ) ) {
		 
					$user_id = wp_insert_user(array(
							'user_client'		=> $user_client,
							'user_login'		=> $user_login,
							'user_pass'	 		=> $user_pass,
							'user_email'		=> $user_email,
							'first_name'		=> $user_first,
							'last_name'			=> $user_last,
							'display_name'  	=> $user_first . ' ' . $user_last,
							'nickname'  		=> $user_first . ' ' . $user_last,
							'user_registered'	=> date('Y-m-d H:i:s'),
							'role'				=> 'client'
						)
					);
					update_user_meta( $user_id, 'privilege_id', $user_login );
					update_user_meta( $user_id, PPW_PREFIX . '_users_client', $user_client );
					if( $user_id ) {
						// send the newly created user to the home page after logging them in
						wp_redirect( home_url() ); exit;
					}
				}
			}
		} // end add_new_user

		public function errors(){
		    static $wp_error; // Will hold global variable safely
		    return isset( $wp_error ) ? $wp_error : ( $wp_error = new WP_Error( null, null, null ) );
		} // end errors

		public function show_error_messages() {
			if( $codes = $this->errors()->get_error_codes() ) {
				echo '<div style="padding: 8px; border: 1px solid #f50; margin: 0 0 15px; display: inline-block">';
				    // Loop error codes and display errors
				   foreach( $codes as $code ){
				        $message = $this->errors()->get_error_message($code);
				        echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
				    }
				echo '</div>';
			}	
		} // end show_error_messages
	}
} // end PPW_Shortcode_Registration_Form