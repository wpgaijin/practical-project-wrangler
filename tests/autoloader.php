<?php
/**
 * Autoload
 *
 * Autoload the helper classes
 *
 * @package    [Package]
 * @subpackage [Package]
 * @since      [version]
 */

if( !class_exists( 'Helper_AutoLoader' ) ) {
	class Helper_AutoLoader {

		/**
		 * The Class Arguments
		 *
		 * @since  [version]
		 * @var    $args the class arguments
		 */
		protected static $args;

        /**
         * Init
         *
         * Initalize the class
         *
         * @since  [version]
         * @return $args the class arguments
         */
        public static function init( $args = array() ) {
        	self::$args = $args;
        	$defaults = array(
                'type'      => 'plugin',
                'format'    => true,
                'dir'       => 'classes',
                'prefix'    => 'class-'
            );

	        self::$args = wp_parse_args( self::$args, $defaults );

	        return self::$args;
        } // end defaults

        /**
         * Auto loads classes if the file exists
         *
         * @since  [version]
         * @param  array $class the class names
         * @return void
         */
        public static function autoloader( $class ) {
            // If $format is true format the file name to WordPress standards format
            if( self::$args['format'] == true) {
                $class = strtolower( str_replace('_', '-', $class) );
            }

            $file = self::$args['dir'] .'/'. self::$args['prefix'] . $class . '.php';

            switch ( self::$args['type'] ) {
                // If $type is set to 'theme'
                case 'theme':
                    // check if files exists in the directory
                    if ( file_exists ( get_template_directory() .'/'. $file ) ){
                        include( get_template_directory() .'/'. $file);
                    }
                break;
                // if type is not set or set to 'plugin'
                case 'plugin':
                default:
                    // check if files exists in the directory
                    if ( file_exists ( plugin_dir_path( __FILE__ ) . $file ) ){
                        include( plugin_dir_path( __FILE__ ) . $file);
                    }
                break;
            }
        }
    }
} // end Autoload_Helpers
spl_autoload_register( array( 'Helper_AutoLoader', 'autoloader' ) );