<?php
/**
 * Custom Fields Library
 *
 * @package    PPW
 * @subpackage PPW/Admin/Helpers
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Custom_Fields' ) ) {
	class PPW_Custom_Fields {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			if ( file_exists(  PPW_PLUGIN_DIR . 'admin/helpers/cmb/init.php' ) ) {
				require_once( PPW_PLUGIN_DIR . 'admin/helpers/cmb/init.php' );
			}
			if ( file_exists(  PPW_PLUGIN_DIR . 'admin/helpers/custom-fields/ppw-multiselect.php' ) ) {
				require_once PPW_PLUGIN_DIR . 'admin/helpers/custom-fields/ppw-multiselect.php';
			}
			if ( file_exists(  PPW_PLUGIN_DIR . 'admin/helpers/custom-fields/ppw-search-select.php' ) ) {
				require_once PPW_PLUGIN_DIR . 'admin/helpers/custom-fields/ppw-search-select.php';
			}
		} // end __construct
	}
} // end PPW_Custom_Fields	