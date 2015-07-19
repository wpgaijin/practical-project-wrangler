<?php
/**
 * Add User Roles
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Add_Roles' ) ) {
  class PPW_Add_Roles {
    /**
     * Initialize the class
     *
     * @since [version]
     */
    public function __construct() {
      $this->add_client_role();
      $this->add_project_manager_role();
      $this->add_co_worker_role();
    } // end __construct
    /**
     * Add Client Roll
     *
     * @since      0.0.1
     * @access     private
     * @uses       add_role() wp-includes/capabilities.php
     * @return     void
     */
    private function add_client_role() {
      $capabilities = array(
        'read'                   => true,
        'edit_others_posts'      => true,
        'edit_posts'             => true,
        'edit_published_posts'   => true,
        'upload_files'           => true
      );
      add_role( 'client', 'Client', $capabilities );
    } // end add_client_role
    /**
     * Add Project Manager Roll
     *
     * @since      0.0.1
     * @access     private
     * @uses       add_role() wp-includes/capabilities.php
     * @return     void
     */
    private function add_project_manager_role() {
      $capabilities = array(
        'delete_others_pages'    => true,
        'delete_others_posts'    => true,
        'delete_pages'           => true,
        'delete_posts'           => true,
        'delete_private_pages'   => true,
        'delete_private_posts'   => true,
        'delete_published_pages' => true,
        'delete_published_posts' => true,
        'edit_others_pages'      => true,
        'edit_others_posts'      => true,
        'edit_pages'             => true,
        'edit_posts'             => true,
        'edit_private_pages'     => true,
        'edit_private_posts'     => true,
        'edit_published_pages'   => true,
        'edit_published_posts'   => true,
        'list_users'             => true,
        'manage_categories'      => true,
        'manage_links'           => true,
        'manage_options'         => true,
        'moderate_comments'      => true,
        'publish_pages'          => true,
        'publish_posts'          => true,
        'read_private_pages'     => true,
        'read_private_posts'     => true,
        'read'                   => true,
        'upload_files'           => true
      );
      add_role( 'project-manager', 'Project Manager', $capabilities );
    } // end add_client_role
    /**
     * Add Project Manager Roll
     *
     * @since      0.0.1
     * @access     private
     * @uses       add_role() wp-includes/capabilities.php
     * @return     void
     */
    private function add_co_worker_role() {
      $capabilities = array(
        'delete_others_pages'    => true,
        'delete_others_posts'    => true,
        'delete_pages'           => true,
        'delete_posts'           => true,
        'delete_private_pages'   => true,
        'delete_private_posts'   => true,
        'delete_published_pages' => true,
        'delete_published_posts' => true,
        'edit_others_pages'      => true,
        'edit_others_posts'      => true,
        'edit_pages'             => true,
        'edit_posts'             => true,
        'edit_private_pages'     => true,
        'edit_private_posts'     => true,
        'edit_published_pages'   => true,
        'edit_published_posts'   => true,
        'list_users'             => true,
        'manage_categories'      => true,
        'manage_links'           => true,
        'manage_options'         => true,
        'moderate_comments'      => true,
        'publish_pages'          => true,
        'publish_posts'          => true,
        'read_private_pages'     => true,
        'read_private_posts'     => true,
        'read'                   => true,
            'upload_files'           => true
      );
      add_role( 'co-worker', 'Co-Worker', $capabilities );
    } // end add_client_role
  }
} // end PPW_Add_Roles