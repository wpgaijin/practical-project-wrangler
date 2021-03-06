<?php
/**
 * Register Custom Post Types
 *
 * @package    PPW
 * @subpackage PPW/Includes
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Register_Post_Type' ) ) {
  class PPW_Helper_Register_Post_Type {
    /**
     * The post type
     *
     * @var string
     */
    protected $post_type;
    /**
     * Singular Version of Post Type
     *
     * @var string
     */
    protected $singular;
    /**
     * Plural Version of Post Type
     *
     * @var string
     */
    protected $plural;
    /**
     * The labels array
     *
     * @var array
     */
    protected $labels;
    /**
     * The post type arguments
     *
     * @var array
     */
    protected $args;
    /**
     * Initialize the class and set its properties.
     *
     * @since      0.0.1
     * @param      string $post_type The post type's slug
     * @uses       post_type_exists() wp-includes/post.php
     * @uses       register_post_type() wp-includes/post.php
     * @param      array  $singular  The singular of the post type name
     * @param      array  $plural    The plural of the post type name
     * @param      array  $labels    The post type labels
     * @param      array  $args      The post type arguments
     */
    public function __construct( $post_type, $singular = '', $plural = '', $labels = array(), $args = array() ) {
      $this->post_type = $post_type;
      $this->singular  = $singular;
      $this->plural    = $plural;
      $this->labels    = $labels;
      $this->args      = $args;
      if ( !post_type_exists( $this->post_type ) ) {
        register_post_type( $this->post_type, $this->args() );
      }
    } // end __construct
    /**
     * The post type labels. User defined labels override the default
     *
     * @since      0.0.1
     * @access     private
     * @uses       wp_parse_args() wp-includes/functions.php
     * @return     array The modified array of post type labels
     */
    private function labels() {
      $defaults = array(
        'name'               => _x( $this->plural, 'post type general name' ),
        'singular_name'      => _x( $this->singular, 'post type singular name' ),
        'menu_name'          => __( $this->plural ),
        'name_admin_bar'     => __( $this->plural ),
        'all_items'          => __( 'All ' . $this->plural ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Add New ' . $this->singular ),
        'edit_item'          => __( 'Edit ' . $this->singular ),
        'new_item'           => __( 'New ' . $this->singular ),
        'view_item'          => __( 'View ' . $this->singular ),
        'search_items'       => __( 'Search ' . $this->plural ),
        'not_found'          => __( 'No ' . $this->plural . ' Found' ),
        'not_found_in_trash' => __( 'No ' . $this->plural . ' Found in Trash' ),
        'parent_item_colon'  => __( 'Parent ' . $this->singular . ' Post:' ),
      );
      $args   = $this->labels;
      $labels = wp_parse_args( $args, $defaults );
      return $labels;
    } // end labels
    /**
     * The post type arguments. User defined arguments override the default
     *
     * @since      0.0.1
     * @access     private
     * @uses       wp_parse_args() wp-includes/functions.php
     * @return     array The modified array of post type arguments
     */
    private function args() {
      $labels   = $this->labels();
      $defaults = array(
        'labels'                => $labels,
        'description'           => '',
        'public'                => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'menu_position'         => NULL,
        'menu_icon'             => NULL,
        'capability_type'       => 'post',
        'capabilities'          => array(),
        'map_meta_cap'          => true,
        'hierarchical'          => false,
        'supports'              => array(
                                    'title',
                                    'editor'
                                  ),
        'register_meta_box_cb'  => '',
        'taxonomies'            => array(),
        'has_archive'           => false,
        'permalink_epmask'      => EP_PERMALINK,
        'rewrite'               => array( 'slug'=> $this->post_type ),
        'query_var'             => true,
        'can_export'            => true,
        '_builtin'              => false
      );
      $args = $this->args;
      $args = wp_parse_args( $args, $defaults );
      return $args;
    } // end args
  }
} // end PPW_Helper_Register_Post_Type
/**
 * Register Post Type template function
 *
 * @since      0.0.1
 * @param      array  $singular  The singular of the post type name
 * @param      array  $plural    The plural of the post type name
 * @param      array  $labels    The post type labels
 * @param      array  $args      The post type arguments
 * @return     [type] [description]
 */
if( ! function_exists( 'ppw_register_post_types') ) {
  function ppw_register_post_types( $post_type, $singular, $plural, $labels = array(), $args = array() ) {
    return new PPW_Helper_Register_Post_Type( $post_type, $singular, $plural, $labels, $args );
  }
} // end ppw_register_post_types