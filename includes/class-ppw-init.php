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
			$this->load_styles();
			$this->load_scripts();
			$this->shortcodes();
			$this->comment_editor();
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
		 * Load Styles
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function load_styles() {
			$ppw_load_styles = new PPW_Load_Styles();
		} // end load_styles

		/**
		 * Load Scripts
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function load_scripts() {
			$ppw_load_scripts = new PPW_Load_Scripts();
		} // end load_scripts

		/**
		 * Add shortcodes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function shortcodes() {
			$ppw_shortcode_client_form      = new PPW_Shortcode_Client_Form();
			$ppw_shortcode_project_form     = new PPW_Shortcode_Project_Form();
			$ppw_shortcode_task_form        = new PPW_Shortcode_Task_Form();
			$ppw_shortcode_display_projects = new PPW_Shortcode_Display_Projects();
		} // end shortcodes

		/**
		 * Add comment editor
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function comment_editor() {
			$ppw_comment_editor = new PPW_Comment_Editor();
		} // end comment_editor

	}
} // end PPW_Init