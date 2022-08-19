<?php
// Exit if accessed directly.
// defined( 'ABSPATH' ) || exit;

// var_dump( function_exists('acf_register_block_type') );

// if (function_exists('acf_register_block_type')) {
//     // var_dump( 'MOIN' );
//     add_action( 'acf/init', 'register_acf_block_types' );
// }

// function register_acf_block_types() {
//     acf_register_block_type( array(
//         'name' => 'toaster',
//         'title' => __('Toaster'),
//         'description' => __('A custom toaster block'),
//         'render_template' => 'template-parts/blocks/toaster/toaster.php',
//         'icon' => 'editor-paste-text',
//         'keywords' => array( 'toaster', 'product' ),
//     ) );
// }

// add_action('acf/init', 'my_acf_blocks_init');
// function my_acf_blocks_init() {

//     // Check function exists.
//     if( function_exists('acf_register_block_type') ) {

//         // Register a testimonial block.
//         acf_register_block_type(array(
//             'name'              => 'testimonial',
//             'title'             => __('Testimonial'),
//             'description'       => __('A custom testimonial block.'),
//             'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
//             'category'          => 'formatting',
//         ));
//     }
// }
