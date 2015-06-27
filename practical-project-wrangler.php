<?php
/**
 * @package     PPW
 * @link      	https://github.com/wpgaijin/practical-project-wrangler
 * @copyright   Copyright (c) {4:2015}, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Pratical Project Wrangler
 * Plugin URI:        https://github.com/wpgaijin/practical-project-wrangler
 * Description:       
 * Version:           0.0.1
 * Author:            Jason Witt
 * Author URI:        http://jawittdesigns.com
 * License:           GPL-2.0+
 * License URI:       http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * Text Domain:       ppw
 * Domain Path:       /languages
 */ 

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'PPW' ) ) {
	class PPW {
		
		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of PPW class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 1.0.0
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof PPW ) ) {
				self::$instance = new PPW;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				self::$instance->init = new PPW_Init();
				self::$instance->admin_init = new PPW_Admin_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  0.0.1
		 * @access private
		 * @return void
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'PPW_VERSION' ) ) {
				define( 'PPW_VERSION', '0.0.1' );
			}
			// Prefix
			if ( ! defined( 'PPW_PREFIX' ) ) {
				define( 'PPW_PREFIX', 'ppw' );
			}
			// Textdomain
			if ( ! defined( 'PPW_TEXTDOMAIN' ) ) {
				define( 'PPW_TEXTDOMAIN', 'ppw' );
			}
			// Plugin Options
			if ( ! defined( 'PPW_OPTIONS' ) ) {
				define( 'PPW_OPTIONS', 'ppw-options' );
			}
			// Plugin Directory
			if ( ! defined( 'PPW_PLUGIN_DIR' ) ) {
				define( 'PPW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'PPW_PLUGIN_URL' ) ) {
				define( 'PPW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'PPW_PLUGIN_FILE' ) ) {
				define( 'PPW_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  0.0.1
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';
			// admin helpers
			require_once PPW_PLUGIN_DIR . 'admin/helpers/class-ppw-admin-helper-custom-fields.php';
			// admin classes
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-options.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-meta-boxes-messages.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-meta-boxes-tasks.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-meta-boxes-projects.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-meta-boxes-clients.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-load-admin-scripts.php';
			require_once PPW_PLUGIN_DIR . 'admin/classes/class-ppw-load-admin-styles.php';
			// admin
			require_once PPW_PLUGIN_DIR . 'admin/class-ppw-admin-init.php';
			// includes helpers
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-get-product-categories.php';
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-get-projects.php';
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-get-manager-users.php';
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-list-clients.php';
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-register-taxonomies.php';
			require_once PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-register-post-type.php';
			// shortcodes
			require_once PPW_PLUGIN_DIR . 'includes/shortcodes/class-ppw-shortcode-display-projects.php';
			require_once PPW_PLUGIN_DIR . 'includes/shortcodes/class-ppw-shortcode-task-form.php';
			require_once PPW_PLUGIN_DIR . 'includes/shortcodes/class-ppw-shortcode-project-form.php';
			require_once PPW_PLUGIN_DIR . 'includes/shortcodes/class-ppw-shortcode-client-form.php';
			// includes classes
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-pagination.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-load-styles.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-load-scripts.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-comment-editor.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-remove-post-type-support.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-add-user-roles.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-register-taxonomies.php';
			require_once PPW_PLUGIN_DIR . 'includes/classes/class-ppw-register-post-types.php';
			// includes
			require_once PPW_PLUGIN_DIR . 'includes/class-ppw-init.php';
			// activation
			require_once PPW_PLUGIN_DIR . 'includes/class-ppw-install.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  0.0.1
		 * @access public
		 */
		public function load_textdomain() {
			$ppw_lang_dir = dirname( plugin_basename( PPW_PLUGIN_FILE ) ) . '/languages/';
			$ppw_lang_dir = apply_filters( 'pluginname_lang_dir', $ppw_lang_dir );

			$locale = apply_filters( 'plugin_locale',  get_locale(), PPW_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', PPW_TEXTDOMAIN, $locale );

			$mofile_local  = $ppw_lang_dir . $mofile;

			if ( file_exists( $mofile_local ) ) {
				load_textdomain( PPW_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( PPW_TEXTDOMAIN, false, $ppw_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', PPW_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  0.0.1
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', PPW_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 0.0.1
 * @return object The Safety Links instance
 */
function PPW_Run() {
	return PPW::instance();
}
PPW_Run();