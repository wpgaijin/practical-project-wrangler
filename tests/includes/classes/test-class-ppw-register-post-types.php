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

	public function test_register_projects_post_type_labels() {
		global $wp_post_types;
		$this->assertEquals( 'Projects', $wp_post_types['ppw_projects']->labels->name );
		$this->assertEquals( 'Project', $wp_post_types['ppw_projects']->labels->singular_name );
		$this->assertEquals( 'Projects', $wp_post_types['ppw_projects']->labels->menu_name );
		$this->assertEquals( 'Projects', $wp_post_types['ppw_projects']->labels->name_admin_bar );
		$this->assertEquals( 'All Projects', $wp_post_types['ppw_projects']->labels->all_items );
		$this->assertEquals( 'Add New', $wp_post_types['ppw_projects']->labels->add_new );
		$this->assertEquals( 'Add New Project', $wp_post_types['ppw_projects']->labels->add_new_item );
		$this->assertEquals( 'Edit Project', $wp_post_types['ppw_projects']->labels->edit_item );
		$this->assertEquals( 'New Project', $wp_post_types['ppw_projects']->labels->new_item );
		$this->assertEquals( 'View Project', $wp_post_types['ppw_projects']->labels->view_item );
		$this->assertEquals( 'Search Projects', $wp_post_types['ppw_projects']->labels->search_items );
		$this->assertEquals( 'No Projects Found', $wp_post_types['ppw_projects']->labels->not_found );
		$this->assertEquals( 'No Projects Found in Trash', $wp_post_types['ppw_projects']->labels->not_found_in_trash );
		$this->assertEquals( 'Parent Project Post:', $wp_post_types['ppw_projects']->labels->parent_item_colon );
	}
}