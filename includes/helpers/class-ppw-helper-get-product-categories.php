<?php
/**
 * Get product categories
 *
 * Get the product category names
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Product_Categories' ) ) {
  class PPW_Helper_Get_Product_Categories {
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
     * @since 0.0.1
     * @param      int $id the post ID
     */
    public function __construct( $id ) {
      $this->id = $id;
    }
    /**
     * Get the Product categories
     *
     * @since      0.0.1
     * @uses       get_post_meta() wp-includes/post.php
     * @uses       apply_filters() wp-includes/plugin.php
     * @uses       get_term_by() wp-includes/taxonomy.php
     * @uses       get_term_link() wp-includes/taxonomy.php
     */
    public function get_product_categories() {
      $project_category            = get_post_meta( $this->id, PPW_PREFIX . '_projects_category', true );
      $project_sub_categories      = get_post_meta(  $this->id, PPW_PREFIX . '_projects_sub_category', true );
      $projects_category_class     = apply_filters( 'ppw_projects_category_classes', 'ppw__products--category' );
      $projects_sub_category_class = apply_filters( 'ppw_projects_sub_category_classes', 'ppw__products--sub-category' );
      $category                    = '';
      $sub_category                = '';
      // get the name of the product category
      if( $project_category ) {
        foreach( $project_category as $key => $value ) {
          $project_obj = get_term_by( 'id', $value, 'ppw_projects_categories' );
          $project_cat = $project_obj->name;
          $project_url = get_term_link( intval( $value ), 'ppw_projects_categories' );
        }
        $category = '<a ' . ppw_get_attribute( 'href', esc_url( $project_url ) ) . ppw_get_attribute( 'class', esc_attr( $projects_category_class ) ) . '>' . esc_html( $project_cat ) . '</a>';
      }
      // get the names of the sub categories
      if( $project_sub_categories ) {
        if( is_array( $project_sub_categories ) ) {
          foreach( $project_sub_categories as $key => $value ) {
            $project_sub_obj         = get_term_by( 'id', $value, 'ppw_projects_sub_categories' );
            $project_sub_name        = $project_sub_obj->name;
            $project_sub_url         = get_term_link( intval( $value ), 'ppw_projects_sub_categories' );
            $project_sub_names[$key] = '<a ' . ppw_get_attribute( 'href', esc_url( $project_sub_url ) ) . ppw_get_attribute( 'class', esc_attr( $projects_sub_category_class ) ) . '>' . esc_html( $project_sub_name ) . '</a>';
          }
          $sub_category = implode(', ', array_values( $project_sub_names ) );
        } else {
          foreach( $project_sub_categories as $key => $value ) {
            $project_sub_obj  = get_term_by( 'id', $value, 'ppw_projects_sub_categories' );
            $project_sub_name = $project_sub_obj->name;
            $project_sub_url  = get_term_link( intval( $value ), 'ppw_projects_sub_categories' );
          }
          $sub_category = '<a ' . ppw_get_attribute( 'href', esc_url( $project_sub_url ) ) . ppw_get_attribute( 'class', esc_attr( $projects_sub_category_class ) ) . '>' . esc_html( $project_sub_name ) . '</a>';
        }
      }
      // list all the categories
      $list_cats = ( $sub_category ? $category . ', ' . $sub_category : $category  );
      return $list_cats;
    } // end __construct
  }
} // end PPW_Helper_Get_Product_Categories
/**
 * Get Product Categories template function
 *
 * @since      0.0.1
 * @param      int $id the post ID
 */
if( !function_exists( 'ppw_get_product_categories' ) ) {
  function ppw_get_product_categories( $id ) {
    $ppw_helper_get_product_categories = new PPW_Helper_Get_Product_Categories( $id );
    return $ppw_helper_get_product_categories->get_product_categories();
  }
} // end ppw_get_product_categories