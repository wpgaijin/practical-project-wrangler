<?php
$ppw_field_clients_billing_state_select_field_classes = apply_filters( 'ppw_field_clients_billing_state_select_field_classes', array( 'ppw__select' ) );
$ppw_field_clients_billing_state_th_classes           = apply_filters( 'ppw_field_clients_billing_state_th_classes', array( 'ppw__th' ) );
$ppw_field_clients_billing_state_td_classes           = apply_filters( 'ppw_field_clients_billing_state_td_classes', array( 'ppw__td' ) );
$ppw_clients_billing_state                            = get_post_meta( get_the_ID(), PPW_PREFIX . '_clients_billing_state', true );
$ppw_clients_billing_state_value                      = isset( $ppw_clients_billing_state ) ? $ppw_clients_billing_state : '' ;
$states                                       = array(
                                                'AL'     => __( 'Alabama', PPW_TEXTDOMAIN ),
                                                'AK'     => __( 'Alaska', PPW_TEXTDOMAIN ),
                                                'AS'     => __( 'American Samoa', PPW_TEXTDOMAIN ),
                                                'AZ'     => __( 'Arizona', PPW_TEXTDOMAIN ),
                                                'AR'     => __( 'Arkansas', PPW_TEXTDOMAIN ),
                                                'CA'     => __( 'California', PPW_TEXTDOMAIN ),
                                                'CO'     => __( 'Colorado', PPW_TEXTDOMAIN ),
                                                'CT'     => __( 'Connecticut', PPW_TEXTDOMAIN ),
                                                'DE'     => __( 'Delaware', PPW_TEXTDOMAIN ),
                                                'DC'     => __( 'District of Columbia', PPW_TEXTDOMAIN ),
                                                'FM_Fed' => __( 'Federated States of Microneisa', PPW_TEXTDOMAIN ),
                                                'FL'     => __( 'Florida', PPW_TEXTDOMAIN ),
                                                'GA'     => __( 'Georgia', PPW_TEXTDOMAIN ),
                                                'GU'     => __( 'Guam', PPW_TEXTDOMAIN ),
                                                'HI'     => __( 'Hawaii', PPW_TEXTDOMAIN ),
                                                'ID'     => __( 'Idaho', PPW_TEXTDOMAIN ),
                                                'IL'     => __( 'Illinois', PPW_TEXTDOMAIN ),
                                                'IN'     => __( 'Indiana', PPW_TEXTDOMAIN ),
                                                'IA'     => __( 'Iowa', PPW_TEXTDOMAIN ),
                                                'KS'     => __( 'Kansas', PPW_TEXTDOMAIN ),
                                                'KY'     => __( 'Kentucky', PPW_TEXTDOMAIN ),
                                                'LA'     => __( 'Louisiana', PPW_TEXTDOMAIN ),
                                                'ME'     => __( 'Maine', PPW_TEXTDOMAIN ),
                                                'MH'     => __( 'Marshall Islands', PPW_TEXTDOMAIN ),
                                                'MD'     => __( 'Maryland', PPW_TEXTDOMAIN ),
                                                'MA'     => __( 'Massachusetts', PPW_TEXTDOMAIN ),
                                                'MI'     => __( 'Michigan', PPW_TEXTDOMAIN ),
                                                'MN'     => __( 'Minnesota', PPW_TEXTDOMAIN ),
                                                'MS'     => __( 'Mississippi', PPW_TEXTDOMAIN ),
                                                'MO'     => __( 'Missouri', PPW_TEXTDOMAIN ),
                                                'MT'     => __( 'Montana', PPW_TEXTDOMAIN ),
                                                'NE'     => __( 'Nebraska', PPW_TEXTDOMAIN ),
                                                'NE'     => __( 'Nevada', PPW_TEXTDOMAIN ),
                                                'NH'     => __( 'New Hampshire', PPW_TEXTDOMAIN ),
                                                'NJ'     => __( 'New Jersey', PPW_TEXTDOMAIN ),
                                                'NM'     => __( 'New Mexico', PPW_TEXTDOMAIN ),
                                                'NY'     => __( 'New York', PPW_TEXTDOMAIN ),
                                                'NC'     => __( 'North Carolina', PPW_TEXTDOMAIN ),
                                                'ND'     => __( 'North Dakota', PPW_TEXTDOMAIN ),
                                                'MP'     => __( 'Northeren Marina Islands', PPW_TEXTDOMAIN ),
                                                'OH'     => __( 'Ohio', PPW_TEXTDOMAIN ),
                                                'OK'     => __( 'Oklahoma', PPW_TEXTDOMAIN ),
                                                'OR'     => __( 'Oregon', PPW_TEXTDOMAIN ),
                                                'PW'     => __( 'Palau', PPW_TEXTDOMAIN ),
                                                'PA'     => __( 'Pennsylvania', PPW_TEXTDOMAIN ),
                                                'PR'     => __( 'Puerto Rico', PPW_TEXTDOMAIN ),
                                                'RI'     => __( 'Rhode Island', PPW_TEXTDOMAIN ),
                                                'SC'     => __( 'South Carolina', PPW_TEXTDOMAIN ),
                                                'SD'     => __( 'South Dakota', PPW_TEXTDOMAIN ),
                                                'TN'     => __( 'Tennessee', PPW_TEXTDOMAIN ),
                                                'TX'     => __( 'Texas', PPW_TEXTDOMAIN ),
                                                'UT'     => __( 'Utah', PPW_TEXTDOMAIN ),
                                                'VT'     => __( 'Vermont', PPW_TEXTDOMAIN ),
                                                'VI'     => __( 'Virgin Islands', PPW_TEXTDOMAIN ),
                                                'VA'     => __( 'Virginia', PPW_TEXTDOMAIN ),
                                                'WA'     => __( 'Washington', PPW_TEXTDOMAIN ),
                                                'WV'     => __( 'West Virginia', PPW_TEXTDOMAIN ),
                                                'WI'     => __( 'Wisconsin', PPW_TEXTDOMAIN ),
                                                'WY'     => __( 'Wyoming', PPW_TEXTDOMAIN ),
                                              )
?>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_state_th_classes ) ?>>
  <lable for="<?php echo PPW_PREFIX; ?>_clients_billing_state"><?php _e( 'State', PPW_TEXTDOMAIN ); ?></lable>
</div>
<div <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_state_td_classes ) ?>>
  <select <?php echo ppw_get_attribute( 'class', $ppw_field_clients_billing_state_select_field_classes ) ?> name="<?php echo PPW_PREFIX; ?>_clients_billing_state" id="<?php echo PPW_PREFIX; ?>_clients_billing_state">
  <?php
    foreach( $states as $key => $value ) {
      ?>
      <option value="<?php echo $key; ?>" <?php selected( $ppw_clients_billing_state_value, $key ); ?>><?php echo $value; ?></option>
      <?php
    }
  ?>
  </select>
</div>