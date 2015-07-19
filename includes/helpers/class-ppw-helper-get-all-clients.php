<?php
/**
 * Get All Clients
 *
 * List all client names and ID's
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_All_Clients' ) ) {
  class PPW_Helper_Get_All_Clients {
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {}
    /**
     * List the clients
     *
     * @since      0.0.1
     * @uses       get_posts() wp-includes/post.php
     * @return     array $clients the clients
     */
    public function get_all_clients() {
      $args = array(
          'post_type'         => 'ppw_clients',
          'posts_per_page'    => '9999',
          'no_found_rows'     => true
      );
      $clients = array();
      $entries = get_posts( $args );
      foreach( $entries as $entry ) {
        $clients[$entry->ID] = $entry->post_title;
      }
      return $clients;
    } // end list_the_clients
  }
} // end PPW_Helper_Get_All_Clients
/**
 * Get Clients template function
 *
 * @since      0.0.1
 * @return     PPW_Helper_Get_All_Clients())
 */
if( ! function_exists( 'ppw_get_all_clients') ) {
  function ppw_get_all_clients() {
    $ppw_helper_get_all_clients = new PPW_Helper_Get_All_Clients();
    return $ppw_helper_get_all_clients->get_all_clients();
  }
} // end ppw_get_all_clients