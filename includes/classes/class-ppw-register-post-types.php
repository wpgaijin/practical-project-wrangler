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
		 * @see        PPW_Helper_Register_Post_Type
		 * @return     void
		 */
		public function register_projects_post_type() {
			$args = array(
				'description'     => 'The Projects post type',
				'menu_icon'       => 'dashicons-analytics',
				'capability_type' => 'projects',
				'rewrite'         => array( 'slug'=> 'projects' )
			);
			$ppw_register_projects_post_type = new PPW_Helper_Register_Post_Type( 'ppw_projects', 'Project', 'Projects', array(), $args );
		} // end register_projects_post_type

		/**
		 * Register clients post type
		 *
		 * @since      0.0.1
		 * @see        PPW_Helper_Register_Post_Type
		 * @return     void
		 */
		public function register_clients_post_type() {
			$args = array(
				'description'     => 'The Clients post type',
				'menu_icon'       => 'dashicons-groups',
				'capability_type' => 'clients',
				'rewrite'         => array( 'slug'=> 'clients' )
			);
			$ppw_register_clients_post_type = new PPW_Helper_Register_Post_Type( 'ppw_clients', 'Client', 'Clients', array(), $args );
			
		} // end register_clients_post_type

	}
} // end PPW_Register_Post_Types