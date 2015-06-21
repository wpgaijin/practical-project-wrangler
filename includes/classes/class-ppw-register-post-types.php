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
			$this->register_tasks_post_type();
			$this->register_clients_post_type();
			$this->register_activity_post_type();
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
				'supports'        => array( 'title', 'comments', 'author' ),
				'rewrite'         => array( 'slug'=> 'projects' )
			);
			$ppw_register_projects_post_type = new PPW_Helper_Register_Post_Type( 'ppw_projects', 'Project', 'Projects', array(), $args );
		} // end register_projects_post_type

		/**
		 * Register tasks post type
		 *
		 * @since      0.0.1
		 * @see        PPW_Helper_Register_Post_Type
		 * @return     void
		 */
		public function register_tasks_post_type() {
			$args = array(
				'description'     => 'The Tasks post type',
				'menu_icon'       => 'dashicons-hammer',
				'supports'        => array( 'title', 'comments', 'author' ),
				'rewrite'         => array( 'slug'=> 'tasks' )
			);
			$ppw_register_tasks_post_type = new PPW_Helper_Register_Post_Type( 'ppw_tasks', 'Task', 'Tasks', array(), $args );
			
		} // end register_clients_post_type

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
				'supports'        => array( 'title' ),
				'rewrite'         => array( 'slug'=> 'clients' )
			);
			$ppw_register_clients_post_type = new PPW_Helper_Register_Post_Type( 'ppw_clients', 'Client', 'Clients', array(), $args );
			
		} // end register_clients_post_type

		/**
		 * Register activity post type
		 *
		 * @since      0.0.1
		 * @see        PPW_Helper_Register_Post_Type
		 * @return     void
		 */
		public function register_activity_post_type() {
			$args = array(
				'description'     => 'The activity log',
				'menu_icon'       => 'dashicons-index-card',
				'supports'        => array( 'title', 'editor' ),
				'rewrite'         => array( 'slug'=> 'activity' )
			);
			$ppw_register_activity_post_type = new PPW_Helper_Register_Post_Type( 'ppw_activity', 'Acivity', 'Activity', array(), $args );
			
		} // end register_activity_post_type

	}
} // end PPW_Register_Post_Types