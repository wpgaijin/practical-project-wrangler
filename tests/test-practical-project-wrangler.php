<?php
class Test_PPW extends WP_UnitTestCase {

	protected $object;

	public function setUp() {
		parent::setUp();
		$this->object = PPW_Run();
	}

	public function tearDown() {
		parent::tearDown();
	}

	public function test_edd_instance() {
		$this->assertClassHasStaticAttribute( 'instance', 'PPW' );
	}

	/**
	 * @covers PPW:define_constants
	 */
	public function test_constants() {
		// Plugin Folder URL
		$path = str_replace( 'tests/', '', plugin_dir_url( __FILE__ ) );
		$this->assertSame( PPW_PLUGIN_URL, $path );
		// Plugin Folder Path
		$path = str_replace( 'tests/', '', plugin_dir_path( __FILE__ ) );
		$this->assertSame( PPW_PLUGIN_DIR, $path );
		// Plugin Root File
		$path = str_replace( 'tests/', '', plugin_dir_path( __FILE__ ) );
		$this->assertSame( PPW_PLUGIN_FILE, $path.'practical-project-wrangler.php' );
	}

	/**
	 * @covers PPW:includes
	 */
	public function test_includes() {
		// includes helpers
		$this->assertFileExists( PPW_PLUGIN_DIR . 'includes/helpers/class-ppw-helper-register-post-type.php' );
		// includes classes
		$this->assertFileExists( PPW_PLUGIN_DIR . 'includes/classes/class-ppw-register-post-types.php' );
		// includes
		$this->assertFileExists( PPW_PLUGIN_DIR . 'includes/class-ppw-init.php' );
	}
}