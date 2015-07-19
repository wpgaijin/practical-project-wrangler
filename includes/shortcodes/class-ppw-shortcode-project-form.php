<?php
/**
 * Project form shortcode
 *
 * @package    PPW
 * @subpackage PPW/Includes/Shortcodes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Shortcode_Project_Form' ) ) {
	class PPW_Shortcode_Project_Form {
		/**
		 * Form ID
		 *
		 * @since  0.0.1
		 * @var    string $form_id The form id
		 */
		protected $form_id;

		/**
		 * Fake form id
		 *
		 * @since  0.0.1
		 * @var    string $fake_id A fake id for saving new posts
		 */
		protected $fake_id;

		/**
		 * Post Title
		 *
		 * @since  0.0.1
		 * @var    string $the_post_title the post's title
		 */
		protected $title_id;

		/**
		 * Submit name attr
		 *
		 * @since  0.0.1
		 * @var    string $submit_name_attr
		 */
		protected $submit_name_attr;

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
			$this->form_id          = PPW_PREFIX . '_projects_frontend_form';
			$this->fake_id          = PPW_PREFIX . '_projects_fake_id';
			$this->title_id         = PPW_PREFIX . '_projects_name';
			$this->submit_name_attr = PPW_PREFIX . '_projects_submit';
			$this->shortcode_id     = PPW_PREFIX . '_project_form';
			add_action( 'cmb2_init', array( $this, 'register_form_fields' ) );
			add_action( 'cmb2_after_init', array( $this, 'save_form' ) );
			add_shortcode( $this->shortcode_id, array( $this, 'shortcode' ) );
		} // end __construct

		/**
		 * Register form fields
		 *
		 * @since      0.0.12
		 * @return     void
		 */
		public function register_form_fields() {
			$fields = new_cmb2_box( array(
				'id'           => $this->form_id,
				'object_types' => array( 'ppw_projects' ),
				'hookup'       => false,
				'save_fields'  => false,
			) );
			$fields->add_field( array(
				'name'        => __( 'Project Name', PPW_TEXTDOMAIN ),
				'id'          => $this->title_id,
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'             => __( 'Assign Client', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_projects_client',
				'desc'             => __( '*', PPW_TEXTDOMAIN ),
				'type'             => 'search',
				'show_option_none' => true,
				'options'          => ppw_get_active_clients(),
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
			$fields->add_field( array(
				'name'        => 'Assign to:',
				'id'          => PPW_PREFIX . '_assigned',
				'type'        => 'multiselect',
				'row_classes' => 'select-default',
				'options'     => ppw_get_manager_users(),
			) );
			$fields->add_field( array(
				'name'             => __( 'Category', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_projects_category',
				'type'             => 'multiselect',
				'show_option_none' => true,
				'row_classes'      => 'ppw-half-field',
				'options'          => $this->get_terms( 'ppw_projects_categories' )
			) );
			$fields->add_field( array(
				'name'              => __( 'Sub Categories', PPW_TEXTDOMAIN ),
				'id'                => PPW_PREFIX . '_projects_sub_category',
				'type'              => 'multiselect',
				'show_option_none'  => true,
				'row_classes'       => 'ppw-half-field ppw-padding-right',
				'options'           => $this->get_terms( 'ppw_projects_sub_categories' )
			) );
			$fields->add_field( array(
				'name'       => __( 'Project\'s Start Date', PPW_TEXTDOMAIN ),
				'desc'       => __( '*', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_date_start',
				'type'       => 'text_date',
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
			$fields->add_field( array(
				'name'       => __( 'Project\'s Completion Date', PPW_TEXTDOMAIN ),
				'desc'       => __( '*', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_date_end',
				'type'       => 'text_date',
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
			$fields->add_field( array(
				'name'       => __( 'Porject\'s Description', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_desc',
				'type'       => 'wysiwyg',
				'options'    => array(
						'wpautop'       => true,
						'media_buttons' => false,
						'textarea_rows' => get_option('default_post_edit_rows', 10),
						'quicktags'     => false
					)
			) );
			$fields->add_field( array(
				'name'        => 'Assign to:',
				'id'          => PPW_PREFIX . '_the_project_status',
				'type'        => 'text',
				'default'     => 'active',
				'show_names'  => false,
				'attributes'  => array(
			        'hidden' => 'hidden',
			    ),
			) );
		} // end register_form_fields

		/**
		 * Get Terms
		 *
		 * @since      0.0.1
		 * @param      string $terms the taxominy term
		 * @return     array the array of term names and IDs
		 */
		public function get_terms( $terms ) {
			$terms = get_terms( $terms, array( 'hide_empty' => false ) );
			$array = array();
				foreach( $terms as $term ) {
					$array[$term->term_id] = $term->name;
				}
			return $array;
		} // end get_terms

		/**
		 * Save the form
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function save_form() {
			// If no form submission, bail
			if ( empty( $_POST ) || ! isset( $_POST[$this->submit_name_attr], $_POST['object_id'] ) ) {
				return false;
			}
			// Get CMB2 metabox object
			$cmb = cmb2_get_metabox( $this->form_id, $this->fake_id );

			$post_data = array();
			// Get our shortcode attributes and set them as our initial post_data args
			if ( isset( $_POST['atts'] ) ) {
				foreach ( (array) $_POST['atts'] as $key => $value ) {
					$post_data[ $key ] = sanitize_text_field( $value );
				}
				unset( $_POST['atts'] );
			}
			// Check security nonce
			if ( ! isset( $_POST[ $cmb->nonce() ] ) || ! wp_verify_nonce( $_POST[ $cmb->nonce() ], $cmb->nonce() ) ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'security_fail', __( 'Security check failed.' ) ) );
			}
			// Check title submitted
			if ( empty( $_POST[$this->title_id] ) ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Project Name Required' ) ) );
			}
			// And that the title is not the default title
			if ( $cmb->get_field( $this->title_id )->default() == $_POST[$this->title_id] ) {
				return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Please enter the client name.' ) ) );
			}
			// Fetch sanitized values
			$sanitized_values = $cmb->get_sanitized_values( $_POST );
			// Set our post data arguments
			$post_data['post_title']   = $sanitized_values[$this->title_id];
			unset( $sanitized_values[$this->title_id] );
			// Create the new post
			$new_submission_id = wp_insert_post( $post_data, true );
			// If we hit a snag, update the user
			if ( is_wp_error( $new_submission_id ) ) {
				return $cmb->prop( 'submission_error', $new_submission_id );
			}
			// Loop through remaining (sanitized) data, and save to post-meta
			foreach ( $sanitized_values as $key => $value ) {
				update_post_meta( $new_submission_id, $key, $value );
			}
			// Redirect after submit
			wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
			exit;
		} // end save_the_form

		/**
		 * The Shortcode
		 *
		 * @since      0.0.1
		 * @param      array $atts the shrtcode attributes
		 * @return     mixed $output the shoutcode output
		 */
		public function shortcode( $atts = array() ) {
			// Close the comments
			ppw_close_comments( $this->shortcode_id );
			// Enqueue the comments off JavaScript
			ppw_enqueue_if_registered( PPW_PREFIX . '-comments-off' );
			// Get CMB2 metabox object
			$cmb = cmb2_get_metabox( $this->form_id, $this->fake_id );
			// Get $cmb object_types
			$post_types = $cmb->prop( 'object_types' );
			// Current user
			$user_id = get_current_user_id();
			// Parse attributes
			$atts = shortcode_atts( array(
				'post_author' => $user_id ? $user_id : 1, // Current user, or admin
				'post_status' => 'publish',
				'post_type'   => reset( $post_types ), // Only use first object_type in array
			), $atts, $this->shortcode_id );
			// Add hidden attributes
			foreach ( $atts as $key => $value ) {
				$cmb->add_hidden_field( array(
					'field_args'  => array(
						'id'    => "atts[$key]",
						'type'  => 'hidden',
						'default' => $value,
					),
				) );
			}
			// Initiate our output variable
			$output = '';
			// Get any submission errors
			if ( ( $error = $cmb->prop( 'submission_error' ) ) && is_wp_error( $error ) ) {
				// If there was an error with the submission, add it to our ouput.
				$output .= '<h3>' . sprintf( __( 'There was an error in the submission: %s', PPW_TEXTDOMAIN ), '<strong>'. $error->get_error_message() .'</strong>' ) . '</h3>';
			}
			// Get our form
			$form_args = array(
				'form_format' => '<form class="cmb-form" method="post" id="%1$s" enctype="multipart/form-data" encoding="multipart/form-data"><input type="hidden" name="object_id" value="%2$s">%3$s<input type="submit" name="' . $this->submit_name_attr . '" value="%4$s" class="button-primary"></form>',
				'save_button' => __( 'Submit Project', PPW_TEXTDOMAIN )
			);
			// The outputed HTML
			$output .= cmb2_get_metabox_form( $cmb, $this->fake_id, $form_args );
			return $output;
		} // end shortcode
	}
} // end PPW_Shortcode_Project_Form