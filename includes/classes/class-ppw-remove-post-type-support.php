<?php
/**
 * Remove post type support
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_remove_Post_Type_Support' ) ) {
	class PPW_remove_Post_Type_Support {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			remove_post_type_support( 'ppw_projects', 'trackbacks' );
			remove_post_type_support( 'ppw_tasks', 'trackbacks' );
			remove_post_type_support( 'ppw_clients', 'trackbacks' );
		} // end __construct

	}
} // end PPW_remove_Post_Type_Support