<?php
/**
 * Get Project User Avatars
 *
 * Get the avatars of the users assinged to the project
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Project_User_Avatar' ) ) {
  class PPW_Helper_Get_Project_User_Avatar {
    /**
     * The project clients
     *
     * @since  0.0.1
     * @var    array the clients assigned to the project
     */
    protected $project_clients;
    /**
     * The project users
     *
     * @since  0.0.1
     * @var    array the users assigned to the project
     */
    protected $project_assigned;
    /**
     * Initialize the class
     *
     * @since 0.0.1
     * @param      array $project_clients the client assigned to the project
     * @param      array $project_assigned the users assigned to the project
     */
    public function __construct( $project_clients, $project_assigned ) {
      $this->project_clients = $project_clients;
      $this->project_assigned = $project_assigned;
    }
    /**
     * Get the Avatar
     *
     * @todo  this can be better structured
     *
     * @since      0.0.1
     * @uses       get_users() wp-includes/user.php
     * @uses       get_user_meta() wp-includes/user.php
     * @uses       wp_get_attachment_image() wp-includes/media.php
     * @uses       get_avatar() wp-includes/pluggable.php
     * @return     string $html the outputed HTML
     */
    public function get_project_user_avatar() {
      $html               = '';
      $client_users       = get_users( apply_filters( 'ppw_client_roles_avatars', array( 'role' => 'client' ) ) );
      $the_project_client = ( $this->project_clients ? $this->project_clients[0] : '' );
      $avatar_classes     = apply_filters( 'ppw_avatar_classes', 'ppw__user-avatars--assigned' );
      $avatar_size        = apply_filters( 'ppw_avatar_size', '70' );
      // get the client users
      if( $this->project_clients ) {
        foreach ( $client_users as $client_user ) {
          $with_client = get_user_meta( $client_user->ID, PPW_PREFIX . '_users_client', true );
          if( $with_client == $the_project_client ) {
            $client_image     = wp_get_attachment_image( get_user_meta( $with_client, PPW_PREFIX . '_avatar_image', true ) );
            $client_image     = get_user_meta( $with_client, PPW_PREFIX . '_avatar_image', true );
            $client_image_id  = self::get_id_from_url( $client_image );
            $the_client_image = wp_get_attachment_image( $client_image_id, array( esc_html( $avatar_size ), esc_html( $avatar_size ) ) );
            if( $client_image ) {
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $avatar_classes ) ) . '>' . $the_client_image . '</div>';
            } else {
              $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $avatar_classes ) ) . '>' . get_avatar( $with_client, esc_html( $avatar_size ) ) . '</div>';
            }
          }
        } 
      }
      // get the employee users
      $admin_user_args = array(
        'role' => 'administrator'
      );
      $admins = get_users( $admin_user_args );
      $pm_user_args = array(
        'role' => 'project-manager'
      );
      $pms = get_users( $pm_user_args );
      $co_user_args = array(
        'role' => 'co-worker'
      );
      $cos                  = get_users( $co_user_args );
      $emps                 = array_merge($admins, $pms, $cos );
      $the_project_assigned = ( $this->project_assigned ? $this->project_assigned : '' );
      if( $the_project_assigned ) {
        foreach( $the_project_assigned as $key => $value ) {
          foreach ( $emps as $emp ) {
            if( $emp->ID == $value ) {
              $user_image     = get_user_meta( $emp->ID, PPW_PREFIX . '_avatar_image', true );
              $user_image_id  = self::get_id_from_url( $user_image );
              $the_user_image = wp_get_attachment_image( $user_image_id, array( esc_html( $avatar_size ), esc_html( $avatar_size ) ) );
              if( $user_image ) {
                $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $avatar_classes ) ) . '>' . $the_user_image . '</div>';
              } else {
                $html .= '<div ' . ppw_get_attribute( 'class', esc_attr( $avatar_classes ) ) . '>' . get_avatar( $emp->ID, esc_html( $avatar_size ) ) . '</div>';
              }
            }
          }
        }
      }
      return $html;
    } // end get_the_avatar
    /**
     * Get Image ID from URL
     *
     * @since      0.0.1
     * @uses       wp_upload_dir() wp-includes/functions.php
     * @uses       $wpdb->get_var() wp-includes/wp-db.php
     * @uses       $wpdb->prepare() wp-includes/wp-db.php
     * @global     $wpdb the WordPress database global
     * @param      $attatment_url the image url
     * @return     int the image ID
     */
    public static function get_id_from_url( $attachment_url ) {
      global $wpdb;
      $attachment_id = false;
      if ( '' == $attachment_url ) {
        return;
      }
      // Get the upload directory paths
      $upload_dir_paths = wp_upload_dir();
      if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
        // If get the URL of the original image
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
        // Remove the upload path base directory from the attachment URL
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
        // Get the attachment ID from the modified attachment URL
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID 
                                  FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta 
                                  WHERE wposts.ID = wpostmeta.post_id 
                                  AND wpostmeta.meta_key = '_wp_attached_file' 
                                  AND wpostmeta.meta_value = '%s' 
                                  AND wposts.post_type = 'attachment'", 
                                  $attachment_url ) );
     
      }
      return $attachment_id;
    } // end get_id_from_url
  }
} // end PPW_Helper_Get_Project_User_Avatar
/**
 * Get Project User Avatars template function
 *
 * @since      0.0.1
 * @param      array $project_clients the client assigned to the project
 * @param      array $project_assigned the users assigned to the project
 */
if( !function_exists( 'ppw_get_project_user_avatar' ) ) {
  function ppw_get_project_user_avatar( $project_clients, $project_assigned ) {
    $get_project_user_avater = new PPW_Helper_Get_Project_User_Avatar( $project_clients, $project_assigned );
    return $get_project_user_avater->get_project_user_avatar();
  }
} // end ppw_get_project_user_avatar