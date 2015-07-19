<?php
$ppw_field_clients_billing_zip_text_field_classes = apply_filters( 'ppw_field_clients_billing_zip_text_field_classes', array( 'ppw__text' ) );
$ppw_field_clients_billing_zip_th_classes         = apply_filters( 'ppw_field_clients_billing_zip_th_classes', array( 'ppw__th' ) );
$ppw_field_clients_billing_zip_td_classes         = apply_filters( 'ppw_field_clients_billing_zip_td_classes', array( 'ppw__td' ) );
$ppw_clients_billing_zip                        = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_billing_zip', true );
$ppw_clients_billing_zip_value                    = isset( $ppw_clients_billing_zip ) ? $ppw_clients_billing_zip : '' ;
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_zip_th_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_billing_zip"><?php _e( 'Zip Code', PPW_TEXTDOMAIN ); ?></lable>
</div>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_zip_td_classes ) ?>>
  <input type="text" <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_zip_text_field_classes ) ?> name="<?php echo PPW_PREFIX; ?>_clients_billing_zip" id="<?php echo PPW_PREFIX; ?>_clients_billing_zip" value="<?php echo $ppw_clients_billing_zip_value; ?>">
</div>