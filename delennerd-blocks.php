<?php
/**
 * Plugin Name: Delennerd Gutenberg Blocks
 * Description: Gutenberg Blocks by delennerd
 * Version:     1.0
 * Author:      Pascal Lehnert
 * Author URI:  https://delennerd.de
 * Text Domain: delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define( 'DLM_BLOCKS_NAME', 'DeLennerd Blocks' );
define( 'DLM_BLOCKS_PREFIX', 'DLM_BLOCKS' );
define( 'DLM_BLOCKS_LOCALE_PREFIX', 'delennerd-blocks' );
define( 'DLM_BLOCKS_VER', '1.0.0' );

define( 'DLM_BLOCKS__FILE__', __FILE__ );
define( 'DLM_BLOCKS_PATH', plugin_dir_path( DLM_BLOCKS__FILE__ ) );
define( 'DLM_BLOCKS_BASE', plugin_basename( DLM_BLOCKS__FILE__ ) );
define( 'DLM_BLOCKS_URL', plugins_url( '/', DLM_BLOCKS__FILE__ ) );


$delennerd_blocks_inc_files = [
    // '/vendor/autoload.php',
    '/inc/update-checker.php',
];

foreach ( $delennerd_inc_files as $file ) {
    // $filepath = locate_template( './' . $file );
	// if ( ! $filepath ) { trigger_error( sprintf( 'Error locating %s for inclusion', $file ), E_USER_ERROR );	}
	// require_once $filepath;
	require_once DLM_BLOCKS_PATH . $delennerd_blocks_inc_files;
}


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


class Delennerd_Blocks_Frontend {

    /**
	 * Instance of this class
	 *
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Instance Control
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

    public function __construct() {
        add_action( 'init', array( $this, 'on_init' ), 20 );
        // $this->register_scripts();
        // add_action( 'enqueue_block_assets', array( $this, 'blocks_assets' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'blocks_assets' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'global_inline_css' ), 101 );
		// add_action( 'wp_enqueue_scripts', array( $this, 'frontend_inline_css' ), 20 );
		// add_action( 'wp_head', array( $this, 'frontend_gfonts' ), 90 );
		// add_action( 'wp_head', array( $this, 'faq_schema' ), 91 );
		if ( ! is_admin() ) {
			// add_action( 'render_block', array( $this, 'conditionally_render_block' ), 6, 2 );
		}
    }

    public function on_init() {
        // Only load if Gutenberg is available.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

        register_block_type(
            'delennerd/bs-button-block', array(
                'render_callback' => array( $this, 'render_bs_button_blocks' ),
                'editor_script' => 'delennerd-blocks-js',
                'editor_style'  => 'delennerd-blocks-editor-style-css',
                'style'         => 'delennerd-blocks-style-css',
            )
        );

        register_block_type(
            'delennerd/block-gutenberg-repeater-field', array(
                'style'         => 'delennerd-blocks-style-css',
                'editor_script' => 'delennerd-blocks-js',
                'editor_style'  => 'delennerd-blocks-editor-style-css',
            )
        );

        register_block_type(
            'delennerd/bootstrap-buttons', array(
                'render_callback' => array( $this, 'render_bootstrap_buttons' ),
                'style'         => 'delennerd-blocks-style-css',
                'editor_script' => 'delennerd-blocks-js',
                'editor_style'  => 'delennerd-blocks-editor-style-css',
            )
        );
    }

    public function render_bs_button_blocks( $attr ) {
        $buttonText = $attr['buttonText'];
        $class = 'btn btn-' . $attr['style'];
        if ( !empty($attr['cssClass']) ) $class .= ' '. $attr['cssClass'];

        $html = '<div class="dlm-bs-button">';
        $html .= json_encode( $attr );
        $html .= '<a href="'. $attr['linkHref'] .'" '. $attr['linkTarget'] .' class="'. $class .'" id="'. $attr['cssId'] .'">'. $buttonText .'</a>';
        $html .= '</div>';

        return $html;
    }

    public function render_bootstrap_buttons( $attr ) {
        $html = '<ul class="delennerd-blocks-bs-buttons-items list-inline '. $attr['className'] .'">';

        foreach( $attr['buttons'] as $button ) {
            $target = $button['linkTarget'] == 'custom' ? $button['linkTargetCustom'] : $button['linkTarget'];

            $html .= '<li class="delennerd-blocks-bs-buttons-item list-inline-item">';
            $html .= '<a href="'. $button['linkHref'] .'" ';
                $html .= 'target="'. $target .'" ';
                $html .= 'class="btn btn-'. $button['style'] .' '. $button['cssClass'] .'" ';
                $html .= 'id="'. $button['cssId'] .'">';
            $html .= $button['text'];
            $html .= '</a>';
            $html .= '</li>';
        }
        
        $html .= '</ul>';

        return $html;
    }

    /**
	 *
	 * Register and Enqueue block assets
	 *
	 * @since 1.0.0
	 */
	public function blocks_assets() {
		// If in the backend, bail out.
		// if ( is_admin() ) {
		// 	return;
		// }
		$this->register_scripts();
	}

    /**
	 * Registers scripts and styles.
	 */
	public function register_scripts() {
        // If in the backend, bail out.
        // if (is_admin()) {
        //     return;
        // }

        wp_register_style(
            'delennerd-blocks-editor-style-css', // Handle.
            DLM_BLOCKS_URL . '/dist/blocks.css', // Block style CSS.
            // is_admin() ? array( 'wp-editor' ) : null, // Dependency to include the CSS after it.
            array( 'wp-edit-blocks' ),
            null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
        );

        wp_register_style(
            'delennerd-blocks-style-css', // Handle.
            DLM_BLOCKS_URL . '/dist/style-blocks.css', // Block style CSS.
            array( 'wp-editor' ),
            null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
        );

        wp_register_script(
            'delennerd-blocks-js',
            DLM_BLOCKS_URL . '/dist/blocks.js',
            array( 'wp-blocks', 'wp-i18n', 'wp-dom-ready', 'wp-element', 'wp-editor' ),
            null,
            true
        );

        // WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
        wp_localize_script(
            'gutenberg_repeater_field-cgb-block-js',
            'cgbGlobal', // Array containing dynamic data for a JS Global.
            [
                'pluginDirPath' => plugin_dir_path( __DIR__ ),
                'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
                // Add more data here that you want to access from `cgbGlobal` object.
            ]
        );
    }
}

Delennerd_Blocks_Frontend::get_instance();

// add_action( 'init', function() {
//     return Delennerd_Blocks_Frontend::get_instance();
// } );


// function delennerd_gutenberg_blocks()
// {
//     wp_register_script( 'delennerd-custom-cta-js', DLM_BLOCKS_URL . '/blocks/cta-block.js', array( 'wp-blocks' ) );

//     register_block_type( 'delennerd-blocks/custom-cta', array(
//         'editor_script' => 'delennerd-custom-cta-js',
//     ) );
// }

// add_action( 'init', 'delennerd_gutenberg_blocks' );