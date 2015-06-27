<?php
/**
 * Pagination
 *
 * @package     FCWP
 * @subpackage  FCWP/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

if( !class_exists( 'FCWP_Pagination' ) ) {
	class FCWP_Pagination {

		/**
		 * The type of pagination
		 * 
		 * @var string
		 */
		public $type;

		/**
		 * The arguments
		 * 
		 * @var array
		 */
		public $args;

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 * @param array $args the class arguments
		 */
		public function __construct( $type, $args = array() ) {
			$this->type = $type;
			$this->args = $args;
			if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
				return;
			}
			add_filter( 'previous_posts_link_attributes', array( $this, 'previous_posts_link_filter' ) );
			add_filter( 'next_posts_link_attributes', array( $this, 'next_posts_link_filter' ) );
			$this->arguments();
			$this->display();
		}

		/**
		 * The class arguments
		 *
		 * @global $paged the paged number
		 * 
		 * @since 0.0.1
         * @access private
         * @return void
		 */
		private function arguments() {
			global $paged;
			$defaults = array(
				'container'               => 'nav',
				'container_id'            => 'posts-navigation-' . $paged,
				'container_class'         => 'navigation posts-navigation',
				'container_attr'          => 'aria-labelledby="navigation-heading-' . $paged . '" role="navigation"',
				'sr_conatiner'            => 'h1',
				'sr_id'                   => 'navigation-heading-' . $paged,
				'sr_class'                => 'screen-reader-text',
				'sr_attr'                 => '',
				'sr_text'                 => 'Posts navigation',
				'default_container'       => 'div',
				'default_container_id'    => '',
				'default_container_class' => '',
				'default_container_attr'  => 'aria-label="Pagination"',
				'split_container'         => 'div',
				'split_container_id'      => '',
				'split_container_class'   => '',
				'split_container_attr'    => 'aria-label="Pagination"',
				'next_container'          => 'div',
				'next_container_id'       => '',
				'next_container_class'    => 'nav-next',
				'next_container_attr'     => '',
				'prev_container'          => 'div',
				'prev_container_id'       => '',
				'prev_container_class'    => 'nav-prev',
				'prev_container_attr'     => '',
				'aria_prev'               => 'Previous Page',
				'aria_next'               => 'Next Page',
				'sep'                     => ' - ',
				'prelabel'                => '&laquo; Previous',
				'nextlabel'               => 'Next &raquo;',
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
	        $this->args = array_merge( $defaults, $this->args );
		}

		/**
		 * Display the pagination
		 *
		 * @since 0.0.1
         * @access private
         * @return string the html output for the pagination
		 */
		private function display() {
			$container_id            = ( !empty( $this->args['container_id'] ) ? 'id="' . $this->args['container_id'] . '"' : "" );
			$container_class         = ( !empty( $this->args['container_class'] ) ? 'class="' . $this->args['container_class'] . '"' : "" );
			$container_attr          = ( !empty( $this->args['container_attr'] ) ? $this->args['container_attr'] : "" );
			$sr_id                   = ( !empty( $this->args['sr_id'] ) ? 'id="' . $this->args['sr_id'] . '"' : "" );
			$sr_class                = ( !empty( $this->args['sr_class'] ) ? 'class="' . $this->args['sr_class'] . '"' : "" );
			$sr_attr                 = ( !empty( $this->args['sr_attr'] ) ? $this->args['sr_attr'] : "" );
			$sr_text                 = ( !empty( $this->args['sr_text'] ) ? __( $this->args['sr_text'], FCWP_TAXDOMAIN) : "" );
			$default_container_id    = ( !empty( $this->args['default_container_id'] ) ? 'id="' . $this->args['default_container_id'] . '"' : "" );
			$default_container_class = ( !empty( $this->args['default_container_class'] ) ? 'class="' . $this->args['default_container_class'] . '"' : "" );
			$default_container_attr  = ( !empty( $this->args['default_container_attr'] ) ? $this->args['default_container_attr'] : "" );
			$split_container_id      = ( !empty( $this->args['split_container_id'] ) ? 'id="' . $this->args['split_container_id'] . '"' : "" );
			$split_container_class   = ( !empty( $this->args['split_container_class'] ) ? 'class="' . $this->args['split_container_class'] . '"' : "" );
			$split_container_attr    = ( !empty( $this->args['split_container_attr'] ) ? $this->args['split_container_attr'] : "" );
			$next_container_id       = ( !empty( $this->args['next_container_id'] ) ? 'id="' . $this->args['next_container_id'] . '"' : "" );
			$next_container_class    = ( !empty( $this->args['next_container_class'] ) ? 'class="' . $this->args['next_container_class'] . '"' : "" );
			$next_container_attr     = ( !empty( $this->args['next_container_attr'] ) ? $this->args['next_container_attr'] : "" );
			$prev_container_id       = ( !empty( $this->args['prev_container_id'] ) ? 'id="' . $this->args['prev_container_id'] . '"' : "" );
			$prev_container_class    = ( !empty( $this->args['prev_container_class'] ) ? 'class="' . $this->args['prev_container_class'] . '"' : "" );
			$prev_container_attr     = ( !empty( $this->args['prev_container_attr'] ) ? $this->args['prev_container_attr'] : "" );
			$sep                     = ( !empty( $this->args['sep'] ) ? __( $this->args['sep'], FCWP_TAXDOMAIN) : "" );
			$prelabel                = ( !empty( $this->args['prelabel'] ) ? __( $this->args['prelabel'], FCWP_TAXDOMAIN) : "" );
			$nextlabel               = ( !empty( $this->args['nextlabel'] ) ? __( $this->args['nextlabel'], FCWP_TAXDOMAIN) : "" );

	        echo '<' . $this->args['container'] . ' ' . $container_id . ' ' . $container_class  . ' ' . $container_attr . '>';
				echo '<' . $this->args['sr_conatiner'] . ' ' . $sr_id . ' ' . $sr_class  . ' ' . $sr_attr . '>' . esc_html__( $sr_text ) . '</' . $this->args['sr_conatiner'] . '>';
		        switch( $this->type ) {
		        	case 'split':
						echo '<' . $this->args['split_container'] . ' ' . $split_container_id . ' ' . $split_container_class  . ' ' . $split_container_attr . '>';
							if( get_previous_posts_link() ) :
								echo '<' . $this->args['prev_container'] . ' ' . $prev_container_id . ' ' . $prev_container_class  . ' ' . $prev_container_attr . '>';
									previous_posts_link( esc_html__( $prelabel ) );
								echo '</' . $this->args['prev_container'] . '>';
							endif;
							if( get_next_posts_link() ) :
								echo '<' . $this->args['next_container'] . ' ' . $next_container_id . ' ' . $next_container_class  . ' ' . $next_container_attr . '>';
									next_posts_link( esc_html__( $nextlabel ) );
								echo '</' . $this->args['next_container'] . '>';
							endif;
						echo '</' . $this->args['split_container'] . '>';
		        	break;
		        	case 'numbered':
		        		if( function_exists( 'wp_pagenavi' ) ) {
		        			wp_pagenavi();
		        		} else {
		        			echo paginate_links( $this->args );
		        		}
		        	break;
		        	case 'default':
		        	default:
		        		echo '<' . $this->args['default_container'] . ' ' . $default_container_id . ' ' . $default_container_class  . ' ' . $default_container_attr . '>';
		        			posts_nav_link( esc_html__( $prelabel ), esc_html__( $prelabel ), esc_html__( $nextlabel ) );
		        		echo '</' . $this->args['default_container'] . '>';
		        	break;
		        }
	        echo '</' . $this->args['container'] . '>';
		}

		/**
		 * Filter for previous_posts_link
		 *
		 * @since 0.0.1
         * @access public
         * @return string the filterd content
		 */
		public function previous_posts_link_filter() {
			$aria_prev = ( !empty( $this->args['aria_prev'] ) ? 'aria-label="' . $this->args['aria_prev'] . '"' : "" );
			$attr = $aria_prev;
			return $attr;
		}

		/**
		 * Filter for next_posts_link
		 *
		 * @since 0.0.1
         * @access public
         * @return string the filterd content
		 */
		public function next_posts_link_filter() {
			$aria_next = ( !empty( $this->args['aria_next'] ) ? 'aria-label="' . $this->args['aria_next'] . '"' : "" );
			$attr = $aria_next;
			return $attr;
		}

		/**
		 * Load required JavaScript
		 *
		 * @since 0.0.1
         * @access public
         * @return void
		 */
		public function load_public_js() {
			wp_register_script( 'fcwp-pagi.js', FCWP_PL_PLUGIN_URL . 'includes/js/pagination.js',  array( 'jquery' ), FCWP_PL_VERSION, true );
	    	wp_enqueue_script( 'fcwp-pagi.js' );
		}
	}
}