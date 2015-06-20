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
			global $typenow;
			if( $typenow == 'ppw_clients' || $typenow == 'ppw_tasks' || $typenow == 'ppw_projects' ) {
				if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
					wp_enqueue_style( PPW_TEXTDOMAIN . '-meta-boxes' , PPW_PLUGIN_URL . 'admin/css/admin-meta-boxes.css', array(), PPW_VERSION, 'all' );
				}
			}
		} // end meta_box_styles

	}
} // end PPW_Admin_Load_Styles