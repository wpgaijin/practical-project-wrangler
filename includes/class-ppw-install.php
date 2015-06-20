<?php
/**
 * Install
 *
 * @package    PPW
 * @subpackage PPW/Includes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Install' ) ) {
	class PPW_Install {

		/**
		 * Install activation
		 *
		 * @since 0.0.1
		 */
		public function install() {
			$ppw_register_post_types_install = new PPW_Register_Post_Types();
			$ppw_register_taxomonies = new PPW_Register_Taxonomies();
			$ppw_add_user_roles = new PPW_Add_Roles();
			flush_rewrite_rules();
		} // end __construct
	}
} // end PPW_Install
$install = new PPW_Install();
register_activation_hook( PPW_PLUGIN_FILE, array( $install, 'install' ) );