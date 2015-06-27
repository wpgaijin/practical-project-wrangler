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
			$this->shortcode_id = PPW_PREFIX . '_display_project';
			add_shortcode( PPW_PREFIX . '_projects', array( $this, 'shortcode' ) );
		} // end __construct

		/**
		 * The Shortcode
		 *
		 * @since      0.0.1
		 * @param      array $atts the shrtcode attributes
		 * @return     mixed $output the shoutcode output
		 */
		public function shortcode() {
			$this->check_for_shortcode();
			$options = get_option( PPW_PREFIX . '_options' );
			$display = $options[PPW_PREFIX . '_options_project_display'];
			$display_amount = $options[PPW_PREFIX . '_options_project_display_amount'];
			$excerpt_length = $options[PPW_PREFIX . '_options_project_excertp_length'];
			ob_start(); ?>
			<div class="ppw__project-display default-<?php echo $display; ?>">
				<?php include PPW_PLUGIN_DIR . 'includes/shortcodes/views/ppw-project-listing.php'; ?>
			</div>
			<?php
			$list = 'registered';
			// enqueue script if registered
			if( wp_script_is( PPW_PREFIX . '-hide-comments', $list ) ) {
				// script that hides the comments area
				wp_enqueue_script( PPW_PREFIX . '-hide-comments' );
			} else {
				echo PPW_PREFIX . '-hide-comments';
			}
			return ob_get_clean();
		}

		/**
		 * Check for shortcode
		 *
		 * Check if the shortcode in the page content
		 *
		 * @since      0.0.1
		 * @return     [type] [description]
		 */
		public function check_for_shortcode() {
			global $post;
			$subject = get_the_content($post->ID);
			if( has_shortcode( $subject, $this->shortcode_id ) ) {
				$post->comment_status = 'closed';
				$post->ping_status = 'closed';
			}
		} // end check_for_shortcode

	}
} // end PPW_Shortcode_Display_Projects