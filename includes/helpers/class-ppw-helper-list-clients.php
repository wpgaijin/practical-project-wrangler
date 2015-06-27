<?php
/**
 * List the clients
 *
 * List all active client names and ID's
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Helper_List_Clients' ) ) {
	class PPW_Helper_List_Clients {

		/**
		 * List the clients
		 *
		 * @since      0.0.1
		 * @return     array $clients the clients
		 */
		public static function init() {
			$args = array(
			    'post_type'         => 'ppw_clients',
			    'posts_per_page'    => '999',
			    'meta_key'          => PPW_PREFIX . '_clients_status',
				'meta_value'        => 'on'
			);
			$clients = array();
			$entries = get_posts( $args );
			foreach( $entries as $entry ) {
				$clients[$entry->ID] = $entry->post_title;
			}
			return $clients;

		} // end list_the_clients

	}
} // end PPW_Helper_List_Clients