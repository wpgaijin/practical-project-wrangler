<?php
/**
 * Clients Billing Metabox
 *
 * @package    PPW
 * @subpackage Admin/Classes
 * @since      0.0.1
 */

if( !class_exists( 'PPW_Metabox_Clients_Billing' ) ) {
  class PPW_Metabox_Clients_Billing {
    /**
     * Metabox ID
     *
     * @since  0.0.1
     * @var    string $id the ID for the metabox
     */
    protected $id;
    /**
     * Name
     *
     * @since  0.0.1
     * @var    string the title of the metabox
     */
    protected $name;
    /**
     * The Post Type
     *
     * @since  0.0.1
     * @var    string $post_type the post type to add the metabox
     */
    protected $post_type;
    /**
     * Context
     *
     * @since  0.0.1
     * @var    string $context section of the page the metabox is placed
     */
    protected $context;
    /**
     * Priority
     *
     * @since  0.0.1
     * @var    string $context the order within the section to place the metabox
     */
    protected $priority;
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct() {
      $this->id        = apply_filters( 'ppw_metabox_clients_billing_id', PPW_PREFIX . '_clients_billing_info' );
      $this->name      = apply_filters( 'ppw_metabox_clients_billing_name', 'Billing Information' );
      $this->post_type = apply_filters( 'ppw_metabox_clients_billing_post_type', 'ppw_clients' );
      $this->context   = apply_filters( 'ppw_metabox_clients_billing_context', 'normal' );
      $this->priority  = apply_filters( 'ppw_metabox_clients_billing_priority', 'high' );
      add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
      add_action( 'save_post', array( $this, 'save' ) );
    } // end __construct
    /**
     * Add Metabox
     *
     * @since      0.0.1
     * @uses       add_meta_box() wp-admin/includes/template.php
     * @uses       apply_filters() wp-includes/plugin.php
     * @return     void
     */
    public function add_metabox() {
      add_meta_box(
        $this->id,
        __( $this->name, PPW_TEXTDOMAIN ),
        array( $this, 'render_fields' ),
        $this->post_type,
        $this->context,
        $this->priority
      );
    } // end add_metabox
    /**
     * Fields
     *
     * @since      [version]
     * @access     private
     * @return     array $fields the list of metabox fields
     */
    public function fields() {
      $fields = array(
        PPW_PREFIX . '_clients_billing_different',
        PPW_PREFIX . '_clients_billing_company_name',
        PPW_PREFIX . '_clients_billing_address',
        PPW_PREFIX . '_clients_billing_city',
        PPW_PREFIX . '_clients_billing_state',
        PPW_PREFIX . '_clients_billing_zip',
        PPW_PREFIX . '_clients_billing_phone',
        PPW_PREFIX . '_clients_billing_email',
      );
      return apply_filters( 'ppw_clients_billing_fields', $fields );
    } // end fields
    /**
     * Render Fields
     *
     * @since      0.0.1
     * @return     [type] [description]
     */
    public function render_fields( $post ) {
      $ppw_mb_field_clients_billing_different_wrapper_classes = apply_filters( 'ppw_mb_field_clients_billing_different_wrapper_classes', array( 'ppw__fields', 'ppw__fields--checkbox' ) );
      $ppw_mb_field_clients_billing_company_name_classes      = apply_filters( 'ppw_mb_field_clients_billing_company_name_classes', array( 'ppw__fields', 'ppw__fields--text' ) );
      $ppw_mb_field_clients_billing_address_wrapper_classes   = apply_filters( 'ppw_mb_field_clients_billing_address_wrapper_classes', array( 'ppw__fields', 'ppw__fields--text', 'ppw__fields--one-third' ) );
      $ppw_mb_field_clients_billing_city_wrapper_classes      = apply_filters( 'ppw_mb_field_clients_billing_city_wrapper_classes', array( 'ppw__fields', 'ppw__fields--text', 'ppw__fields--one-third' ) );
      $ppw_mb_field_clients_billing_state_wrapper_classes     = apply_filters( 'ppw_mb_field_clients_billing_state_wrapper_classes', array( 'ppw__fields', 'ppw__fields--select', 'ppw__fields--one-third ppw__row-last' ) );
      $ppw_mb_field_clients_billing_zip_code_wrapper_classes  = apply_filters( 'ppw_mb_field_clients_billing_zip_code_wrapper_classes', array( 'ppw__fields', 'ppw__fields--text', 'ppw__fields--one-third' ) );
      $ppw_mb_field_clients_billing_phone_wrapper_classes     = apply_filters( 'ppw_mb_field_clients_billing_phone_wrapper_classes', array( 'ppw__fields', 'ppw__fields--text', 'ppw__fields--one-third' ) );
      $ppw_mb_field_clients_billing_email_wrapper_classes     = apply_filters( 'ppw_mb_field_clients_billing_email_wrapper_classes', array( 'ppw__fields', 'ppw__fields--text', 'ppw__fields--one-third ppw__row-last' ) );
      wp_nonce_field( basename( __FILE__ ), PPW_PREFIX . '_clients_billing_general_nonce' );
      ?>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_different_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-different' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_company_name_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-company-name' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_address_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-address' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_city_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-city' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_state_wrapper_classes ); ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-state' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_zip_code_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-zip-code' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_phone_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-pww-clients-billing-phone-number' ); ?>
      </div>
      <div <?php echo ppw_get_attribute( 'class', $ppw_mb_field_clients_billing_email_wrapper_classes ) ?>>
        <?php ppw_get_plugin_part( 'includes/form-fields/clients-billing/field-ppw-clients-billing-email' ); ?>
      </div>
      <?php 
    } // end render_fields
    /**
     * Save
     *
     * Save the metabox fields
     *
     * @since      0.0.1
     * @uses       [function]
     * @param      int $post_id the post's ID
     * @return     void
     */
    public function save( $post_id  ) {
      $fields = $this->fields();
      $nonce = PPW_PREFIX . '_clients_billing_nonce';
      if ( !isset( $_POST[$nonce] ) || !wp_verify_nonce( $_POST[$nonce], basename( __FILE__ ) ) ) {
        return;
      }
      if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_AJAX') && DOING_AJAX ) || isset( $_REQUEST['bulk_edit'] ) ) {
        return;
      }
      if ( isset( $post->post_type ) && 'revision' == $post->post_type ) {
        return;
      }
      if ( !current_user_can( 'edit_post', $post_id ) ) {
        return;
      }
      foreach( $fields as $field ) {
        if ( !empty( $_POST[ $field ] ) ) {
          $new = apply_filters( 'ppw_mb_clients_billing_save_' . $field, sanitize_text_field( $_POST[ $field ] ) );
          update_post_meta( $post_id, $field, $new );
        } else {
          delete_post_meta( $post_id, $field );
        }
      }
      do_action( 'ppw_save_clients_billing', $post_id, $post );
    } // end save
  }
} // end PPW_Metabox_Clients_Billing