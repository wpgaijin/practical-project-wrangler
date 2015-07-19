<?php
/**
 * Single Templates
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Single_Templates' ) ) {
	class PPW_Single_Templates {
		/**
		 * Initialize the class
		 *
		 * @since    0.0.1
		 * @uses     add_filter() wp-includes/plugin.php
		 */
		public function __construct() {
			add_filter( 'single_template', array( $this, 'projects_single' ) );
		} // end __construct
		/**
		 * Projects Single
		 *
		 * @since      0.0.1
		 * @global     obj $post the post object
		 * @param      $single_tamplate
		 * @return     $single_tamplate 
		 */
		public function projects_single( $single_template ) {
			global $post;
			if( $post->post_type == 'ppw_projects' ) {
				$single_template = PPW_PLUGIN_DIR . 'includes/views/single-ppw-projects.php';
			}
			return $single_template;
		} // end projects_single
	}
} // end PPW_Single_Templates