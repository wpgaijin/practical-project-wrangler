<?php
/**
 * Close Comments
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Close_Comments' ) ) {
  class PPW_Helper_Close_Comments {
    /**
     * The post ID
     *
     * @since  0.0.1
     * @var    int $id the post ID
     */
    protected $id;
    /**
     * Initialize the class
     *
     * @since      0.0.1
     * @param      int $id the post ID
     */
    public function __construct( $id ) {
      $this->id = $id;
      $this->close_comments();
    }
    /**
     * Close Comments
     *
     * @since      0.0.1
     * @uses       get_the_content() wp-includes/post-template.php
     * @uses       has_shortcode()   wp-includes/shortcodes.php
     * @global     obj $post the post object
     * @return     void
     */
    public function close_comments() {
      global $post;
      $subject = get_the_content( $post->ID );
      if( has_shortcode( $subject, $this->id ) ) {
        $post->comment_status = 'closed';
        $post->ping_status = 'closed';
      }
    } // end init
  }
} // end PPW_Helper_Close_Comments
/**
 * Close Comments Template Function
 *
 * @since      0.0.1
 * @param      int $id the post ID
 * @return     PPW_Helper_Close_Comments()
 */
if( !function_exists( 'ppw_close_comments' ) ) {
  function ppw_close_comments( $id ) {
    $ppw_helper_close_comments = new PPW_Helper_Close_Comments( $id );
  }
} // end ppw_close_comments