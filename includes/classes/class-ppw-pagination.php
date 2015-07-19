<?php
/**
 * Pagination
 *
 * @package    PPW
 * @subpackage PPW/Classes
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Pagination' ) ) {
  class PPW_Pagination {
    /**
     * The class arguments
     *
     * @since      0.0.1
     * @global     $paged the paged number
     * @param      array $args the class arguments
     * @return     string $html the putputed HTML
     */
    public static function init( $args = array() ) {
      global $paged;
      if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
      }
      $defaults = array(
        'container'               => 'nav',
        'container_id'            => 'posts-navigation-' . $paged,
        'container_class'         => 'navigation posts-navigation',
        'container_attr'          => 'aria-labelledby="navigation-heading-' . $paged . '" role="navigation"',
        'base'                    => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'format'                  => '?paged=%#%',
        'total'                   => $GLOBALS['wp_query']->max_num_pages,
        'current'                 => max( 1, get_query_var( 'paged' ) ),
        'show_all'                => false,
        'end_size'                => 1,
        'mid_size'                => 1,
        'prev_next'               => True,
        'prev_text'               => '&laquo; Previous',
        'next_text'               => 'Next &raquo;',
        'type'                    => 'list',
        'add_args'                => False,
        'add_fragment'            => '',
        'before_page_number'      => '',
        'after_page_number'       => ''
      );
      $this->args      = array_merge( $defaults, $this->args );
      $container_id    = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
      $container_class = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
      $container_attr  = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
      $html            = '';
      $html .= '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>';
        $html .= paginate_links( $this->args );
      $html .= '</' . $this->args['container'] . '>';
      return $html;
    }
  }
} // end PPW_Pagination
/**
 * Pagination template function
 *
 * @since      0.0.1
 * @param      array $args the class arguments
 * @return     string $html the putputed HTML
 */
if( !function_exists( 'ppw_pagination' ) ) {
  function ppw_pagination( $args = array() ) {
    return PPW_Pagination::init( $args );
  } // end ppw_pagination
}