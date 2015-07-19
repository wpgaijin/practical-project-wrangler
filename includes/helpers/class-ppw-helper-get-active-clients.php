<?php
/**
 * Get Active Clients
 *
 * List all active client names and ID's
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Active_Clients' ) ) {
  class PPW_Helper_Get_Active_Clients {
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
    public function get_active_clients() {
      $args = array(
          'post_type'         => 'ppw_clients',
          'posts_per_page'    => '9999',
          'meta_key'          => PPW_PREFIX . '_clients_status',
          'meta_value'        => 'on',
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
} // end PPW_Helper_Get_Active_Clients
/**
 * Get Clients template function
 *
 * @since      0.0.1
 * @return     PPW_Helper_Get_Active_Clients()
 */
if( ! function_exists( 'ppw_get_active_clients') ) {
  function ppw_get_active_clients() {
    $ppw_helper_get_active_clients =  new PPW_Helper_Get_Active_Clients();
    return $ppw_helper_get_active_clients->get_active_clients();
  }
} // end ppw_get_active_clients