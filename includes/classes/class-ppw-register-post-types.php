<?php
/**
 * Register Post Types for the plugin
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 * @see        PPW_Helper_Register_Post_Type
 */

if( !class_exists( 'PPW_Register_Post_Types' ) ) {
	class PPW_Register_Post_Types {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->register_projects_post_type();
		} // end __construct

		/**
		 * Register projects post type
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function register_projects_post_type() {
			$args = array(
				'rewrite' => array( 'slug'=> 'projects' )
			);
			$ppw_register_projects_post_type = new PPW_Helper_Register_Post_Type( 'ppw_projects', 'Project', 'Projects', array(), $args );
		} // end register_projects_post_type

	}
} // end PPW_Register_Post_Types