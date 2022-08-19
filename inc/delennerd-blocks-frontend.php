<?php
/** 
 * 
 * @package delennerd-blocks
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

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
        add_action( 'enqueue_block_assets', array( $this, 'blocks_assets' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'blocks_assets' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'global_inline_css' ), 101 );
		// add_action( 'wp_enqueue_scripts', array( $this, 'frontend_inline_css' ), 20 );
		if ( ! is_admin() ) {
			// add_action( 'render_block', array( $this, 'conditionally_render_block' ), 6, 2 );
		}
    }

    public function on_init() {
        // Only load if Gutenberg is available.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

        register_post_meta( 'post', '_my_custom_bool', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'boolean',
        ] );
    
        register_post_meta( 'post', '_my_custom_text', [
            'show_in_rest' => true,
            'single' => true,
            'type' => 'string',
        ] );

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
		$this->register_scripts();
	}

    /**
	 * Registers scripts and styles.
	 */
	public function register_scripts() {
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

        add_action( 'enqueue_block_editor_assets', function() {
            wp_enqueue_script(
                'delennerd-blocks-postmeta', 
                DLM_BLOCKS_URL . '/dist/blocks.js',
                [ 'wp-edit-post' ],
                false,
                false
            );
        } );

        // WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
        wp_localize_script(
            'delennerd-blocks-block-js',
            'dlmBlocksGlobal', // Array containing dynamic data for a JS Global.
            [
                'pluginDirPath' => DLM_BLOCKS_PATH,
                'pluginUrl'  => DLM_BLOCKS_URL,
            ]
        );
    }
}

Delennerd_Blocks_Frontend::get_instance();