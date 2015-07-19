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
     * @since    0.0.1
     * @uses     add_action() wp-includes/plugin.php
     */
    public function __construct() {
      add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
    } // end __construct
    /**
     * Load general scripts
     *
     * @since      0.0.1
     * @uses       wp_register_script() wp-includes/functions.wp-scripts.php
     * @uses       wp_localize_script() wp-includes/functions.wp-scripts.php
     * @return     void
     */
    public function scripts() {
      wp_register_script( PPW_PREFIX . '-comments-off', PPW_PLUGIN_URL . 'includes/js/ppw-comments-off.js', array( 'jquery' ), PPW_VERSION );
      wp_register_script( PPW_PREFIX . '-clients-form', PPW_PLUGIN_URL . 'includes/js/ppw-client-form.min.js', array( 'jquery' ), PPW_VERSION, true );
      wp_register_script( PPW_PREFIX . '-password-meter' , PPW_PLUGIN_URL . 'includes/js/ppw-password-meter.min.js', array( 'jquery' ), PPW_VERSION, true );
      wp_register_script( PPW_PREFIX . '-project-search', PPW_PLUGIN_URL . 'includes/js/ppw-project-search.min.js', array( 'jquery' ), PPW_VERSION, true );
      wp_localize_script( PPW_PREFIX . '-project-search', 'ppw_project_vars',  array( 
        'ppw_project_ac_nonce'     => wp_create_nonce( 'ppw_project_ac_nonce' ),
        'ppw_project_search_nonce' => wp_create_nonce( 'ppw_project_search_nonce' ),
        'ajaxurl'                  => admin_url( 'admin-ajax.php' )
      ) );
    } // end scripts
  }
} // end PPW_Load_Scripts