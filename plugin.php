<?php
/**
 * Plugin Name: Kioken GB Addons
 * Plugin URI: https://kiokentheme.com
 * Description: Options and settings package for GutenBooster Theme.
 * Author: Kioken Theme
 * Author URI: https://kiokentheme.com
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Kioken Page Options
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KIOKEN_ZENGINTHEME', true);
/**
 * Block Initializer. Init only for KiokenTheme built themes.
 */

 if (!class_exists('Kioken_Post_Meta_Plugin') && ('gutenbooster' == get_option( 'template' ) || 'bavarian' == get_option( 'template' ))  ) {

	 require_once plugin_dir_path( __FILE__ ) . 'inc/init.php';

	 if ( defined('KIOKEN_ZENGINTHEME') && KIOKEN_ZENGINTHEME === true ) {
			require_once plugin_dir_path( __FILE__ ) . 'inc/customizer-fields/preloader.php';
			require_once plugin_dir_path( __FILE__ ) . 'inc/customizer-fields/blog.php';
			require_once plugin_dir_path( __FILE__ ) . 'inc/customizer-fields/header.php';
			require_once plugin_dir_path( __FILE__ ) . 'inc/customizer-fields/pagebanner.php';
	 }



 }

