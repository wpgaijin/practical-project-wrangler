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
			$this->register_post_types();
		} // end __construct

		/**
		 * Register Post Types
		 *
		 * @since      0.0.1
		 * @see        PPW_Register_Post_Types
		 * @return     void
		 */
		protected function register_post_types() {
			$ppw_register_post_types = new PPW_Register_Post_Types();
		} // end register_post_types

	}
} // end PPW_Init