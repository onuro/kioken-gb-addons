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
require_once KIKEN_ADDONS_PRO_FUNC_PATH . 'customizer-fields/footer.php';

class Kioken_Addons_ProInit {
  /**
	 * Member Variable
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 *  Initiator
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

  /**
	 * Constructor
	 */
	public function __construct() {


    //hook - add pro body class
		add_action( 'body_class', array( $this, 'pro_body_class' ) );
    //hook add pro
    add_filter( 'init', array( $this, 'proactive_localize_script' ) );

	}

  public function proactive_localize_script() {
    wp_localize_script(
			'kioken_page_options-build-js',
			'kioken_theme_pro',
			array(
				'is_pro'		 	=> true,
			)
		);
  }

  /**
	 * Pro Enabler Browser Class for Body
	 */
	public static function pro_body_class($classes) {

			$classes[] = 'is-ktheme-pro';
			return $classes;
	}


}

Kioken_Addons_ProInit::get_instance();