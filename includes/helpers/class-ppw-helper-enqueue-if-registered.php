<?php
/**
 * Enqueue if registered
 *
 * Enqueue scripts if they are registered
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.2
 */
if( !class_exists( 'PPW_Helper_Enqueue_If_Registered' ) ) {
  class PPW_Helper_Enqueue_If_Registered {
    /**
     * The external JavaScript to enqueue
     *
     * @since  0.0.1
     * @var    string $script the name of the script
     */
    protected $script;
    /**
     * Initialize the class
     *
     * @since      0.0.1
     * @param      string $script the script ID
     */
    public function __construct( $script ) {
      $this->script = $script;
      $this->enqueue_script();
    }
    /**
     * Enqueue if registered
     *
     * @since      0.0.1
     * @uses       wp_script_is() wp-includes/functions.wp-scripts.php
     * @uses       wp_script_is() wp-includes/functions.wp-scripts.php
     * @return     void
     */
    public function enqueue_script() {
      // enqueue script if registered
      if( wp_script_is( $this->script, 'registered' ) ) {
        // script that hides the comments area
        wp_enqueue_script( $this->script );
      }
    } // end init
  }
} // end PPW_Helper_Enqueue_If_Registered
/**
 * Enqueue if registeres template function
 *
 * @since      0.0.1
 * @param      string $script the script ID
 * @return     PPW_Helper_Enqueue_If_Registered()
 */
if( !function_exists( 'ppw_enqueue_if_registered' ) ) {
  function ppw_enqueue_if_registered( $script ) {
    return new PPW_Helper_Enqueue_If_Registered( $script );
  }
} // end ppw_enqueue_if_registered