<?php
/**
 * Activity Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Activity' ) ) {
	class PPW_Meta_Boxes_Activity {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'activity_ststus_meta_boxes' ) );
		} // end __construct

		/**
		 * Activity status meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function activity_ststus_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'activity_status',
				'title'        => __( 'Activity Status', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_activity' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'    => __( 'The Status', PPW_TEXTDOMAIN ),
				'id'      => PPW_PREFIX . 'activity_the_status',
				'type'    => 'select',
				'default' => 'public',
				'options' => array(
					'public'  => __( 'Public', PPW_TEXTDOMAIN ),
					'private' => __( 'Private', PPW_TEXTDOMAIN ),
				)
			) );
		} // end activity_ststus_meta_boxes
	}
} // end PPW_Meta_Boxes_Activity