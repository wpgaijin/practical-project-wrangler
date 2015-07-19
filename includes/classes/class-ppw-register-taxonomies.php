<?php
/**
 * Register Taxonomies
 *
 * @package    PPW
 * @subpackage PPW/Includes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Register_Taxonomies' ) ) {
  class PPW_Register_Taxonomies {
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
      $this->register_projects_category_taxonomies();
      $this->register_projects_sub_category_taxonomies();
    } // end __construct
    /**
     * Projects Category Taxonomy
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Taxonomies() includes/helpers/class-ppw-register-taxonomies.php
     * @return     void
     */
    protected function register_projects_category_taxonomies() {
      $args = array(
        'rewrite' => array( 'slug' => 'project_category' ),
      );
      ppw_register_taxinomies( 'ppw_projects', 'ppw_projects_categories', 'Category', 'Categories', array(), $args );
    } // end register_projects_category_taxonomies
    /**
     * Projects Sub Category Taxonomy
     *
     * @since      0.0.1
     * @see        PPW_Helper_Register_Taxonomies() includes/helpers/class-ppw-register-taxonomies.php
     * @return     void
     */
    protected function register_projects_sub_category_taxonomies() {
      $args = array(
        'rewrite' => array( 'slug' => 'project_sub_category' ),
      );
      ppw_register_taxinomies( 'ppw_projects', 'ppw_projects_sub_categories', 'Sub Category', 'Sub Categories', array(), $args );
    } // end register_projects_sub_category_taxonomies
  }
} // end PPW_Register_Taxonomies