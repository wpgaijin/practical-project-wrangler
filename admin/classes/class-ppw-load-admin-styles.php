<?php
/**
 * Load Admin Styles
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Admin_Load_Styles' ) ) {
	class PPW_Admin_Load_Styles {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'meta_box_styles' ) );
		} // end __construct

		/**
		 * Meta box style
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function meta_box_styles( $hook_suffix ) {
			global $typenow,
				   $pagenow;
			if( $typenow == PPW_PREFIX . '_clients' || $typenow == PPW_PREFIX . '_tasks' || $typenow == PPW_PREFIX . '_projects' ) {
				if(  $hook_suffix == 'post.php' ||  $hook_suffix == 'post-new.php' || $hook_suffix == 'edit.php'  ) {
					wp_enqueue_style( PPW_PREFIX . '-meta-boxes' , PPW_PLUGIN_URL . 'admin/css/style.min.css', array(), PPW_VERSION, 'all' );
				}
			}
			if( isset( $_GET['page'] ) ) {
				if( ( $pagenow == 'edit.php' ) && ( $_GET['page'] == PPW_PREFIX . '_options' ) ) {
					wp_enqueue_style( PPW_PREFIX . '-meta-boxes' , PPW_PLUGIN_URL . 'admin/css/style.min.css', array(), PPW_VERSION, 'all' );
				}
			}
		} // end meta_box_styles

	}
} // end PPW_Admin_Load_Styles