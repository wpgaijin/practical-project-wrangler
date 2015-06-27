<?php
/**
 * Get Projects
 *
 * Get a list of the projects name and ID's
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Helper_Get_Projects' ) ) {
	class PPW_Helper_Get_Projects {

		/**
		 * Get the projects
		 *
		 * @since      0.0.1	
		 * @return     $project_list the projects name and ID
		 */
		public static function init() {
			global $query_args;
			$args = wp_parse_args( $query_args, array(
		        'post_type'   => 'ppw_projects'
		    ) );
		    $projects = get_posts( $args );
		    $projects_list = array();
		    if ( $projects ) {
		        foreach ( $projects as $project ) {
		          $projects_list[ $project->ID ] = $project->post_title;
		        }
		    }
    		return $projects_list;
		} // end init

	}
} // end PPW_Helper_Get_Projects