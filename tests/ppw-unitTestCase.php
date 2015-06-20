<?php
/**
 * Post Type Capabilites
 *
 * The array of capabilities when capability_typ is set
 *
 * @package    [package]
 * @subpackage [subpackage]
 * @since      [version]
 * @access     [only use if private]
 * @see        [description]
 * @link       [url]
 */

if( !class_exists( 'Helpers' ) ) {
	class PPW_UnitTestCase extends WP_UnitTestCase {

		/**
		 * Initialize the class
		 *
		 * @since [version]
		 */
		public function __construct() {} // end __construct

		protected function post_type_capabilites( $capability_type ) {
			$caps = array(
				'edit_post'              => 'edit_' . $capability_type,
				'read_post'              => 'read_' . $capability_type,
				'delete_post'            => 'delete_' . $capability_type,
				'edit_posts'             => 'edit_' . $capability_type . 's',
				'edit_others_posts'	     => 'edit_others_' . $capability_type . 's',
				'publish_posts'          => 'publish_' . $capability_type . 's',
				'read_private_posts'     => 'read_private_' . $capability_type . 's',
				'read'                   => 'read',
				'delete_posts'           => 'delete_' . $capability_type . 's',
				'delete_private_posts'   => 'delete_private_' . $capability_type . 's',
				'delete_published_posts' => 'delete_published_' . $capability_type . 's',
				'delete_others_posts'    => 'delete_others_' . $capability_type . 's',
				'edit_private_posts'     => 'edit_private_' . $capability_type . 's',
				'edit_published_posts'   => 'edit_published_' . $capability_type . 's',
				'create_posts'           => 'edit_' . $capability_type . 's'
			);
			return $caps;
		} // end post_type_capabilites

		protected function assertArrayObjEqual($expected, $actual, $regard_order = false, $check_keys = true) {
			foreach( $actual as $key => $value ) {
				$the_actual[$key] = $value;
			}
		    // check length first
		    $this->assertEquals(count($expected), count($the_actual), 'Failed to assert that two arrays have the same length. actual: ' . count($the_actual) . '. expected: ' . count($expected));

		    // sort arrays if order is irrelevant
		    if (!$regard_order) {
		        if ($check_keys) {
		            $this->assertTrue(ksort($expected), 'Failed to sort array.');
		            $this->assertTrue(ksort($the_actual), 'Failed to sort array.');
		        } else {
		            $this->assertTrue(sort($expected), 'Failed to sort array.');
		            $this->assertTrue(sort($the_actual), 'Failed to sort array.');
		        }
		    }

		    $this->assertEquals($expected, $the_actual);
		}

		/**
		 * Assert that two arrays are equal. This helper method will sort the two arrays before comparing them if
		 * necessary. This only works for one-dimensional arrays, if you need multi-dimension support, you will
		 * have to iterate through the dimensions yourself.
		 * @param array $expected the expected array
		 * @param array $actual the actual array
		 * @param bool $regard_order whether or not array elements may appear in any order, default is false
		 * @param bool $check_keys whether or not to check the keys in an associative array
		 */
		protected function assertArraysEqual(array $expected, array $actual, $regard_order = false, $check_keys = true) {
		    // check length first
		    $this->assertEquals(count($expected), count($actual), 'Failed to assert that two arrays have the same length.');

		    // sort arrays if order is irrelevant
		    if (!$regard_order) {
		        if ($check_keys) {
		            $this->assertTrue(ksort($expected), 'Failed to sort array.');
		            $this->assertTrue(ksort($actual), 'Failed to sort array.');
		        } else {
		            $this->assertTrue(sort($expected), 'Failed to sort array.');
		            $this->assertTrue(sort($actual), 'Failed to sort array.');
		        }
		    }

		    $this->assertEquals($expected, $actual);
		}

	}
} // end Helpers