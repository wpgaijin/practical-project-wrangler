<?php
/**
 * Get Manager Users
 *
 * Get all employee users
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Employee_Users' ) ) {
  class PPW_Helper_Get_Employee_Users {
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {}
    /**
     * Get the users
     *
     * @since      0.0.1
     * @uses       get_users() wp-includes/user.php
     * @return     array $list the user names and ID's
     */
    public function get_employee_users() {
      $managers   = get_users( array( 'role' => 'project-manager' ) );
      $co_workers = get_users( array( 'role' => 'co-worker' ) );
      $admins     = get_users( array( 'role' => 'administrator' ) );
      $users      = array_merge( $managers, $co_workers, $admins );
      $list       = array();
      foreach( $users as $user ) {
        $list[$user->ID] = $user->user_nicename; 
      }
      return $list;
    } // end init
  }
} // end PPW_Helper_Get_Employee_Users
/**
 * Get Manager Users
 *
 * @since      0.0.1
 * @return     array $list the user names and ID's
 */
if( !function_exists( 'ppw_get_manager_users' ) ) {
  function ppw_get_manager_users() {
    $ppw_helper_get_employees = new PPW_Helper_Get_Employee_Users();
    return $ppw_helper_get_employees->get_employee_users();
  }
} // end ppw_get_manager_users