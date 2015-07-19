<?php
/**
 * Register Taxonomies
 *
 * @package     PPW
 * @subpackage  PPW/Includes/Helpers
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Helper_Register_Taxonomies' ) ) {
  class PPW_Helper_Register_Taxonomies {
    /**
     * Post type to attach taxonomy to
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
     * The taxonomy name
     *
     * @var string
     */
    protected $taxonomy;
    /**
     * The plural version of the taxonomy
     *
     * @var string
     */
    protected $plural;
    /**
     * The labels array
     *
     * @var array
     */
    protected $lables;
    /**
     * The arguments array
     *
     * @var array
     */
    protected $args;
    /**
     * Initialize the class
     *
     * @since 0.0.1
     * @param string $post_type The post type's slug
     * @param array  $taxonomy  The taxonomy name
     * @param array  $singular  The singular of the taxonomy name
     * @param array  $plural    The plural of the taxonomy name
     * @param array  $labels    The taxonomy labels
     * @param array  $args      The taxonomy arguments
     */
    public function __construct( $post_type, $taxonomy, $singular = '', $plural = '',  $labels = array(), $args = array() ) {
      $this->post_type = $post_type;
      $this->taxonomy  = $taxonomy;
      $this->singular  = $singular;
      $this->plural    = $plural;
      $this->labels    = $labels;
      $this->args      = $args;
      if ( !taxonomy_exists( $this->taxonomy ) ) {
        register_taxonomy( $this->taxonomy, $this->post_type, $this->args() );
      }
    }
    /**
     * The taxonomy labels. User defined labels override the default
     *
     * @return array  The modified array of taxomony labels
     * @since  0.0.1
     */
    private function labels() {
      // The taxonomy default labels
      $defaults = array(
        'name'                          => _x( $this->plural, 'taxonomy general name' ),
        'singular_name'                 => _x( $this->singular, 'taxonomy singular name' ),
        'all_items'                     => __( 'All ' . $this->plural ),
        'edit_item'                     => __( 'Edit ' . $this->plural ),
        'view_item'                     => __( 'View ' . $this->singular ),
        'update_item'                   => __( 'Update ' . $this->plural ),
        'add_new_item'                  => __( 'Add New ' . $this->singular ),
        'new_item_name'                 => __( 'New ' . $this->singular ),
        'parent_item'                   => __( 'Parent ' . $this->singular ),
        'parent_item_colon'             => __( 'Parent ' . $this->singular ),
        'search_items'                  => __( 'Search ' . $this->plural ),
        'popular_items'                 => __( 'Popular ' . $this->plural ),
        'separate_items_with_commas'    => __( 'Separate ' . $this->plural . ' with commas' ),
        'add_or_remove_items'           => __( 'Add or Remove ' . $this->singular ),
        'choose_from_most_used'         => __( 'Choose from the most used ' . $this->plural ),
        'not_found'                     =>  __( 'No ' . $this->plural . ' found.' ),
        'menu_name'                     => __(  $this->plural ),
      );
      $args   = $this->labels;
      $labels = wp_parse_args( $defaults, $args );
      return $labels;
    }
    /**
     * The taxonomy arguments. User defined arguments override the default
     *
     * @return array  The modified array of taxomony arguments
     * @since  0.0.1
     */
    private function args() {
      // The taxonomy default arguments
      $defaults = array(
        'labels'                => $this->labels(),
        'public'                => true,
        'show_ui'               => true,
        'show_in_nav_menus'     => true,
        'show_tagcloud'         => false,
        'meta_box_cb'           => NULL,
        'show_admin_column'     => false,
        'hierarchical'          => true,
        'update_count_callback' => '',
        'query_var'             => $this->taxonomy,
        'rewrite'               => array( 'slug' => $this->taxonomy ),
        'capabilities'          => array(),
        'sort'                  => '',
        '_builtin'              => false
      );
      $args = $this->args;
      $args = wp_parse_args( $args, $defaults );
      return $args;
    }
  }
} // end PPW_Helper_Register_Taxonomies
/**
 * Register Taxonomies template function
 *
 * @since      0.0.1
 * @param string $post_type The post type's slug
 * @param array  $taxonomy  The taxonomy name
 * @param array  $singular  The singular of the taxonomy name
 * @param array  $plural    The plural of the taxonomy name
 * @param array  $labels    The taxonomy labels
 * @param array  $args      The taxonomy arguments
 * @return     PPW_Helper_Register_Taxonomies()
 */
if( ! function_exists( 'ppw_register_taxinomies') ) {
  function ppw_register_taxinomies( $post_type, $taxonomy, $singular, $plural,  $labels = array(), $args = array() ) {
    return new PPW_Helper_Register_Taxonomies( $post_type, $taxonomy, $singular, $plural,  $labels, $args );
  }
} // end ppw_register_taxinomies