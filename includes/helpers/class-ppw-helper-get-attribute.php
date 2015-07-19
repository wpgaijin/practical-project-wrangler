<?php
/**
 * Display the attribute if it has a value
 *
 * Display Attribute if it not empty
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Atrribute' ) ) {
  class PPW_Helper_Get_Atrribute {
    /**
     * The attribute
     *
     * @since  0.0.1
     * @var    string $attribute the attribute
     */
    private $attribute;
    /**
     * Th attribute's value
     *
     * @since  0.0.1
     * @var    string $value The attribute's value
     */
    private $value;
    /**
     * Initialize the class
     *
     * @since 0.0.1
     * @param      $attribute string the attribute
     * @param      $value string the attribute value
     */
    public function __construct( $attribute, $value ) {
      $this->attribute = $attribute;
      $this->value = $value;
    }
    /**
     * Get Attribute
     *
     * @since      0.0.1
     * @return     $string the attribute with the value(s)
     */
    public function get_attribute() {
      if( !empty( $this->value ) ) {
        if( is_array( $this->value ) ) {
            $string = esc_attr( implode( ' ',  $this->value ) );
        } else {
            $string = esc_attr( $this->value ) . '"';
        }
        return $this->attribute . '="' . $string . '"';
      }
    } // end init
  }
} // end PPW_Helper_Get_Atrribute
/**
 * Get Attribute template function
 *
 * @since      0.0.1
 * @param      $attribute string the attribute
 * @param      $value string the attribute value
 * @return     PPW_Helper_Get_Atrribute()
 */
if( !function_exists( 'ppw_get_attribute' ) ) {
  function ppw_get_attribute( $attribute, $value ) {
    $ppw_helper_get_attribute = new PPW_Helper_Get_Atrribute( $attribute, $value );
    return $ppw_helper_get_attribute->get_attribute();
  }
} // end ppw_get_attribute