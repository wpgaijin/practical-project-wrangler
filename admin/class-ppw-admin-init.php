<?php
/**
 * Admin Init
 *
 * @package    PPW
 * @subpackage PPW/Admin
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Admin_Init' ) ) {
	class PPW_Admin_Init {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->load_admin_styles();
			$this->load_admin_scripts();
			$this->custom_fields();
			$this->custom_meta_boxes();
		} // end __construct

		/**
		 * Load Admin Styles
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function load_admin_styles() {
			$ppw_load_admin_styles = new PPW_Admin_Load_Styles();
		} // end load_admin_styles

		/**
		 * Load Admin Scripts
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function load_admin_scripts() {
			$ppw_load_admin_scripts = new PPW_Admin_Load_Scripts();
		} // end load_admin_scripts

		/**
		 * Custom Fields Library
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function custom_fields() {
			$ppw_custom_fields = new PPW_Custom_Fields();
		} // end custom_fields

		/**
		 * Meta Boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		protected function custom_meta_boxes() {
			$ppw_clients_meta_boxes = new PPW_Clients_Meta_Boxes();
			$ppw_projects_meta_boxes = new PPW_Projects_Meta_Boxes();
			$ppw_tasks_meta_boxes = new PPW_Tasks_Meta_Boxes();
		} // end custom_meta_boxes

	}
} // end PPW_Admin_Init