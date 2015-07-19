<?php
$ppw_field_clients_billing_different_checkbox_classes = apply_filters( 'ppw_field_clients_billing_different_checkbox_classes', array( 'ppw__text' ) );
$ppw_field_clients_billing_different_td_classes        = apply_filters( 'ppw_field_clients_billing_different_td_classes', array( 'ppw__td' ) );
$ppw_clients_billing_different                         = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_billing_different', true );
$ppw_clients_billing_different_value                   = isset( $ppw_clients_billing_different ) ? $ppw_clients_billing_different : 'off' ;
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_different_td_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_billing_different">
  <input type="checkbox" name="<?php echo PPW_PREFIX; ?>_clients_billing_different" id="<?php echo PPW_PREFIX; ?>_clients_billing_different" value="on" <?php checked( $ppw_clients_billing_different_value, 'on' ); ?> />
  <?php _e( 'Billing Address is Different', PPW_TEXTDOMAIN ); ?>
  </lable>
</div>