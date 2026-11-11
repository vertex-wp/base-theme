<?php
/**
 * Main theme lifecycle class.
 *
 * @package ExampleTheme
 */

namespace ExampleTheme;

use Vertex\App;

defined( 'ABSPATH' ) || exit;

/**
 * Handles theme initialisation and lifecycle events.
 */
final class Theme {
	/**
	 * The single instance of this class.
	 *
	 * @var Theme|null
	 */
	private static $instance = null;

	/**
	 * Retrieve the singleton instance.
	 *
	 * @return Theme
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Prevent direct construction.
	 */
	private function __construct() {}

	/**
	 * Initialise the theme.
	 *
	 * @return void
	 */
	public function init() {
		App::getInstance()->registerTheme( dirname( EXAMPLE_THEME_FILE ) );

		load_theme_textdomain(
			'vertex-starter',
			dirname( EXAMPLE_THEME_FILE ) . '/languages'
		);
	}

	/**
	 * Run activation routines.
	 *
	 * @return void
	 */
	public function activate() {}

	/**
	 * Run uninstall routines.
	 *
	 * @return void
	 */
	public static function uninstall() {}

	/**
	 * Run deactivation routines.
	 *
	 * @return void
	 */
	public function deactivate() {}
}
