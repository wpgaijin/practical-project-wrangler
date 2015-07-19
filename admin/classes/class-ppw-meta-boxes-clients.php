<?php
/**
 * Clients Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Clients' ) ) {
	class PPW_Meta_Boxes_Clients {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			//add_action( 'cmb2_init', array( $this, 'clients_general_meta_boxes' ) );
			//add_action( 'cmb2_init', array( $this, 'clients_billing_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'clients_primary_contact_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'clients_additional_contacts_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'clients_additional_information_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'clients_id_number_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'clients_status_meta_boxes' ) );
		} // end __construct

		/**
		 * Client general meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_general_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_general_info',
				'title'        => __( 'General Information', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'        => __( 'Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_address',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'City', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_city',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'             => __( 'State', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_clients_state',
				'type'             => 'select',
				'row_classes'      => 'ppw-third-field',
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
				'id'          => PPW_PREFIX . '_clients_zip',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_phone',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_email',
				'type'        => 'text_email',
				'row_classes' => 'ppw-third-field'
			) );
			$fields->add_field( array(
				'name'        => __( 'Website URL', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_url',
				'type'        => 'text_url',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
		} // end clients_general_meta_boxes

		/**
		 * Client billing meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_billing_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_billing_info',
				'title'        => __( 'Billing Information', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
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
				'row_classes' => 'ppw-full-field ppw-hide'
			) );
			$fields->add_field( array(
				'name'        => __( 'Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_address',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-hide ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'City', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_city',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-hide ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'             => __( 'State', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_clients_billing_state',
				'type'             => 'select',
				'row_classes'      => 'ppw-third-field ppw-hide',
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
				'id'          => PPW_PREFIX . '_clients_billing_zip',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-hide ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_phone',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-hide ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_billing_email',
				'type'        => 'text_email',
				'row_classes' => 'ppw-third-field ppw-hide'
			) );
		} // end clients_billing_meta_boxes

		/**
		 * Client primary contact meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_primary_contact_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_primary_contact',
				'title'        => __( 'Primary Contact', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'        => __( 'Contact Name', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_name',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_phone',
				'type'        => 'text',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$fields->add_field( array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_primary_contact_email',
				'type'        => 'text_email',
				'row_classes' => 'ppw-third-field'
			) );
		} // end clients_primary_contact_meta_boxes

		/**
		 * Client additional contacts meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_additional_contacts_meta_boxes() {
			$group_fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_additional_contacts',
				'title'        => __( 'Additional Contacts', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'cmb_styles'   => false
			) );

			$group_field_id = $group_fields->add_field( array(
				'id'          => PPW_PREFIX . '_clients_additional_contacts_group',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Contact {#}', PPW_TEXTDOMAIN ),
					'add_button'    => __( 'Add Contact', PPW_TEXTDOMAIN ),
					'remove_button' => __( 'Remove Contact', PPW_TEXTDOMAIN ),
					'sortable'      => false,
				),
			) );
			$group_fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Conact Name', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_additional_contacts_name',
				'type'        => 'text',
				//'default'     => ' ',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$group_fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Phone Number', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_additional_contacts_phone',
				'type'        => 'text',
				//'default'     => ' ',
				'row_classes' => 'ppw-third-field ppw-padding-right'
			) );
			$group_fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Email Address', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_additional_contacts_email',
				'type'        => 'text_email',
				//'default'     => ' ',
				'row_classes' => 'ppw-third-field'
			) );
		} // end clients_additional_contacts_meta_boxes

		/**
		 * Client additional inforamtion
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_additional_information_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_additional_information',
				'title'        => __( 'Additional Information', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'        => __( 'Information', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_clients_add_info',
				'type'        => 'wysiwyg'
			) );
		} // end clients_additional_information_meta_boxes

		/**
		 * Client additional inforamtion
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_id_number_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_id_numbers',
				'title'        => __( 'Client Number ID', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'side',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Client Number', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_clients_number',
				'type'       => 'text_small',
				'default'    => array( $this, 'count_posts' )
			) );
		} // end clients_id_number_meta_boxes

		/**
		 * Client additional inforamtion
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function clients_status_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_clients_status',
				'title'        => __( 'Client Status', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_clients' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Client is Active', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_clients_status',
				'type'       => 'checkbox',
				'default'    => 1
			) );
		} // end clients_status_meta_boxes

		/**
		 * Count Posts
		 *
		 * @since      0.0.1
		 * @return     int the post total +1
		 */
		public function count_posts() {
			global $post;
			$count_posts = wp_count_posts('ppw_clients');
			$project_number_id = get_post_meta( $post->ID, PPW_PREFIX . '_clients_number', true );
			if( !$project_number_id ) {
				$published = $count_posts->publish+1;
			} else {
				$published = $project_number_id;
			}
			return $published;
		} // end count_posts
	}
} // end PPW_Meta_Boxes_Clients