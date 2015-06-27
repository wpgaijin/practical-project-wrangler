<?php
/**
 * Load Styles
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Load_Styles' ) ) {
	class PPW_Load_Styles {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		} // end __construct

		/**
		 * Meta box style
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function styles( $hook_suffix ) {
			wp_enqueue_style( PPW_PREFIX . '-styles' , PPW_PLUGIN_URL . 'includes/css/style.min.css', array(), PPW_VERSION, 'all' );
		} // end styles

	}
} // end PPW_Load_Styles