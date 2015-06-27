<?php
/**
 * Load Scripts
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Load_Scripts' ) ) {
	class PPW_Load_Scripts {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
		} // end __construct

		/**
		 * Load general sscripts
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function scripts() {
			wp_register_script( PPW_PREFIX . '-hide-comments', PPW_PLUGIN_URL . 'includes/js/ppw-comments-off.js', array( 'jquery' ), PPW_VERSION );
			wp_register_script( PPW_PREFIX . '-clients-form', PPW_PLUGIN_URL . 'includes/js/ppw-client-form.min.js', array( 'jquery' ), PPW_VERSION, true );
		} // end scripts

	}
} // end PPW_Load_Scripts