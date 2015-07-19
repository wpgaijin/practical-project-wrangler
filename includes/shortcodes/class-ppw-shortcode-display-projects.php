<?php
/**
 * Summary
 *
 * Description
 *
 * @package    PPW
 * @subpackage PPW/Includes/Shortcodes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Shortcode_Display_Projects' ) ) {
	class PPW_Shortcode_Display_Projects {

		/**
		 * Shortcode ID
		 *
		 * @since  0.0.1
		 * @var    string $shortcode_id the shortcode ID
		 */
		protected $shortcode_id;

		/**
		 * Initialize the class
		 *
		 * @since [version]
		 */
		public function __construct() {
			$this->shortcode_id = PPW_PREFIX . '_projects';
			add_shortcode( $this->shortcode_id, array( $this, 'shortcode' ) );
		} // end __construct

		/**
		 * The Shortcode
		 *
		 * @since      0.0.1
		 * @param      array $atts the shrtcode attributes
		 * @return     mixed $output the shoutcode output
		 */
		public function shortcode() {
			// Close the comments
			ppw_close_comments( $this->shortcode_id );
			// Enqueue the comments off JavaScript
			ppw_enqueue_if_registered( PPW_PREFIX . '-comments-off' );
			// Enqueue the projects search filter JavaScript
			ppw_enqueue_if_registered( PPW_PREFIX . '-project-search' );
			// return the projects list template
			return ppw_get_plugin_part( 'includes/views/template-ppw-project-list' );
		}
	}
} // end PPW_Shortcode_Display_Projects