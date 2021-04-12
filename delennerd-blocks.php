<?php
/**
 * Plugin Name: Delennerd Gutenberg Blocks
 * Description: Gutenberg Blocks by delennerd
 * Version:     1.0.1
 * Author:      Pascal Lehnert
 * Author URI:  https://delennerd.de
 * Text Domain: delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'DLM_BLOCKS_NAME', 'DeLennerd Blocks' );
define( 'DLM_BLOCKS_PREFIX', 'DLM_BLOCKS' );
define( 'DLM_BLOCKS_LOCALE_PREFIX', 'delennerd-blocks' );
define( 'DLM_BLOCKS_VER', '1.0.1' );

define( 'DLM_BLOCKS__FILE__', __FILE__ );
define( 'DLM_BLOCKS_PATH', plugin_dir_path( DLM_BLOCKS__FILE__ ) );
define( 'DLM_BLOCKS_BASE', plugin_basename( DLM_BLOCKS__FILE__ ) );
define( 'DLM_BLOCKS_URL', plugins_url( '/', DLM_BLOCKS__FILE__ ) );


$delennerd_blocks_inc_files = [
    '/vendor/autoload.php',
    '/inc/update-checker.php',
    '/inc/delennerd-blocks-frontend.php',
];

foreach ( $delennerd_blocks_inc_files as $file ) {
	require_once DLM_BLOCKS_PATH . $file;
}