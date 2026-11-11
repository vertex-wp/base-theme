<?php
/**
 * Theme bootstrap and WordPress lifecycle hooks.
 *
 * @package ExampleTheme
 */

defined( 'ABSPATH' ) || exit;

define( 'EXAMPLE_THEME_FILE', __FILE__ );

require_once __DIR__ . '/vertex/bootstrap.php';
require_once __DIR__ . '/src/Theme.php';

VertexLoader::register(
	__DIR__,
	'ExampleTheme\\',
	'1.4.0'
);

$example_theme = ExampleTheme\Theme::get_instance();

add_action( 'after_switch_theme', array( $example_theme, 'activate' ) );
add_action( 'switch_theme', array( $example_theme, 'deactivate' ) );
add_action( 'init', array( $example_theme, 'init' ) );
