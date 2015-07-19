<?php
$ppw_field_clients_billing_phone_text_field_classes = apply_filters( 'ppw_field_clients_billing_phone_text_field_classes', array( 'ppw__text' ) );
$ppw_field_clients_billing_phone_th_classes         = apply_filters( 'ppw_field_clients_billing_phone_th_classes', array( 'ppw__th' ) );
$ppw_field_clients_billing_phone_td_classes         = apply_filters( 'ppw_field_clients_billing_phone_td_classes', array( 'ppw__td' ) );
$ppw_clients_billing_phone                          = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_billing_phone', true );
$ppw_clients_billing_phone_value                    = isset( $ppw_clients_billing_phone ) ? $ppw_clients_billing_phone : '' ;
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_phone_th_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_billing_phone"><?php _e( 'Phone Number', PPW_TEXTDOMAIN ); ?></lable>
</div>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_phone_td_classes ) ?>>
  <input type="text" <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_phone_text_field_classes ) ?> name="<?php echo PPW_PREFIX; ?>_clients_billing_phone" id="<?php echo PPW_PREFIX; ?>_clients_billing_phone" value="<?php echo $ppw_clients_billing_phone_value; ?>">
</div>