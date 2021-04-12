<?php
/** 
 * 
 * @package delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function init_delennerd_blocks_assets() {
    // Register block styles for both frontend + backend.

    // Register block editor styles for backend.
	// wp_register_style(
	// 	'delennerd-blocks-block-css', // Handle.
	// 	plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
	// 	array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
	// 	null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	// );

    // // WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	// wp_localize_script(
	// 	'delennerd-blocks-js',
	// 	'cgbGlobal', // Array containing dynamic data for a JS Global.
	// 	[
	// 		'pluginDirPath' => plugin_dir_path( __DIR__ ),
	// 		'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
	// 		// Add more data here that you want to access from `cgbGlobal` object.
	// 	]
	// );
}

// add_action( 'init', 'init_delennerd_blocks_assets' );