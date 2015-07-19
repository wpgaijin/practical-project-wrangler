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
		 * @since      0.0.1
		 * @return     void
		 */
		public function install() {
			$ppw_register_post_types_install = new PPW_Register_Post_Types();
			$ppw_register_taxomonies = new PPW_Register_Taxonomies();
			$ppw_add_user_roles = new PPW_Add_Roles();
			flush_rewrite_rules();
			$this->add_options();
			add_image_size( 70, 70, 'avatar');
		} // end __construct

		/**
		 * Add Options
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function add_options() {
			$ppw_options = PPW_PREFIX . '_options';
			$ppw_check_option = get_option( $ppw_options );
			$option = array(
				PPW_PREFIX . '_options_project_display'        => 'cards',
				PPW_PREFIX . '_options_project_display_amount' => '10',
				PPW_PREFIX . '_options_project_excertp_length' => '10'
			);
			if ( !isset( $ppw_check_option ) ) {
			    add_option( $ppw_options, $option, null, 'no' );
			} else {
				update_option( $ppw_options, $option, 'no' );
			}
		} // end add_options
	}
} // end PPW_Install
$install = new PPW_Install();
register_activation_hook( PPW_PLUGIN_FILE, array( $install, 'install' ) );