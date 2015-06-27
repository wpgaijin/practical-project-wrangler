<?php
/**
 * Messages Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Messages' ) ) {
	class PPW_Meta_Boxes_Messages {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'messages_projects_meta_boxes' ) );
			add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
			add_action( 'post_submitbox_misc_actions', array( $this, 'move_author_meta_box' ) );
		} // end __construct

		/**
		 * Taske projects meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function messages_projects_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_messages_projects',
				'title'        => __( 'Project', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_message' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'             => __( 'Select Project:', PPW_TEXTDOMAIN ),
				'desc'             => __( 'This field is required', PPW_TEXTDOMAIN ),
			    'id'               => PPW_PREFIX . '_messages_project',
			    'type'             => 'select',
			    'show_option_none' => true,
			    'options'          => PPW_Helper_Get_Projects::init(),
			    'attributes'       => array(
			        'required' => 'required',
			    ),
			) );
		} // end messages_projects_meta_boxes

		/**
		 * Remove meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function remove_meta_boxes() {
			remove_meta_box( 'commentstatusdiv', 'ppw_message', 'side' );
			remove_meta_box( 'authordiv', 'ppw_message', 'normal' );
		} // end remove_meta_boxes

		/**
		 * Move Author box
		 *
		 * Move the author box into the publish meta box
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function move_author_meta_box() {
			global $post_ID;
		    $post = get_post( $post_ID );
		    $screen = get_current_screen();
		    if ( 'ppw_message' == $screen->post_type ){
		    	echo '<div class="misc-pub-section">Author: ';
		    	post_author_meta_box( $post );
		    	echo '</div>';
			}
		} // end move_author_meta_box
	}
} // end PPW_Meta_Boxes_Messages