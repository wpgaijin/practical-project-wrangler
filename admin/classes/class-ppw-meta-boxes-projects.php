<?php
/**
 * Projects Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Projects' ) ) {
	class PPW_Meta_Boxes_Projects {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'projects_category_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_milestone_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_client_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_assign_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_description_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_files_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'projects_status_meta_boxes' ) );
			add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
			add_action( 'post_submitbox_misc_actions', array( $this, 'move_author_meta_box' ) );
		} // end __construct

		/**
		 * Project Status meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_status_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_projects_status',
				'title'        => __( 'Project Status', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'        => 'Status',
				'id'          => PPW_PREFIX . '_the_project_status',
				'type'        => 'select',
				'default'     => 'active',
				'options'     => array(
						'active'   => 'Active',
						'closed'   => 'Closed',
						'archived' => 'Archived'
					)
			) );
		} // end projects_status_meta_boxes

		/**
		 * Project assign meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_assign_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_projects_assign',
				'title'        => __( 'Assign Project', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'        => 'Assign to:',
				'id'          => PPW_PREFIX . '_assigned',
				'type'        => 'multiselect',
				'row_classes' => 'select-default',
				'options'     => ppw_get_manager_users(),
			) );
		} // end projects_assign_meta_boxes

		/**
		 * Project client meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_client_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_projects_clients',
				'title'        => __( 'Client', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => false,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'             => __( 'Assign Client', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_projects_client',
				'type'             => 'search',
				'show_option_none' => true,
				'default'          => ' ',
				'options'          => ppw_get_active_clients(),
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
		} // end projects_client_meta_boxes

		/**
		 * Project category meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function projects_category_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . '_projects_categories',
				'title'        => __( 'Project Categories', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'             => __( 'Category', PPW_TEXTDOMAIN ),
				'id'               => PPW_PREFIX . '_projects_category',
				'type'             => 'multiselect',
				'show_option_none' => true,
				'row_classes'      => 'ppw-half-field ppw-padding-right',
				'options'          => $this->get_terms( 'ppw_projects_categories' )
			) );
			$fields->add_field( array(
				'name'              => __( 'Sub Category', PPW_TEXTDOMAIN ),
				'id'                => PPW_PREFIX . '_projects_sub_category',
				'type'              => 'multiselect',
				'show_option_none'  => true,
				'row_classes'       => 'ppw-half-field ppw-padding-right',
				'options'           => $this->get_terms( 'ppw_projects_sub_categories' )
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
				'id'           => PPW_PREFIX . '_projects_milestone',
				'title'        => __( 'Project Milestone', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Project\'s Start Date', PPW_TEXTDOMAIN ),
				'desc'       => __( 'This field is required', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_date_start',
				'type'       => 'text_date',
				'attributes' => array(
			        'required' => 'required',
			    )
			) );
			$fields->add_field( array(
				'name'       => __( 'Project\'s Completion Date', PPW_TEXTDOMAIN ),
				'desc'       => __( 'This field is required', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_date_end',
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
				'id'           => PPW_PREFIX . '_projects_description',
				'title'        => __( 'Project Description', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => __( 'Porject\'s Description', PPW_TEXTDOMAIN ),
				'id'         => PPW_PREFIX . '_projects_desc',
				'type'       => 'wysiwyg',
				'show_names' => false,
				'options'    => array(
						'wpautop'       => true,
						'textarea_rows' => get_option('default_post_edit_rows', 10),
					)
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
				'id'           => PPW_PREFIX . '_projects_files',
				'title'        => __( 'Project Files', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_projects' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'         => __( 'File', PPW_TEXTDOMAIN ),
				'id'           => PPW_PREFIX . '_projects_file',
				'type'         => 'file_list'
			) );
		} // end projects_files_meta_boxes

		/**
		 * Get Terms
		 *
		 * @since      0.0.1
		 * @param      string $terms the taxominy term
		 * @return     array the array of term names and IDs
		 */
		public function get_terms( $terms ) {
			$terms = get_terms( $terms, array( 'hide_empty' => false ) );
			$array = array();
			foreach( $terms as $term ) {
				$array[$term->term_id] = $term->name;
			}
			return $array;
		} // end get_terms

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
} // end PPW_Meta_Boxes_Projects