<?php
/**
 * Register Custom Post Types
 *
 * @package    PPW
 * @subpackage PPW/Includes
 * @since      0.0.1
 */

class PPW_Helper_Register_Post_Type {

    /**
     * The post type
     *
     * @var string
     */
    public $post_type;

    /**
     * Singular Version of Post Type
     *
     * @var string
     */
    public $singular;

    /**
     * Plural Version of Post Type
     *
     * @var string
     */
    public $plural;

    /**
     * The labels array
     *
     * @var array
     */
    public $labels;

    /**
     * The post type arguments
     *
     * @var array
     */
    public $args;

    /**
     * Initialize the class and set its properties.
     *
     * @since 0.0.1
     * @param unknown $post_type        The post type's name
     * @param unknown $labels The post type labels
     * @param unknown $args   The post type arguments
     */
    public function __construct( $post_type, $singular = '', $plural = '', $labels = array(), $args = array() ) {
        $this->post_type = $post_type;
        $this->singular  = $singular;
        $this->plural    = $plural;
        $this->labels    = $labels;
        $this->args      = $args;
        // If plugin is activated Flush the rewrite rules
        if ( !post_type_exists( $this->post_type ) ) {
            add_action( 'init', array( $this, 'register_post_type' ), 1 );
        }
    } // end __construct

    /**
     * Flush rerwite rules on plugin activation
     *
     * @since 0.0.1
     * @access public
     * @return void
     */
    public static function flush_rewrite_rules() {
        flush_rewrite_rules( false );
    } // end flush_rewrite_rules

    /**
     * The post type labels. User defined labels override the default
     *
     * @since 0.0.1
     * @access private
     * @return array The modified array of post type labels
     */
    private function labels() {
        $defaults = array(
            'name'               => _x( $this->plural, 'post type general name' ),
            'singular_name'      => _x( $this->singular, 'post type singular name' ),
            'add_new'            => __( 'Add New' ),
            'all_items'          => __( 'All ' . $this->plural ),
            'add_new_item'       => __( 'Add New ' . $this->singular ),
            'edit_item'          => __( 'Edit ' . $this->singular ),
            'new_item'           => __( 'New ' . $this->singular ),
            'view_item'          => __( 'View ' . $this->singular ),
            'search_items'       => __( 'Search ' . $this->plural ),
            'not_found'          => __( 'No ' . $this->plural . ' Found' ),
            'not_found_in_trash' => __( 'No ' . $this->plural . ' Found in Trash' ),
            'parent_item_colon'  => __( 'Parent ' . $this->singular . ' Post:' ),
            'menu_name'          => __( $this->plural ),
        );
        $args   = $this->labels;
        $labels = wp_parse_args( $defaults, $args );

        return $labels;
    } // end labels

    /**
     * The post type arguments. User defined arguments override the default
     *
     * @since 0.0.1
     * @access private
     * @return array The modified array of post type arguments
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
            'capabilities'          => array(
                'edit_post',
                'read_post',
                'delete_post',
                'edit_posts',
                'edit_others_posts',
                'publish_posts',
                'read_private_posts'
            ),
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

    /**
     * Register Post Type
     *
     * @since 0.0.1
     * @access public
     * @return void
     */
    public function register_post_type() {
        register_post_type( $this->post_type, $this->args() );
    } // end register_post_type
}
