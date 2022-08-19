<?php
/**
 * Include all blocks
 *
 * @package DlmWpTheme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$delennerd_blocks_inc = array(
    '/dlm-section-headline.php',
);

add_action( 'after_setup_theme', 'delennerd_blocks_crb_load' );

/**
 * Autoload Carbon fields
 */
function delennerd_blocks_crb_load() {
    require_once DLM_THEME_PATH . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();   
}


foreach ( $delennerd_blocks_inc as $file ) {
	require_once DLM_BLOCKS_PATH . '/inc/blocks' . $file;
}