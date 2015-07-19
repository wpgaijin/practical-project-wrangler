<?php
/**
 * Load Admin Scripts
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Admin_Load_Scripts' ) ) {
  class PPW_Admin_Load_Scripts {
    /**
     * Initialize the class
     *
     * @since 0.0.1
     * @uses     add_action() wp-includes/plugin.php
     */
    public function __construct() {
      add_action( 'admin_enqueue_scripts', array( $this, 'meta_box_scripts' ) );
    } // end __construct
    /**
     * Clients meta box scripts
     *
     * @since      0.0.1
     * @uses       wp_register_script() wp-includes/functions.wp-scripts.php
     * @uses       wp_register_script() wp-includes/functions.wp-scripts.php
     * @return     void
     */
    public function meta_box_scripts( $hook_suffix ) {
      global $typenow;
      if( $typenow == PPW_PREFIX . '_clients' ) {
        if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
          wp_register_script( PPW_PREFIX . '-clients-form', PPW_PLUGIN_URL . 'includes/js/ppw-client-form.min.js', array( 'jquery' ), PPW_VERSION, true );
          wp_enqueue_script( PPW_PREFIX . '-clients-form' );
        }
      }
    } // end meta_box_scripts
  }
} // end PPW_Admin_Load_Scripts