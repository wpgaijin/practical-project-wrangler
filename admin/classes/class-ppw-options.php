<?php
/**
 * Plugin Options
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Options' ) ) {
	class PPW_Options {

		/**
		 * Option key and option page slug
		 *
		 * @since  0.0.1
		 * @var    string $key
		 */
		private $key;

		/**
		 * Options page meta box id
		 *
		 * @since  0.0.1
		 * @var    string $metabox_id
		 */
		private $metabox_id;

		/**
		 * Options page title
		 *
		 * @since  0.0.1
		 * @var    string $title
		 */
		protected $title;

		/**
		 * Options page hook
		 *
		 * @since  0.0.1
		 * @var    string $option_page
		 */
		protected $options_page = '';

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			$this->key = PPW_PREFIX . '_options';
			$this->metabox_id = PPW_PREFIX . 'option_metabox';
			$this->title = __( 'Pratical Project Wrangler', PPW_TEXTDOMAIN );
		} // end __construct

		/**
		 * Initiate the hooks
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function hooks() {
			add_action( 'admin_init', array( $this, 'init' ) );
			add_action( 'admin_menu', array( $this, 'add_options_page' ) );
			add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
		} // end hooks

		/**
		 * Register the settings
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function init() {
			register_setting( $this->key, $this->key );
		} // end init

		/**
		 * Add menu options page
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function add_options_page() {
			$this->options_page = add_submenu_page( 
				'edit.php?post_type=ppw_projects',
				$this->title, 
				__( 'Settings', PPW_TEXTDOMAIN ), 
				'manage_options', 
				$this->key, 
				array( $this, 'admin_page_display' ) 
			);
			add_action( "admin_print_styles-{$this->options_page}", array( 'CMB2_hookup', 'enqueue_cmb_css' ) );
		}

		/**
		 * Admin page markup
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function admin_page_display() {
			?>
			<div class="wrap cmb2-options-page <?php echo $this->key; ?>">
				<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
				<?php cmb2_metabox_form( $this->metabox_id, $this->key, array( 'cmb_styles' => false ) ); ?>
			</div>
			<?php
		}

		/**
		 * Add the meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		function add_options_page_metabox() {
			$fields = new_cmb2_box( array(
				'id'      => $this->metabox_id,
				'hookup'  => false,
				'show_on' => array(
					'key'   => 'options-page',
					'value' => array( $this->key, )
				),
			) );
			$fields->add_field( array(
				'name' => __( 'Display', PPW_TEXTDOMAIN ),
				'id'   => PPW_PREFIX . '_options_display_title',
				'type' => 'title'
			) );
			$fields->add_field( array(
			    'name'             => __( 'Project List Display', PPW_TEXTDOMAIN ),
			    'id'               => PPW_PREFIX . '_options_project_display',
			    'type'             => 'radio_inline',
			    'show_option_none' => false,
			    'default'          => 'cards',
			    'options'          => array(
			        'cards' => __( 'Cards', PPW_TEXTDOMAIN ),
			        'list' => __( 'List', PPW_TEXTDOMAIN )
			    ),
			) );
			$fields->add_field( array(
				'name'        => __( 'Display Amount', PPW_TEXTDOMAIN ),
				'desc'        => __( 'The amount of projects to show per page', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_options_project_display_amount',
				'type'        => 'text_small',
				'default'     => '10'
			) );
			$fields->add_field( array(
				'name'        => __( 'Project Excertp Length', PPW_TEXTDOMAIN ),
				'desc'        => __( 'The amount of words to show in the project excerpt', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . '_options_project_excertp_length',
				'type'        => 'text_small',
				'default'     => '15'
			) );

		} // end add_options_page_metabox

		/**
		 * Public getter method for retrieving protected/private variables
		 *
		 * @since      0.0.1
		 * @param      string $field Field to retrieve
		 * @return     mixed Field value or exception is thrown
		 */
		public function __get( $field ) {
			// Allowed fields to retrieve
			if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
				return $this->{$field};
			}

			throw new Exception( 'Invalid property: ' . $field );
		} // end __get
	}
} // end PPW_Options

/**
 * Wrapper function around cmb2_get_option
 *
 * @since      0.0.1
 * @param      string $key Options array key
 * @return     mixed Option value
 */
function ppw_get_option( $key = '' ) {
	return cmb2_get_option( ppw_admin()->key, $key );
}