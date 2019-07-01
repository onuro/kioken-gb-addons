<?php
/**
 * Pro Initializer
 *
 *
 * @since   1.0.0
 * @package Kioken GB Addons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KIKEN_ADDONS_PRO_FUNC_PATH', realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR );

require_once KIKEN_ADDONS_PRO_FUNC_PATH . 'customizer-fields/preloader.php';
require_once KIKEN_ADDONS_PRO_FUNC_PATH . 'customizer-fields/blog.php';
require_once KIKEN_ADDONS_PRO_FUNC_PATH . 'customizer-fields/header.php';
require_once KIKEN_ADDONS_PRO_FUNC_PATH . 'customizer-fields/pagebanner.php';