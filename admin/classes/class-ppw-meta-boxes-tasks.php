<?php
/**
 * Tasks Meta Boxes
 *
 * @package    PPW
 * @subpackage PPW/Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Meta_Boxes_Tasks' ) ) {
	class PPW_Meta_Boxes_Tasks {

		/**
		 * Initialize the class
		 *
		 * @since 0.0.1
		 */
		public function __construct() {
			add_action( 'cmb2_init', array( $this, 'tasks_details_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'tasks_assign_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'tasks_todo_meta_boxes' ) );
			add_action( 'cmb2_init', array( $this, 'tasks_projects_meta_boxes' ) );
			add_action( 'enter_title_here', array( $this, 'title_placehlder' ) );
			add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
			add_action( 'post_submitbox_misc_actions', array( $this, 'move_author_meta_box' ) );
		} // end __construct

		/**
		 * Tasks details meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function tasks_details_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'tasks_details',
				'title'        => __( 'Task Details', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_tasks' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'       => 'Details',
			    'id'         => PPW_PREFIX . 'tasks_detail',
			    'type'       => 'wysiwyg',
			    'show_names' => false
			) );
		} // end tasks_details_meta_boxes

		/**
		 * Taske assign meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function tasks_assign_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'tasks_assign',
				'title'        => __( 'Assign Task', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_tasks' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'    => 'Assign to:',
			    'id'      => PPW_PREFIX . 'assigned',
			    'type'    => 'multiselect',
			    'row_classes' => 'select-default',
			    'options' => array( $this, 'get_users' ),
			) );
		} // end tasks_assign_meta_boxes

		/**
		 * Taske projects meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function tasks_projects_meta_boxes() {
			$fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'tasks_projects',
				'title'        => __( 'Project', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_tasks' ),
				'context'      => 'side',
				'priority'     => 'default',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$fields->add_field( array(
				'name'             => __( 'Select Project:', PPW_TEXTDOMAIN ),
				'desc'             => __( 'This field is required', PPW_TEXTDOMAIN ),
			    'id'               => PPW_PREFIX . 'tasks_project',
			    'type'             => 'select',
			    'show_option_none' => true,
			    'options'          => array( $this, 'get_projects' ),
			    'attributes'       => array(
			        'required' => 'required',
			    ),
			) );
		} // end tasks_project_meta_boxes

		/**
		 * Taske todo meta boxes
		 *
		 * @since      0.0.1
		 * @return     void
		 */
		public function tasks_todo_meta_boxes() {
			$group_fields = new_cmb2_box( array(
				'id'           => PPW_PREFIX . 'tasks_todos',
				'title'        => __( 'TODO', PPW_TEXTDOMAIN ),
				'object_types' => array( 'ppw_tasks' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true,
				'cmb_styles'   => false
			) );
			$group_field_id = $group_fields->add_field( array(
				'id'          => PPW_PREFIX . 'tasks_todo_list',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'TODO {#}', PPW_TEXTDOMAIN ),
					'add_button'    => __( 'Add TODO', PPW_TEXTDOMAIN ),
					'remove_button' => __( 'Remove TODO', PPW_TEXTDOMAIN ),
					'sortable'      => false,
				),
			) );
			$group_fields->add_group_field( $group_field_id, array(
				'name'        => __( 'Completed', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . 'tasks_todo',
			    'type'        => 'checkbox',
			    'row_classes' => 'ppw-half-field ppw-padding-right'
			) );

			$group_fields->add_group_field( $group_field_id, array(
				'name'        => __( 'TODO Item', PPW_TEXTDOMAIN ),
				'id'          => PPW_PREFIX . 'tasks_todo_item',
				'type'        => 'text',
				'row_classes' => 'ppw-half-field'
			) );
		} // end tasks_todo_meta_boxes

		/**
		 * Get Projects
		 *
		 * @since      0.0.1
		 * @return     array $projects the lise of projects
		 */
		public function get_projects( $query_args ) {
			$args = wp_parse_args( $query_args, array(
		        'post_type'   => 'post',
		        'numberposts' => 10,
		    ) );
		    $projects = get_posts( $args );
		    $projects_list = array();
		    if ( $projects ) {
		        foreach ( $projects as $project ) {
		          $projects_list[ $project->ID ] = $project->post_title;
		        }
		    }
    		return $projects_list;
		} // end get_users

		/**
		 * Get Users
		 *
		 * @since      0.0.1
		 * @return     array $users the lise of users
		 */
		public function get_users() {
			$managers = get_users( array( 'role' => 'project-manager' ) );
			$co_workers = get_users( array( 'role' => 'co-worker' ) );
			$admins = get_users( array( 'role' => 'administrator' ) );
			$users = array_merge( $managers, $co_workers, $admins );
			$list = array();
			foreach( $users as $user ) {
				$list[$user->ID] = $user->user_nicename; 
			}
			return $list;
		} // end get_users

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
		    if ( 'ppw_tasks' == $screen->post_type ){
		        $title = 'Task';
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
			remove_meta_box( 'commentstatusdiv', 'ppw_tasks', 'side' );
			remove_meta_box( 'authordiv', 'ppw_tasks', 'normal' );
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
		    if ( 'ppw_tasks' == $screen->post_type ){
		    	echo '<div class="misc-pub-section">Author: ';
		    	post_author_meta_box( $post );
		    	echo '</div>';
			}
		} // end move_author_meta_box
	}
} // end PPW_Meta_Boxes_Tasks