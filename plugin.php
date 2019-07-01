<?php
/**
 * Plugin Name: Kioken GB Addons
 * Plugin URI: https://kiokentheme.com
 * Description: Options and settings package for GutenBooster Theme.
 * Author: Kioken Theme
 * Author URI: https://kiokentheme.com
 * Version: 0.9.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Kioken Page Options
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// test
/**
 * Block Initializer. Init only for KiokenTheme built themes.
 */

 if (!class_exists('Kioken_GB_Addons_Plugin') && ('gutenbooster' == get_option( 'template' ) || 'bavarian' == get_option( 'template' ))  ) {

	 require_once plugin_dir_path( __FILE__ ) . 'inc/init.php';

	 if ( file_exists(plugin_dir_path( __FILE__ ) . 'inc/pro/class-gutenbooster-pro.php') ) {
		 require_once plugin_dir_path( __FILE__ ) . 'inc/pro/class-gutenbooster-pro.php';
	 }

 }

