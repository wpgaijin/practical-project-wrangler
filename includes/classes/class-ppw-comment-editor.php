<?php
/**
 * Comment Editor
 *
 * Adds TinyMCE edito to comments field
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Comment_Editor' ) ) {
  class PPW_Comment_Editor {
    /**
     * Initialize the class
     *
     * @since     0.0.1
     * @uses     add_filter() wp-includes/plugin.php
     * @uses     add_action() wp-includes/plugin.php
     */
    public function __construct() {
      add_filter( 'comment_form_field_comment', array( $this, 'options' ) );
      add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
      add_filter( 'comment_reply_link', array( $this, 'reply_link' ) );
    } // end __construct
    /**
     * Options
     *
     * The options for the editor
     *
     * @since      0.0.1
     * @uses       wp_editor() wp-includes/general-template.php
     * @return     mixed the comment editor options
     */
    public function options() {
      global $post;
        ob_start();
        $rtl = 'ltr';
        $mediabtn = false;
        wp_editor( '', 'comment', apply_filters( 'ppw_wp_editor_params', 
          array(
            'textarea_rows' => 15,
            'teeny'         => true,
            'quicktags'     => false,
            'media_buttons' => false,
            'tinymce'       => array( 'directionality' => $rtl ),
          ) 
          ) );
        $editor = ob_get_contents();
      ob_end_clean();
      //make sure comment media is attached to parent post
      $editor = str_replace( 'post_id=0', 'post_id='.get_the_ID(), $editor );
      return $editor;
    } // end options
    /**
     * Enqueue scripts
     *
     * @since      0.0.1
     * @uses       wp_enqueue_script() wp-includes/functions.wp-scripts.php
     * @uses       is_singular() wp-includes/query.php
     * @uses       comments_open() wp-includes/comment-template.php
     * @uses       get_option() wp-includes/option.php
     * @return     void
     */
    public function enqueue_scripts() {
      wp_enqueue_script('jquery');
      if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
        wp_enqueue_script( PPW_PREFIX . '-comment-editor', PPW_PLUGIN_URL . 'includes/js/ppw-comment-editor.js', array( 'jquery' ), PPW_VERSION );
      }
    } // end enqueue
    /**
     * Comment reply link
     *
     * replace the default reply link onclick attribute
     *
     * @since      0.0.1
     * @param      string $link the reply link
     * @return     string $attr the replaced attribute
     */
    public function reply_link( $link ) {
      $attr = str_replace( 'onclick=', 'data-onclick=', $link );
      return $attr;
    } // end reply_link
  }
} // end PPW_Comment_Editor