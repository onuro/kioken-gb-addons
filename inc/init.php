<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Kioken_GB_Addons_Plugin {
	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'init', array( $this, 'kpage_options_editor_assets' ) );
		add_filter( 'init', array( $this, 'kpageoptions_register_post_meta' ) );
	}

	/**
	 * Enqueue Gutenberg block assets for both frontend + backend.
	 *
	 * Assets enqueued:
	 * 1. blocks.style.build.css - Frontend + Backend.
	 * 2. blocks.build.js - Backend.
	 * 3. blocks.editor.build.css - Backend.
	 *
	 * @uses {wp-blocks} for block type registration & related functions.
	 * @uses {wp-element} for WP Element abstraction — structure of blocks.
	 * @uses {wp-i18n} to internationalize the block's text.
	 * @uses {wp-editor} for WP editor styles.
	 * @since 1.0.0
	 */
	public function kpage_options_editor_assets() {

	// Register block styles for both frontend + backend.
	wp_register_style(
		'kioken_page_options-cgb-style-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'kioken_page_options-build-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'kioken_page_options-cgb-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);
	if (function_exists('kioken_theme_get_option')) {
		wp_localize_script(
			'kioken_page_options-build-js',
			'kioken_page_options_params',
			array(
				'show_pb'		 	=> kioken_theme_get_option('enable_page_banner'),
				'pbgc'		 	=> kioken_theme_get_option('page_banner_bgcolor'),
				'pbg_opacity'		 	=> kioken_theme_get_option('page_bannerbg_opacity'),
				'pb_height'		 	=> kioken_theme_get_option('page_banner_height'),
				'pb_txtcolor'		 	=> kioken_theme_get_option('page_banner_text_color'),
			)
		);
	}


	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	 if ($this->is_post_type('post') || $this->is_post_type('page')) {
		 register_block_type(
		'cgb/block-kioken-page-options', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			// 'style'         => 'kioken_page_options-cgb-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'kioken_page_options-build-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'kioken_page_options-cgb-block-editor-css',
		)
	);
		}
}

public function is_post_type($type){
    global $pagenow;
    if(is_admin() && $pagenow ==='post.php' && $type == get_post_type($_GET['post'])) return true;
    return false;
}


	// register custom meta tag field
	public function kpageoptions_register_post_meta() {

			//page title
	    register_post_meta( '', 'show_pagetitle', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'page_title_alignment', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string',) );

			//site header
	    register_post_meta( '', 'override_header', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'header_wrapper', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );
			register_post_meta( '', 'headerbg', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );
			register_post_meta( '', 'header_txtcolor', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );

			//layout
			register_post_meta( '', 'content_toppad', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );
			register_post_meta( '', 'custom_layout', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'layout', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );

			//page_banner
			register_post_meta( '', 'show_page_banner', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'override_page_banner_settings', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'page_banner_bgcolor', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );
			register_post_meta( '', 'page_bannerbg_opacity', array( 'show_in_rest' => true, 'single' => true, 'type' => 'number') );
			register_post_meta( '', 'page_banner_height', array( 'show_in_rest' => true, 'single' => true, 'type' => 'number') );
			register_post_meta( '', 'page_banner_text_color', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string') );
			register_post_meta( '', 'enable_page_banner_bgparallax', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'enable_page_banner_animate', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );

			//animated pb heading lines
			register_post_meta( '', 'pb_title_line_1', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'pb_title_line_2', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'pb_title_line_3', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );

			register_post_meta( '', 'pagebanner_subtitle', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'page_banner_subtitle_around', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );

			register_post_meta( '', 'enable_pb_button', array( 'show_in_rest' => true, 'single' => true, 'type' => 'boolean', ) );
			register_post_meta( '', 'pb_button_text', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'pb_button_url', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );
			register_post_meta( '', 'pb_button_style', array( 'show_in_rest' => true, 'single' => true, 'type' => 'string', ) );

	}
}

return new Kioken_GB_Addons_Plugin();






