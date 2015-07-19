<?php
/**
 * Register Post Types for the plugin
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 * @see        PPW_Helper_Register_Post_Type
 */

if( !class_exists( 'PPW_Register_Post_Types' ) ) {
  class PPW_Register_Post_Types {
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
      $this->register_projects_post_type();
      $this->register_tasks_post_type();
      $this->register_clients_post_type();
      $this->register_messages_post_type();
    } // end __construct
    /**
     * Register projects post type
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Post_Type() includes/helpers/class-ppw-register-post-type.php
     * @return     void
     */
    public function register_projects_post_type() {
      $args = array(
        'description'     => 'The Projects post type',
        'menu_icon'       => 'dashicons-analytics',
        'supports'        => array( 'title', 'comments', 'author' ),
        'rewrite'         => array( 'slug'=> 'projects' )
      );
      ppw_register_post_types( PPW_PREFIX . '_projects', 'Project', 'Projects', array(), $args );
    } // end register_projects_post_type
    /**
     * Register tasks post type
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Post_Type() includes/helpers/class-ppw-register-post-type.php
     * @return     void
     */
    public function register_tasks_post_type() {
      $args = array(
        'description'     => 'The Tasks post type',
        'supports'        => array( 'title', 'comments', 'author' ),
        'show_in_menu'    => 'edit.php?post_type=ppw_projects',
        'rewrite'         => array( 'slug'=> 'tasks' )
      );
      ppw_register_post_types( PPW_PREFIX . '_tasks', 'Task', 'Tasks', array( 'all_items' => __( 'Tasks' ) ), $args );
    } // end register_clients_post_type
    /**
     * Register clients post type
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Post_Type() includes/helpers/class-ppw-register-post-type.php
     * @return     void
     */
    public function register_clients_post_type() {
      $args = array(
        'description'     => 'The Clients post type',
        'menu_icon'       => 'dashicons-groups',
        'supports'        => array( 'title' ),
        'rewrite'         => array( 'slug'=> 'clients' )
      );
      ppw_register_post_types( PPW_PREFIX . '_clients', 'Client', 'Clients', array(), $args );
    } // end register_clients_post_type
    /**
     * Register messages post type
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Post_Type() includes/helpers/class-ppw-register-post-type.php
     * @return     void
     */
    public function register_messages_post_type() {
      $args = array(
        'description'     => 'The Messages post type',
        'show_in_menu'    => 'edit.php?post_type=ppw_projects',
        'rewrite'         => array( 'slug'=> 'message' )
      );
      ppw_register_post_types( PPW_PREFIX . '_message', 'Message', 'Messages', array( 'all_items' => __( 'Messages' ) ), $args );
    } // end register_messages_post_type
  }
} // end PPW_Register_Post_Types