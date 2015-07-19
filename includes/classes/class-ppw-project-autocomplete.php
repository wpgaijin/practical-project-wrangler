<?php
/**
 * Project Autocomplete
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Project_Autocomplete' ) ) {
  class PPW_Project_Autocomplete {
    /**
     * Initialize the class
     *
     * @since    0.0.1
     * @uses     add_action() wp-includes/plugin.php
     */
    public function __construct() {
      add_action( 'wp_ajax_ppw_project_autocomplete', array( $this, 'autocomplete' ) );
      add_action( 'wp_ajax_nopriv_ppw_project_autocomplete', array( $this, 'autocomplete' ) );
    } // end __construct
    /**
     * Autocomplete
     *
     * Autocomplete the search field
     *
     * @since      0.0.1
     * @uses       add_action() wp-includes/pluggable.php
     * @uses       get_posts() wp-includes/post.php
     * @global     array $post the wordpress posts array
     * @return     void
     */
    public function autocomplete() {
      global $post;
      if( wp_verify_nonce( $_POST['ppw_ac_nonce'], 'ppw_project_ac_nonce') ) {
        $search_query = trim( $_POST['project_title'] );
        if( $search_query ) {
          $found_projects = get_posts( array(
            'posts_per_page' => 9999,
            'post_type'      => 'ppw_projects',
            's'              => $search_query,
            'no_found_rows'  => true
          ) );
          if( $found_projects ) {
            $project_list = '<ul>';
            foreach( $found_projects as $project ) {
              $project_list .= '<li><a href="#" data-project="' . $project->post_title . '">' . $project->post_title . '</a></li>';
            }
            $project_list .= '</ul>';
            echo json_encode( array( 'ac_results' => $project_list, 'ac_id' => 'found' ) );
          } else {
            echo json_encode( array( 'ac_msg' => __('No Projects Found', PPW_TEXTDOMAIN ), 'ac_results' => 'none', 'ac_id' => 'fail' ) );
          }
        }
      }
      die();
    } // end autocomplete
  }
} // end PPW_Project_Autocomplete