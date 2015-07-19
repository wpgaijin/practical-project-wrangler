<?php
/**
 * Client form shortcode
 *
 * @package    PPW
 * @subpackage PPW/Includes/Shortcodes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Shortcode_Client_Form' ) ) {
	class PPW_Shortcode_Client_Form {
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
			$this->form_id           = PPW_PREFIX . '_clients_frontend_form';
			$this->fake_id           = PPW_PREFIX . '_clients_fake_id';
			$this->title_id          = PPW_PREFIX . '_clients_name';
			$this->submit_name_attr  = PPW_PREFIX . '_clients_submit';
			$this->shortcode_id      = PPW_PREFIX . '_client_form';
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
				'object_types' => array( 'ppw_clients' ),
				'hookup'       => false,
				'save_fields'  => false,
			) );
			$fields->add_field( array(
				'name'        => __( 'Client Name', PPW_TEXTDOMAIN ),
				'id'          => $this->title_id,
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_address',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'City', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_city',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'             => __( 'State', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_clients_state',
				'type'             => 'search',
				'show_option_none' => true,
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
				'id'          => PPW_PREFIX . '_clients_zip',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_phone',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_email',
				'type'        => 'text_email',
			) );
			$fields->add_field( array(
				'name'        => __( 'Website URL', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_url',
				'type'        => 'text_url',
			) );
			$fields->add_field( array(
				'name'       => __( 'Billing Addess is Different', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_clients_billing_different',
				'type'       => 'checkbox'
			) );
			$fields->add_field( array(
				'name'        => __( 'Company Name', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_company_name',
				'type'        => 'text',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_address',
				'type'        => 'text',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'City', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_city',
				'type'        => 'text',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'             => __( 'State', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_clients_billing_state',
				'type'             => 'search',
				'show_option_none' => true,
				'row_classes' => 'ppw-hide',
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
				'id'          => PPW_PREFIX . '_clients_billing_zip',
				'type'        => 'text',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_phone',
				'type'        => 'text',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_email',
				'type'        => 'text_email',
				'row_classes' => 'ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'Conact Name', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_name',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_phone',
				'type'        => 'text',
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_email',
				'type'        => 'text_email',
			) );
			$group_field_id = $fields->add_field( array(
				'id'          => PPW_PREFIX . '_clients_additional_contacts_group',
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
				'id'          => PPW_PREFIX . '_clients_additional_contacts_name',
				'type'        => 'text',
			) );
			$fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_additional_contacts_phone',
				'type'        => 'text',
			) );
			$fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_additional_contacts_email',
				'type'        => 'text_email',
			) );
			$fields->add_field( array(
				'name'        => __( 'Information', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_add_info',
				'type'        => 'wysiwyg',
				'options'    => array(
						'wpautop'       => true,
						'media_buttons' => false,
						'textarea_rows' => get_option('default_post_edit_rows', 10),
						'teeny'         => true,
						'quicktags'     => false
					)
			) );
			$fields->add_field( array(
				'name'       => __( 'Client is Active', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_clients_status',
				'type'       => 'checkbox',
				'default'    => 1,
				'show_names' => false,
				'attributes' => array(
			        'hidden' => 'hidden',
			    ),
			) );
			$fields->add_field( array(
				'name'       => __( 'Client Number', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_clients_number',
				'type'       => 'text_small',
				'default'    => $this->count_posts(),
				'show_names' => false,
				'attributes' => array(
			        'hidden' => 'hidden',
			    ),
			) );
		} // end register_form_fields

		/**
		 * Count Posts
		 *
		 * Count the posts for custom ID
		 *
		 * @since      0.0.1
		 * @return     int the next post number ID
		 */
		public function count_posts() {
			global $post;
			$count_posts = wp_count_posts('ppw_clients');
			$published = $count_posts->publish+1;
			return $published;
		} // end count_posts

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
				return $cmb->prop( 'submission_error', new WP_Error( 'post_data_missing', __( 'Client Name Required' ) ) );
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
				if( is_array( $value ) ) {
					if( !empty( array_filter( $value ) ) ) {
						update_post_meta( $new_submission_id, $key, $value );
					}
				} else {
					update_post_meta( $new_submission_id, $key, $value );
				}
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
			ppw_enqueue_if_registered( PPW_PREFIX . '-clients-form' );
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
				'save_button' => __( 'Submit Post', PPW_TEXTDOMAIN )
			);
			// The HTML output
			$output .= cmb2_get_metabox_form( $cmb, $this->fake_id, $form_args );
			return $output;
		} // end shortcode
	}
} // end PPW_Shortcode_Client_Form