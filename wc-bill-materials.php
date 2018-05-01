<?php
/*
Plugin Name: Bill of Materials
Description: Select your own related products instead of pulling them in by category.
Version:     1.0
Plugin URI:  http://andrewgunn.net
Author:      amg26
Author URI:  http://andrewgunn.net
*/
/**
 *
 */

const WC_BOM_DB_VERSION = 1;
const WCB = __FILE__;
const WC_BOM_SETTINGS   = 'wc_bom_settings';
/**
 *
 */
const WC_BOM_OPTIONS    = 'wc_bom_options';

const WCB_PREFIX = '';

const WCB_OPTIONS = 'wcb_options';

global $wcb_options;
/**
 * Class WC_Related_Products
 */
class WC_Bill_Materials {


	/**
	 * @var null
	 */
	protected static $instance = null;

	/**
	 * WC_Related_Products constructor.
	 */
	protected function __construct() {
		$this->init();
	}

	/**
	 * WC_Related_Products constructor.
	 */
	public function init() {
		global $wcb_options;
        $wcb_options = $this->wcb_options();

		include_once __DIR__ . '/classes/class-wcbm-settings.php';
		include_once __DIR__ . '/classes/class-wcbm-post.php';
		include_once __DIR__ . '/classes/class-wcbm-data.php';
		//include_once __DIR__.'/classes/functions.php';
		$set  = WC_RP_Settings::getInstance();
		$post = WC_RP_Post::getInstance();
		$db = WC_Bom_Data::getInstance();
		//$db   = WC_Bom_Data::getInstance();

		add_action( 'init', [ $this, 'load_assets' ] );
		add_action( 'admin_init', [ $this, 'create_options' ] );
		add_filter( 'plugin_action_links', [ $this, 'plugin_links' ], 10, 5 );

	}

	/**
	 * @return null
	 */
	public static function getInstance() {

		if ( static::$instance === null ) {
			static::$instance = new static;
		}

		return static::$instance;
	}


	/**
	 * @return mixed
	 */
	public function create_options() {

		if ( ! get_option( WC_BOM_SETTINGS ) ) {
			add_option( WC_BOM_SETTINGS, [ 'init' => 'true' ] );
		}

	}

	public function wcb_options() {
		global $wcb_options;

		if ( ! get_option( WCB_OPTIONS ) ) {
			add_option( WCB_OPTIONS, [ 'init' => true ] );
		}

		$wcb_options = get_option( WCB_OPTIONS );

		return $wcb_options;
	}
	/**
	 * @param $actions
	 * @param $plugin_file
	 *
	 * @return array
	 */
	public function plugin_links( $actions, $plugin_file ) {
		static $plugin;

		if ( $plugin === null ) {
			$plugin = plugin_basename( __FILE__ );
		}
		if ( $plugin === $plugin_file ) {
			$settings = [
				'settings' => '<a href="admin.php?page=wc_related_products">' . __( 'Settings', 'wc-bom' ) . '</a>',
			];
			$actions  = array_merge( $settings, $actions );
		}

		return $actions;
	}

	/**
	 *
	 */
	public function load_assets() {
		$url  = 'assets/';
		$url2 = 'assets/';

		//$val = 'http://cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js';
		//wp_enqueue_script( 'sweetalertjs', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js' );
		//wp_enqueue_style( 'sweetalert_css', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css' );
		wp_register_script( 'bom_adm_js', plugins_url( $url . 'wc-bom-admin.js', __FILE__ ), [ 'jquery' ] );
		wp_register_style( 'bom_css', plugins_url( $url2 . 'wc-bom.css', __FILE__ ) );

		//wp_enqueue_script( 'valjs', $val );

		wp_enqueue_script( 'sweetalertjs', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js' );
		wp_enqueue_style( 'sweetalert_css', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css' );

		wp_register_script( 'chosen_js',
			'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js', [ 'jquery' ] );
		wp_register_style( 'chosen_css',
			'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.min.css' );
		wp_enqueue_script( 'postbox' );
		wp_enqueue_script( 'bom_adm_js' );
		wp_enqueue_script( 'chosen_js' );
		wp_enqueue_style( 'chosen_css' );
		wp_enqueue_style( 'bom_css' );
	}
}

$wcrp                   = WC_Bill_Materials::getInstance();

