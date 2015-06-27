<?php
/**
 * Get Manager Users
 *
 * Get non client users
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Get_Manager_Users' ) ) {
	class PPW_Get_Manager_Users {

		/**
		 * Get the users
		 *
		 * @since      0.0.1
		 * @return     array $list the user names and ID's
		 */
		public static function init() {
			$managers = get_users( array( 'role' => 'project-manager' ) );
			$co_workers = get_users( array( 'role' => 'co-worker' ) );
			$admins = get_users( array( 'role' => 'administrator' ) );
			$users = array_merge( $managers, $co_workers, $admins );
			$list = array();
			foreach( $users as $user ) {
				$list[$user->ID] = $user->user_nicename; 
			}
			return $list;
		} // end init

	}
} // end PPW_Get_Manager_Users