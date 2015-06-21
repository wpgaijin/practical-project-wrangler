<?php
/**
 * Client Frontend form shortcode
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */
if( ! function_exists( ' ppw_clients_frontend_form_register ') ) {
	function ppw_clients_frontend_form_register() {
		$fields = new_cmb2_box( array(
			'id'           => PPW_PREFIX .'clients_frontend_form',
			'object_types' => array( 'ppw_clients' ),
			'hookup'       => false,
			'save_fields'  => false,
		) );
		$fields->add_field( array(
			'name'        => __( 'Client Name', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_name',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_address',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'City', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_city',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'             => __( 'State', PPW_TEXTDOMAIN ),
			'id'               => PPW_PREFIX . 'submitted_clients_state',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'OH',
			'options'          => array(
				'AL'     => __( 'Alabama', PPW_TEXTDOMAIN ),
				'AK'     => __( 'Alaska', PPW_TEXTDOMAIN ),
				'AS'     => __( 'American Samoa', PPW_TEXTDOMAIN ),
				'AZ'     => __( 'Arizona', PPW_TEXTDOMAIN ),
				'AR'     => __( 'Arkansas', PPW_TEXTDOMAIN ),
				'CA'     => __( 'California', PPW_TEXTDOMAIN ),
				'CO'     => __( 'Colorado', PPW_TEXTDOMAIN ),
				'CT'     => __( 'Connecticut', PPW_TEXTDOMAIN ),
				'DE'     => __( 'Delaware', PPW_TEXTDOMAIN ),
				'DC'     => __( 'District of Columbia', PPW_TEXTDOMAIN ),
				'FM_Fed' => __( 'Federated States of Microneisa', PPW_TEXTDOMAIN ),
				'FL'     => __( 'Florida', PPW_TEXTDOMAIN ),
				'GA'     => __( 'Georgia', PPW_TEXTDOMAIN ),
				'GU'     => __( 'Guam', PPW_TEXTDOMAIN ),
				'HI'     => __( 'Hawaii', PPW_TEXTDOMAIN ),
				'ID'     => __( 'Idaho', PPW_TEXTDOMAIN ),
				'IL'     => __( 'Illinois', PPW_TEXTDOMAIN ),
				'IN'     => __( 'Indiana', PPW_TEXTDOMAIN ),
				'IA'     => __( 'Iowa', PPW_TEXTDOMAIN ),
				'KS'     => __( 'Kansas', PPW_TEXTDOMAIN ),
				'KY'     => __( 'Kentucky', PPW_TEXTDOMAIN ),
				'LA'     => __( 'Louisiana', PPW_TEXTDOMAIN ),
				'ME'     => __( 'Maine', PPW_TEXTDOMAIN ),
				'MH'     => __( 'Marshall Islands', PPW_TEXTDOMAIN ),
				'MD'     => __( 'Maryland', PPW_TEXTDOMAIN ),
				'MA'     => __( 'Massachusetts', PPW_TEXTDOMAIN ),
				'MI'     => __( 'Michigan', PPW_TEXTDOMAIN ),
				'MN'     => __( 'Minnesota', PPW_TEXTDOMAIN ),
				'MS'     => __( 'Mississippi', PPW_TEXTDOMAIN ),
				'MO'     => __( 'Missouri', PPW_TEXTDOMAIN ),
				'MT'     => __( 'Montana', PPW_TEXTDOMAIN ),
				'NE'     => __( 'Nebraska', PPW_TEXTDOMAIN ),
				'NE'     => __( 'Nevada', PPW_TEXTDOMAIN ),
				'NH'     => __( 'New Hampshire', PPW_TEXTDOMAIN ),
				'NJ'     => __( 'New Jersey', PPW_TEXTDOMAIN ),
				'NM'     => __( 'New Mexico', PPW_TEXTDOMAIN ),
				'NY'     => __( 'New York', PPW_TEXTDOMAIN ),
				'NC'     => __( 'North Carolina', PPW_TEXTDOMAIN ),
				'ND'     => __( 'North Dakota', PPW_TEXTDOMAIN ),
				'MP'     => __( 'Northeren Marina Islands', PPW_TEXTDOMAIN ),
				'OH'     => __( 'Ohio', PPW_TEXTDOMAIN ),
				'OK'     => __( 'Oklahoma', PPW_TEXTDOMAIN ),
				'OR'     => __( 'Oregon', PPW_TEXTDOMAIN ),
				'PW'     => __( 'Palau', PPW_TEXTDOMAIN ),
				'PA'     => __( 'Pennsylvania', PPW_TEXTDOMAIN ),
				'PR'     => __( 'Puerto Rico', PPW_TEXTDOMAIN ),
				'RI'     => __( 'Rhode Island', PPW_TEXTDOMAIN ),
				'SC'     => __( 'South Carolina', PPW_TEXTDOMAIN ),
				'SD'     => __( 'South Dakota', PPW_TEXTDOMAIN ),
				'TN'     => __( 'Tennessee', PPW_TEXTDOMAIN ),
				'TX'     => __( 'Texas', PPW_TEXTDOMAIN ),
				'UT'     => __( 'Utah', PPW_TEXTDOMAIN ),
				'VT'     => __( 'Vermont', PPW_TEXTDOMAIN ),
				'VI'     => __( 'Virgin Islands', PPW_TEXTDOMAIN ),
				'VA'     => __( 'Virginia', PPW_TEXTDOMAIN ),
				'WA'     => __( 'Washington', PPW_TEXTDOMAIN ),
				'WV'     => __( 'West Virginia', PPW_TEXTDOMAIN ),
				'WI'     => __( 'Wisconsin', PPW_TEXTDOMAIN ),
				'WY'     => __( 'Wyoming', PPW_TEXTDOMAIN )
			)
		) );
		$fields->add_field( array(
			'name'        => __( 'Zip Code', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_zip',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_phone',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_email',
			'type'        => 'text_email',
		) );
		$fields->add_field( array(
			'name'        => __( 'Website URL', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_url',
			'type'        => 'text_url',
		) );
		$fields->add_field( array(
			'name'       => __( 'Billing Addess is Different', PPW_TEXTDOMAIN ),
			'id'         => PPW_PREFIX . 'submitted_clients_billing_different',
			'type'       => 'checkbox'
		) );
		$fields->add_field( array(
			'name'        => __( 'Company Name', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_company_name',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_address',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'City', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_city',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'             => __( 'State', PPW_TEXTDOMAIN ),
			'id'               => PPW_PREFIX . 'submitted_clients_billing_state',
			'type'             => 'select',
			'show_option_none' => false,
			'default'          => 'OH',
			'options'          => array(
				'AL'     => __( 'Alabama', PPW_TEXTDOMAIN ),
				'AK'     => __( 'Alaska', PPW_TEXTDOMAIN ),
				'AS'     => __( 'American Samoa', PPW_TEXTDOMAIN ),
				'AZ'     => __( 'Arizona', PPW_TEXTDOMAIN ),
				'AR'     => __( 'Arkansas', PPW_TEXTDOMAIN ),
				'CA'     => __( 'California', PPW_TEXTDOMAIN ),
				'CO'     => __( 'Colorado', PPW_TEXTDOMAIN ),
				'CT'     => __( 'Connecticut', PPW_TEXTDOMAIN ),
				'DE'     => __( 'Delaware', PPW_TEXTDOMAIN ),
				'DC'     => __( 'District of Columbia', PPW_TEXTDOMAIN ),
				'FM_Fed' => __( 'Federated States of Microneisa', PPW_TEXTDOMAIN ),
				'FL'     => __( 'Florida', PPW_TEXTDOMAIN ),
				'GA'     => __( 'Georgia', PPW_TEXTDOMAIN ),
				'GU'     => __( 'Guam', PPW_TEXTDOMAIN ),
				'HI'     => __( 'Hawaii', PPW_TEXTDOMAIN ),
				'ID'     => __( 'Idaho', PPW_TEXTDOMAIN ),
				'IL'     => __( 'Illinois', PPW_TEXTDOMAIN ),
				'IN'     => __( 'Indiana', PPW_TEXTDOMAIN ),
				'IA'     => __( 'Iowa', PPW_TEXTDOMAIN ),
				'KS'     => __( 'Kansas', PPW_TEXTDOMAIN ),
				'KY'     => __( 'Kentucky', PPW_TEXTDOMAIN ),
				'LA'     => __( 'Louisiana', PPW_TEXTDOMAIN ),
				'ME'     => __( 'Maine', PPW_TEXTDOMAIN ),
				'MH'     => __( 'Marshall Islands', PPW_TEXTDOMAIN ),
				'MD'     => __( 'Maryland', PPW_TEXTDOMAIN ),
				'MA'     => __( 'Massachusetts', PPW_TEXTDOMAIN ),
				'MI'     => __( 'Michigan', PPW_TEXTDOMAIN ),
				'MN'     => __( 'Minnesota', PPW_TEXTDOMAIN ),
				'MS'     => __( 'Mississippi', PPW_TEXTDOMAIN ),
				'MO'     => __( 'Missouri', PPW_TEXTDOMAIN ),
				'MT'     => __( 'Montana', PPW_TEXTDOMAIN ),
				'NE'     => __( 'Nebraska', PPW_TEXTDOMAIN ),
				'NE'     => __( 'Nevada', PPW_TEXTDOMAIN ),
				'NH'     => __( 'New Hampshire', PPW_TEXTDOMAIN ),
				'NJ'     => __( 'New Jersey', PPW_TEXTDOMAIN ),
				'NM'     => __( 'New Mexico', PPW_TEXTDOMAIN ),
				'NY'     => __( 'New York', PPW_TEXTDOMAIN ),
				'NC'     => __( 'North Carolina', PPW_TEXTDOMAIN ),
				'ND'     => __( 'North Dakota', PPW_TEXTDOMAIN ),
				'MP'     => __( 'Northeren Marina Islands', PPW_TEXTDOMAIN ),
				'OH'     => __( 'Ohio', PPW_TEXTDOMAIN ),
				'OK'     => __( 'Oklahoma', PPW_TEXTDOMAIN ),
				'OR'     => __( 'Oregon', PPW_TEXTDOMAIN ),
				'PW'     => __( 'Palau', PPW_TEXTDOMAIN ),
				'PA'     => __( 'Pennsylvania', PPW_TEXTDOMAIN ),
				'PR'     => __( 'Puerto Rico', PPW_TEXTDOMAIN ),
				'RI'     => __( 'Rhode Island', PPW_TEXTDOMAIN ),
				'SC'     => __( 'South Carolina', PPW_TEXTDOMAIN ),
				'SD'     => __( 'South Dakota', PPW_TEXTDOMAIN ),
				'TN'     => __( 'Tennessee', PPW_TEXTDOMAIN ),
				'TX'     => __( 'Texas', PPW_TEXTDOMAIN ),
				'UT'     => __( 'Utah', PPW_TEXTDOMAIN ),
				'VT'     => __( 'Vermont', PPW_TEXTDOMAIN ),
				'VI'     => __( 'Virgin Islands', PPW_TEXTDOMAIN ),
				'VA'     => __( 'Virginia', PPW_TEXTDOMAIN ),
				'WA'     => __( 'Washington', PPW_TEXTDOMAIN ),
				'WV'     => __( 'West Virginia', PPW_TEXTDOMAIN ),
				'WI'     => __( 'Wisconsin', PPW_TEXTDOMAIN ),
				'WY'     => __( 'Wyoming', PPW_TEXTDOMAIN )
			)
		) );
		$fields->add_field( array(
			'name'        => __( 'Zip Code', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_zip',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_phone',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_billing_email',
			'type'        => 'text_email',
		) );
		$fields->add_field( array(
			'name'        => __( 'Contact Name', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_primary_contact_name',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_primary_contact_phone',
			'type'        => 'text',
		) );
		$fields->add_field( array(
			'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_primary_contact_email',
			'type'        => 'text_email',
		) );
		$group_field_id = $fields->add_field( array(
			'id'          => PPW_PREFIX . 'submitted_clients_additional_contacts_group',
			'type'        => 'group',
			'options'     => array(
				'group_title'   => __( 'Contact {#}', PPW_TEXTDOMAIN ),
				'add_button'    => __( 'Add Contact', PPW_TEXTDOMAIN ),
				'remove_button' => __( 'Remove Contact', PPW_TEXTDOMAIN ),
				'sortable'      => false,
			),
		) );
		$fields->add_group_field( $group_field_id, array(
			'name'        => __( 'Conact Name', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_additional_contacts_name',
			'type'        => 'text',
		) );
		$fields->add_group_field( $group_field_id, array(
			'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_additional_contacts_phone',
			'type'        => 'text',
		) );
		$fields->add_group_field( $group_field_id, array(
			'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_additional_contacts_email',
			'type'        => 'text_email',
		) );
		$fields->add_field( array(
			'name'        => __( 'Information', PPW_TEXTDOMAIN ),
			'id'          => PPW_PREFIX . 'submitted_clients_add_info',
			'type'        => 'wysiwyg'
		) );
		$fields->add_field( array(
			'name'       => __( 'Client is Active', PPW_TEXTDOMAIN ),
			'id'         => PPW_PREFIX . 'submitted_clients_status',
			'type'       => 'checkbox',
			'default'    => 1
		) );
		$fields->add_field( array(
			'name'       => __( 'Client Number', PPW_TEXTDOMAIN ),
			'id'         => PPW_PREFIX . 'submitted_clients_number',
			'type'       => 'text_small',
			'default'    => ppw_clients_count_posts()
		) );
	}
	add_action( 'cmb2_init', 'ppw_clients_frontend_form_register' );
} // end ppw_clients_frontend_form_register

/**
 * Count Posts
 *
 * @since      0.0.1
 * @return     int the post total +1
 */
if( ! function_exists( ' ppw_clients_count_posts ') ) {
	function ppw_clients_count_posts() {
		global $post;
		$count_posts = wp_count_posts('ppw_clients');
		$published = $count_posts->publish+1;
		return $published;
	}
} // end count_posts

/**
 * Gets the front-end-post-form cmb instance
 *
 * @return CMB2 object
 */
if( ! function_exists( ' ppw_get_clients_frontend_form ') ) {
	function ppw_get_clients_frontend_form() {
		// Use ID of metabox in ppw_clients_frontend_form_register
		$metabox_id = PPW_PREFIX .'clients_frontend_form';
		// Post/object ID is not applicable since we're using this form for submission
		$object_id  = 'fake-oject-id';
		// Get CMB2 metabox object
		return cmb2_get_metabox( $metabox_id, $object_id );
	}
} // end ppw_get_clients_frontend_form

/**
 * Handle the ppw_client_form shortcode
 *
 * @param  array  $atts Array of shortcode attributes
 * @return string       Form html
 */
if( ! function_exists( ' ppw_clients_frontend_form_shortcode ') ) {
	function ppw_clients_frontend_form_shortcode( $atts = array() ) {
		// Get CMB2 metabox object
		$cmb = ppw_get_clients_frontend_form();
		// Get $cmb object_types
		$post_types = $cmb->prop( 'object_types' );
		// Current user
		$user_id = get_current_user_id();
		// Parse attributes
		$atts = shortcode_atts( array(
			'post_author' => $user_id ? $user_id : 1, // Current user, or admin
			'post_status' => 'publish',
			'post_type'   => reset( $post_types ), // Only use first object_type in array
		), $atts, 'ppw_client_form' );
		/*
		 * Let's add these attributes as hidden fields to our cmb form
		 * so that they will be passed through to our form submission
		 */
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
		$output .= cmb2_get_metabox_form( $cmb, 'fake-oject-id', array( 'save_button' => __( 'Submit Post', PPW_TEXTDOMAIN ) ) );
		return $output;
	}
	add_shortcode( 'ppw_client_form', 'ppw_clients_frontend_form_shortcode' );
} // end ppw_clients_frontend_form_shortcode

/**
 * Save the form
 *
 * @return void
 */
if( ! function_exists( ' wds_handle_frontend_new_post_form_submission ') ) {
	function wds_handle_frontend_new_post_form_submission() {
		// If no form submission, bail
		if ( empty( $_POST ) || ! isset( $_POST['submit-cmb'], $_POST['object_id'] ) ) {
			return false;
		}

		// Get CMB2 metabox object
		$cmb = ppw_get_clients_frontend_form();
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
		if ( empty( $_POST[PPW_PREFIX . 'submitted_clients_name'] ) ) {
			return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Client Name Required' ) ) );
		}

		// And that the title is not the default title
		if ( $cmb->get_field( PPW_PREFIX . 'submitted_clients_name' )->default() == $_POST[PPW_PREFIX . 'submitted_clients_name'] ) {
			return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Please enter the client name.' ) ) );
		}

		/**
		 * Fetch sanitized values
		 */
		$sanitized_values = $cmb->get_sanitized_values( $_POST );

		// Set our post data arguments
		$post_data['post_title']   = $sanitized_values[PPW_PREFIX . 'submitted_clients_name'];
		unset( $sanitized_values[PPW_PREFIX . 'submitted_clients_name'] );

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

		/*
		 * Redirect back to the form page with a query variable with the new post ID.
		 * This will help double-submissions with browser refreshes
		 */
		wp_redirect( esc_url_raw( add_query_arg( 'post_submitted', $new_submission_id ) ) );
		exit;
	}
	add_action( 'cmb2_after_init', 'wds_handle_frontend_new_post_form_submission' );
} // end wds_handle_frontend_new_post_form_submission