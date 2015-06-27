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
		 * Get the Product categories
		 *
		 * @since 0.0.1
		 */
		public static function init() {
			$project_category = get_post_meta( get_the_id(), PPW_PREFIX . '_projects_category', true );
			$project_sub_categories = get_post_meta( get_the_ID(), PPW_PREFIX . '_projects_sub_category', true );
			// get the name of the product category
			foreach( $project_category as $key => $value ) {
				$obj = get_term_by( 'id', $value, 'ppw_projects_categories' );
				$cat = $obj->name;
				$url = get_term_link( intval( $value ), 'ppw_projects_categories' );
			}
			// get the names of the sub categories
			if( is_array( $project_sub_categories ) ) {
				foreach( $project_sub_categories as $key => $value ) {
					$sub_obj = get_term_by( 'id', $value, 'ppw_projects_sub_categories' );
					$sub_name = $sub_obj->name;
					$sub_url = get_term_link( intval( $value ), 'ppw_projects_sub_categories' );
					$sub_names[$key] =  '<a href="' . esc_url($sub_url) . '" class="ppw__product__sub_category--link">' . esc_html( $sub_name ) . '</a>';
				}
				$sub_cat = implode(', ', array_values( $sub_names ) );
			} else {
				$sub_cat = '';
			}
			$category = '<a href="' . esc_url($url) . '" class="ppw__product_category--link">' . esc_html( $cat ) . '</a>';
			$list_cats = ( $sub_cat ? $category . ', ' . $sub_cat : $category  );
			return $list_cats;
		} // end __construct

	}
} // end PPW_Helper_Get_Product_Categories