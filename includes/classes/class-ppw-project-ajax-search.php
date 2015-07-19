<?php
/**
 * Project AJAX Search
 *
 * @package    PPW
 * @subpackage PPW/Includes/Classes
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Project_AJAX_Search' ) ) {
  class PPW_Project_AJAX_Search {
    /**
     * Initialize the class
     *
     * @since    0.0.1
     * @uses     add_action() wp-includes/plugin.php
     */
    public function __construct() {
      add_action( 'wp_ajax_ppw_project_search', array( $this, 'search' ) );
      add_action( 'wp_ajax_nopriv_ppw_project_search', array( $this, 'search' ) );
    } // end __construct
    /**
     * Results
     *
     * Return the AJAX results
     *
     * @since      0.0.1
     * @uses       add_action() wp-includes/pluggable.php
     * @uses       get_option() wp-includes/option.php
     * @uses       get_posts() wp-includes/post.php
     * @uses       get_post_meta() wp-includes/post.php
     * @uses       json_encode() wp-includes/compat.php
     * @uses       the_permalink() wp-includes/link-template.php
     * @global     obj $wp_query the wordpress query obj 
     * @return     void
     */
    public function search() {
      global $wpdb;
      $projects_group_title       = apply_filters( 'ppw_projects_group_title', 'ppw__Listing-group--title' );
      $projects_block             = apply_filters( 'ppw_projects_block', 'ppw__projects-block' );
      $projects_block_title       = apply_filters( 'ppw_projects_block_title', 'ppw__project-block--title' );
      $projects_block_categories  = apply_filters( 'ppw_projects_block_categories', 'ppw__projects-block--categories' );
      $projects_block_description = apply_filters( 'ppw_projects_block_description', 'ppw__projects-block--description' );
      $projects_block_avatars     = apply_filters( 'ppw_projects_block_avatars', 'ppw__projects-block--avatars' );
      $projects_block_link        = apply_filters( 'ppw_projects_block_link', 'ppw__projects-block--link' );
      if( wp_verify_nonce( $_POST['ppw_search_nonce'], 'ppw_project_search_nonce') ) {
        $search_query   = trim( $_POST['search_string'] );
        $options        = get_option( PPW_PREFIX . '_options' );
        $excerpt_length = $options[PPW_PREFIX . '_options_project_excertp_length'];
        if( $search_query ) {
          $found_projects = get_posts( array(
            'posts_per_page' => 9999,
            'post_type'      => 'ppw_projects',
            's'              => $search_query
          ) );
          foreach( $found_projects as $project ) {
            $project_description = get_post_meta( $project->ID, PPW_PREFIX . '_projects_desc', true );
            $project_category    = get_post_meta( $project->ID, PPW_PREFIX . '_projects_category', true );
            $project_clients     = get_post_meta( $project->ID, PPW_PREFIX . '_projects_client', true );
            $project_assigned    = get_post_meta( $project->ID, PPW_PREFIX . '_assigned', true );
            $this_letter         = strtoupper( substr( $project->post_title, 0, 1) );
            $curr_letter         = '';
            $html                = 'a';
            if( $this_letter != $curr_letter ) {
              $curr_letter = $this_letter;
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $projects_group_title ) ) . '><h2>' . $this_letter . '</h2></div>';
            }
            $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $projects_block ) ) . '> <h2 ' . ppw_get_attribute( 'class', esc_attr( $projects_block_title ) ) . '>';
                $html .= $project->post_title;
              $html .= '</h2>';
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $projects_block_categories ) ) . '>';
                $html .= ppw_get_product_categories($project->ID);
              $html .= '</div>';
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $projects_block_description ) ) . '>';
                $html .= wp_trim_words( $project_description, $excerpt_length );
              $html .= '</div>';
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $projects_block_avatars ) ) . '>';
                $html .= ppw_get_project_user_avatar( $project_clients, $project_assigned );
              $html .= '</div>';
              $html .= '<a href="<?php echo the_permalink(); ?>" ' . ppw_get_attribute( 'class', esc_attr( $projects_block_link ) ) . '></a>';
            $html .= '</div>';
            }
            echo json_encode( array( 'search_results' => $html, 'search_id' => 'found' ) );
        } else {
          echo json_encode( array( 'search_msg' => __('No Projects Found', PPW_TEXTDOMAIN ), 'search_results' => 'none', 'search_id' => 'fail' ) );
        }
      }
      die();
    } // end search
  }
} // end PPW_Project_AJAX_Search