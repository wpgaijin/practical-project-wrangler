<?php
$ppw_field_clients_url_text_field_classes = apply_filters( 'ppw_field_clients_url_text_field_classes', array( 'ppw__text' ) );
$ppw_field_clients_url_th_classes         = apply_filters( 'ppw_field_clients_url_th_classes', array( 'ppw__th' ) );
$ppw_field_clients_url_td_classes         = apply_filters( 'ppw_field_clients_url_td_classes', array( 'ppw__td' ) );
$ppw_clients_url                          = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_url', true );
$ppw_clients_url_value                    = isset( $ppw_clients_url ) ? $ppw_clients_url : '' ;
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_url_th_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_url"><?php _e( 'Website URL', PPW_TEXTDOMAIN ); ?></lable>
</div>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_url_td_classes ) ?>>
  <input type="text" <?php echo ppw_get_attribute( 'class', $ppw_field_clients_url_text_field_classes ) ?> name="<?php echo PPW_PREFIX; ?>_clients_url" id="<?php echo PPW_PREFIX; ?>_clients_url" value="<?php echo $ppw_clients_url_value; ?>">
</div>