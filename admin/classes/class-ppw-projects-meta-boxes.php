<?php
/**
 * Projects Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Projects_Meta_Boxes' ) ) {
	class PPW_Projects_Meta_Boxes {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'projects_category_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_milestone_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_description_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_files_meta_boxes' ) );
			add_action( 'enter_title_here', array( $this, 'title_placehlder' ) );
			add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
			add_action( 'post_submitbox_misc_actions', array( $this, 'move_author_meta_box' ) );
		} // end __construct

		/**
		 * Project category meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_category_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'projects_categories',
				'title'        => __( 'Project Categories', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'             => __( 'Category', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . 'projects_category',
				'taxonomy'         => 'ppw_projects_categories',
				'type'             => 'taxonomy_select',
				'show_option_none' => true,
				'row_classes'      => ''
			) );
			$fields->add_field( array(
				'name'              => __( 'Sub Category', PPW_TEXTDOMAIN ),
				'id'                => PPW_PREFIX . 'projects_sub_category',
				'taxonomy'          => 'ppw_projects_sub_categories',
				'type'              => 'taxonomy_multicheck',
				'show_option_none'  => true,
				'row_classes'       => 'ppw-hide',
				'select_all_button' => false
			) );
		} // end projects_category_meta_boxes

		/**
		 * Project milestone meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_milestone_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'projects_milestone',
				'title'        => __( 'Project Milestone', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Porject\'s Completion Date', PPW_TEXTDOMAIN ),
				'desc'       => __( 'This field is required', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . 'projects_milestone_date',
				'type'       => 'text_date',
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
		} // end projects_milestone_meta_boxes

		/**
		 * Project description meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_description_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'projects_description',
				'title'        => __( 'Project Description', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Porject\'s Description', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . 'projects_desc',
				'type'       => 'wysiwyg',
				'show_names' => false
			) );
		} // end projects_description_meta_boxes

		/**
		 * Project files meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_files_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'projects_files',
				'title'        => __( 'Project Files', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'         => __( 'File', PPW_TEXTDOMAIN ),
				'id'           => PPW_PREFIX . 'projects_file',
				'type'         => 'file_list'
			) );
		} // end projects_files_meta_boxes

		/**
		 * Title placeholder
		 *
		 * Chage the default title placeholder
		 *
		 * @since      0.0.1
		 * @param      string $title the placeholder text
		 * @return     strinf the new placeholder text
		 */
		public function title_placehlder() {
			$screen = get_current_screen();
		    if ( 'ppw_projects' == $screen->post_type ){
		        $title = 'Projects\'s Name';
		    } else {
		    	$title = 'Enter title here';
		    }
		    return $title;
		} // end title_placehlder

		/**
		 * Remove meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function remove_meta_boxes() {
			remove_meta_box( 'ppw_projects_categoriesdiv', 'ppw_projects', 'side' );
			remove_meta_box( 'ppw_projects_sub_categoriesdiv', 'ppw_projects', 'side' );
			remove_meta_box( 'commentstatusdiv', 'ppw_projects', 'normal' );
			remove_meta_box( 'authordiv', 'ppw_projects', 'normal' );
		} // end remove_meta_boxes

		/**
		 * Move Author box
		 *
		 * Move the author box into the publish meta box
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function move_author_meta_box() {
			global $post_ID;
		    $post = get_post( $post_ID );
		    $screen = get_current_screen();
		    if ( 'ppw_projects' == $screen->post_type ){
		    	echo '<div class="misc-pub-section">Author: ';
		    	post_author_meta_box( $post );
		    	echo '</div>';
			}
		} // end move_author_meta_box
	}
} // end PPW_Projects_Meta_Boxes