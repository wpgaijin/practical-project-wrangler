<?php
$ppw_field_clients_billing_company_name_text_field_classes = apply_filters( 'ppw_field_clients_billing_company_name_text_field_classes', array( 'ppw__text' ) );
$ppw_field_clients_billing_company_name_th_classes         = apply_filters( 'ppw_field_clients_billing_company_name_th_classes', array( 'ppw__th' ) );
$ppw_field_clients_billing_company_name_td_classes         = apply_filters( 'ppw_field_clients_billing_company_name_td_classes', array( 'ppw__td' ) );
$ppw_clients_billing_company_name                          = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_billing_company_name', true );
$ppw_clients_billing_company_name_value                    = isset( $ppw_clients_billing_company_name ) ? $ppw_clients_billing_company_name : '' ;
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_company_name_th_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_billing_company_name"><?php _e( 'Company Name', PPW_TEXTDOMAIN ); ?></lable>
</div>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_company_name_td_classes ) ?>>
  <input type="text" <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_company_name_text_field_classes ) ?> name="<?php echo PPW_PREFIX; ?>_clients_billing_company_name" id="<?php echo PPW_PREFIX; ?>_clients_billing_company_name" value="<?php echo $ppw_clients_billing_company_name_value; ?>">
</div>