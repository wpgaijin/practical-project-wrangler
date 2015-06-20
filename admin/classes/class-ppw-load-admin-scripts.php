<?php
/**
 * Load Admin Scripts
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Admin_Load_Scripts' ) ) {
	class PPW_Admin_Load_Scripts {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'meta_box_scripts' ) );
		} // end __construct

		/**
		 * Clients meta box scripts
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function meta_box_scripts( $hook_suffix ) {
			global $typenow;
			if( $typenow == 'ppw_clients' ) {
				if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
					wp_register_script( PPW_TEXTDOMAIN . '-clients-meta-boxes-scripts', PPW_PLUGIN_URL . 'admin/js/admin-clients-meta-boxes.js', array( 'jquery' ), PPW_VERSION, true );
					wp_enqueue_script( PPW_TEXTDOMAIN . '-clients-meta-boxes-scripts' );
				}
			}
			if( $typenow == 'ppw_projects' ) {
				if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
					wp_register_script( PPW_TEXTDOMAIN . '-clients-meta-boxes-scripts', PPW_PLUGIN_URL . 'admin/js/admin-projects-meta-boxes.js', array( 'jquery' ), PPW_VERSION, true );
					wp_enqueue_script( PPW_TEXTDOMAIN . '-clients-meta-boxes-scripts' );
				}
			}
		} // end meta_box_scripts

	}
} // end PPW_Admin_Load_Scripts