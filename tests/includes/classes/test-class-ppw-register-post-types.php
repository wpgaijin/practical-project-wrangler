<?php
class Test_PPW_Register_Post_Types extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @covers PPW_Register_Post_Types
	 */
	public function test_register_projects_post_type() {
		global $wp_post_types;
		$this->assertArrayHasKey( 'ppw_projects', $wp_post_types );
	}
}