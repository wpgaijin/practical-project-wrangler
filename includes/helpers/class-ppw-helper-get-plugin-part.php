<?php
/**
 * Get plugin template part
 *
 * @package    PPW
 * @subpackage PPW/Includes/Helpers
 * @since      0.0.1
 */
if( !class_exists( 'PPW_Helper_Get_Plugin_Part' ) ) {
  class PPW_Helper_Get_Plugin_Part {
    /**
     * The file's path
     *
     * @since  0.0.12
     * @var    string $path the file's path
     */
    protected $path;
    /**
     * The file type
     *
     * @since  0.0.1
     * @var    string $filetype the file type
     */
    protected $filetype;
    /**
     * Initialize the class
     *
     * @since 0.0.1
     */
    public function __construct( $path, $filetype = 'php' ) {
      $this->path = $path;
      $this->filetype = $filetype;
    }
    /**
     * Get Plugin Part
     *
     * @since      0.0.1
     * @param      string $path path to file
     * @param      string $filetype the file type
     * @return     void
     */
    public function get_plugin_part() {
      $type = '.' . $this->filetype;
      if( file_exists( PPW_PLUGIN_DIR . $this->path . $type ) ) {
        include PPW_PLUGIN_DIR . $this->path . $type;
      } else {
        echo 'The file <strong>' . $this->path . $type . '</strong> doesn\'t exist';
      }
    } // end init

  }
} // end PPW_Helper_Get_Plugin_Part
/**
 * Get plugin part template function
 *
 * @since      0.0.1
 * @param      string $path path to file
 * @param      string $filetype the file type
 * @return     PPW_Helper_Get_Plugin_Part()
 */
if( !function_exists( 'ppw_get_plugin_part' ) ) {
  function ppw_get_plugin_part( $path, $filetype = 'php' ) {
    $ppw_helper_get_plugin_part = new PPW_Helper_Get_Plugin_Part( $path, $filetype );
    return $ppw_helper_get_plugin_part->get_plugin_part();
  }
} // end ppw_get_plugin_part