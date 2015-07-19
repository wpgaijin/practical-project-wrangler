<?php
/**
 * Users Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Users' ) ) {
	class PPW_Meta_Boxes_Users {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'users_avatar_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'users_client_meta_boxes' ) );
		} // end __construct

		/**
		 * Users avatar meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function users_avatar_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_users_avatar',
				'title'        => __( 'User Avatar', PPW_TEXTDOMAIN ),
				'object_types' => array( 'user' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => true
			) );
			$fields->add_field( array(
				'name'       => 'Image',
			    'id'         => PPW_PREFIX . '_avatar_image',
			    'type'       => 'file'
			) );
		} // end users_avatar_meta_boxes

		/**
		 * Users avatar meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function users_client_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_users_client',
				'title'        => __( 'User Avatar', PPW_TEXTDOMAIN ),
				'object_types' => array( 'user' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => true
			) );
			$fields->add_field( array(
				'name'             => __( 'Assign Client', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_users_client',
				'type'             => 'select',
				'show_option_none' => true,
				'default'          => ' ',
				'options'          => ppw_get_active_clients(),
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
		} // end users_client_meta_boxes

	}
} // end PPW_Meta_Boxes_Users