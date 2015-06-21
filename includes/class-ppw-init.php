<?php
/**
 * Public Init
 *
 * Initialize all public functionality
 *
 * @package    PPW
 * @subpackage PPW/Includes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Init' ) ) {
	class PPW_Init {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'register_post_types' ) );
			add_action( 'init', array( $this, 'register_taxomonies' ) );
			$this->add_user_roles();
			//$this->include_shortcodes();
		} // end __construct

		/**
		 * Register Post Types
		 *
		 * @since      0.0.1
		 * @see        PPW_Register_Post_Types
		 * @return     void
		 */
		public function register_post_types() {
			$ppw_register_post_types = new PPW_Register_Post_Types();
		} // end register_post_types

		/**
		 * Register Taxonomies
		 *
		 * @since      0.0.1
		 * @see        PPW_Helper_Register_Taxonomies
		 * @return     void
		 */
		public function register_taxomonies() {
			$ppw_register_taxomonies = new PPW_Register_Taxonomies();
		} // end register_taxomonies

		/**
		 * Add user roles
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function add_user_roles() {
			$ppw_add_user_roles = new PPW_Add_Roles();
		} // end add_user_roles

		/**
		 * Include shorcodes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function include_shortcodes() {
			$ppw_shortcode_client_form = new PPW_Shortcode_Client_Form();
		} // end add_user_roles

	}
} // end PPW_Init