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
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {}
    /**
     * Get the projects
     *
     * @since      0.0.1
     * @uses       wp_parse_args() wp-includes/functions.php
     * @uses       get_posts() wp-includes/post.php
     * @return     $project_list the projects name and ID
     */
    public function get_projects() {
      global $query_args;
      $args = wp_parse_args( $query_args, array(
            'post_type'      => 'ppw_projects',
            'posts_per_page' => '9999',
            'no_found_rows'  => true,
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
/**
 * Get Projects template function
 *
 * @since      0.0.1
 * @return     PPW_Helper_Get_Projects::init() the projects name and ID
 */
if( ! function_exists( 'ppw_get_projects') ) {
  function ppw_get_projects() {
    $ppw_get_projects = new PPW_Helper_Get_Projects();
    return $ppw_get_projects->get_projects();
  }
} // end ppw_get_projects