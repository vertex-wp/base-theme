<?php
/**
 * Integration tests for the Vertex starter theme.
 *
 * @package ExampleTheme
 */

use ExampleTheme\Theme;
use Vertex\App;

/**
 * Tests the theme's WordPress and Vertex bootstrap integration.
 */
class Test_Theme_Integration extends WP_UnitTestCase {

	/**
	 * The theme bootstrap registers lifecycle hooks and the Vertex application.
	 *
	 * @return void
	 */
	public function test_theme_bootstrap_registers_lifecycle_hooks() {
		$theme = Theme::get_instance();

		$this->assertInstanceOf( Theme::class, $theme );
		$this->assertSame( $theme, Theme::get_instance() );
		$this->assertNotFalse( has_action( 'init', array( $theme, 'init' ) ) );
		$this->assertNotFalse( has_action( 'after_switch_theme', array( $theme, 'activate' ) ) );
		$this->assertNotFalse( has_action( 'switch_theme', array( $theme, 'deactivate' ) ) );
		$this->assertInstanceOf( App::class, App::getInstance() );
	}
}
