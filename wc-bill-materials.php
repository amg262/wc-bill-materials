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
const WCB_VER = '1.0.0';

/**
 *
 */
const WCB_REL = 'beta';


/**
 *
 */
const WCB_FILE = 'wcb.txt';


/**
 *
 */
const WCB_KEY = 'wcb.key';
/**
 *
 */
const WCB_DB = 8;
/**
 *
 *
 */
const WCB = __FILE__;
/**
 *
 */
const WCB_SETTINGS = 'wc_bom_settings';
/**
 *
 */
const WC_BOM_OPTIONS = 'wc_bom_options';

/**
 *
 */
const WCB_PREFIX = '';

/**
 *
 */
const WCB_OPTIONS = 'wcb_options';


/**
 *
 */
const WCB_TBL = 'wc_bill_materials';

/**
 *
 */
const WCB_DATA = 'wcb_data';


global $wcb_args, $wcb_options, $wcb_data;

/**
 * Class WC_Related_Products
 */
class wc_bill_materials {


	/**
	 * @var null
	 */
	protected static $instance = null;


	public $data_vals = [];

	public $option_vals = [];

	/**
	 * @var array
	 */
	public $data = [
		'init' => false,
		'db'   => WCB_DB,
		'rel'  => WCB_REL,
		'ver'  => WCB_VER,
		'file' => WCB_FILE,
	];

	/**
	 * @var array
	 */
	public $options = [
		'init' => false,
		'db'   => WCB_DB,
		'rel'  => WCB_REL,
		'ver'  => WCB_VER,
		'file' => WCB_FILE,

	];
	/**
	 * @var array
	 */
	public $option_key = [
		'init' => true,

	];

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
		global $wcb_options, $wcb_data;
		add_action( 'admin_init', [ $this, 'check_init' ] );

		//$wcb_options = $this->wcb_options();
		//$wcb_data    = $this->wcb_data();
		//$wcb_data = get_option( WCB_DATA );


		//add_action( 'admin_init', [ $this, 'wcb_data' ] );
		//var_dump( $wcb_data );

		//delete_option( WCB_OPTIONS );
		//delete_option( WCB_DATA );
		//register_activation_hook( __FILE__, [ $this, 'activate' ] );

		//register_deactivation_hook( __FILE__, [ $this, 'activate' ] );
		include_once __DIR__ . '/classes/class-wcbm-settings.php';
		include_once __DIR__ . '/classes/class-wcbm-post.php';

		include_once __DIR__ . '/inc.php';
		//include_once __DIR__.'/classes/functions.php';
		$set  = WC_RP_Settings::getInstance();
		$post = WC_RP_Post::getInstance();
		//$db   = WC_Bom_Data::getInstance();
		//$db   = WC_Bom_Data::getInstance();

		add_action( 'init', [ $this, 'load_assets' ] );
		add_action( 'admin_init', [ $this, 'create_options' ] );
		add_filter( 'plugin_action_links', [ $this, 'plugin_links' ], 10, 5 );

		//$this->zah();
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
	 *
	 */
	public function check_init() {
		global $wcb_data, $wcb_options;

		//delete_option( WCB_DATA );
		$wcb_data    = $this->wcb_data();
		$wcb_options = $this->wcb_options();


		var_dump( $wcb_data );
		var_dump( $wcb_options );
		$this->upgrade_data();

		//$this->delete_db();


		//if ( $wcb_data )

	}

	/**
	 * @return mixed
	 */
	public function wcb_data() {
		global $wcb_data;

		if ( ! get_option( WCB_DATA ) ) {
			add_option( WCB_DATA, $this->data['db'] );

		}
		//update_option( WCB_DATA, $this->data_key['key'] );
		$wcb_data   = get_option( WCB_DATA );
		$this->data = $wcb_data;

		//var_dump( $this->data );

		return $wcb_data;
	}

	/**
	 * @return mixed
	 */
	public function wcb_options() {
		global $wcb_options;

		if ( ! get_option( WCB_OPTIONS ) ) {
			add_option( WCB_OPTIONS, $this->options['init'] );
		}

		$wcb_options   = get_option( WCB_OPTIONS );
		$this->options = $wcb_options;

		//var_dump( $this->options );

		return $wcb_options;

	}

	/**
	 *
	 */
	public function upgrade_data() {
		global $wpdb;

		global $wcb_data;


		if ( $wcb_data['init'] !== true || $wcb_data['db'] < WCB_DB ) {

			$table_name = $wpdb->prefix . WCB_TBL;

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
					id int(11) NOT NULL AUTO_INCREMENT,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					name tinytext NOT NULL,
					data text NOT NULL,
					url varchar(255) DEFAULT '' NOT NULL,
					PRIMARY KEY  (id)
				);";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			$this->data['val']['init'] = true;

			$this->data['val']['db'] = WCB_DB;

			update_option( WCB_DATA, $this->data['val'] );
			dbDelta( $sql );
		}

		return true;


	}

	/**
	 *
	 */
	public function delete_db() {
		global $wpdb;

		$table_name = $wpdb->prefix . WCB_TBL;

		//$q = "SELECT * FROM " . $table_name . " WHERE id > 0  ;";
		$wpdb->query( "DROP TABLE IF EXISTS " . $table_name . "" );

		//delete_option( WCB_DATA );
		//	delete_option( WCB_OPTIONS );
		//update_option( 'wc_bom_settings', [ 'db_version' => null ] );
	}

	/**
	 *
	 */
	protected function install_data() {
		global $wpdb;

		$welcome_name = 'Mr. WordPress';
		$welcome_text = 'Congratulations, you just completed the installation!';

		$table_name = $wpdb->prefix . WCB_TBL;

		$wpdb->insert(
			$table_name,
			[
				'time' => current_time( 'mysql' ),
				'name' => $welcome_name,
				'data' => $welcome_text,
				'url'  => 'http://cloudground.net/',
			]
		);
	}

	/**
	 * @param $actions
	 * @param $plugin_file
	 *
	 * @return array
	 */
	protected function plugin_links( $actions, $plugin_file ) {
		static $plugin;

		if ( $plugin === null ) {
			$plugin = plugin_basename( __FILE__ );
		}
		if ( $plugin === $plugin_file ) {
			$settings = [
				'settings' => '<a href="admin.php?page=wc-bill-materials">' . __( 'Settings', 'wc-bom' ) . '</a>',
				'parts'    => '<a href="edit.php?post_type=part">' . __( 'Parts', 'wc-bom' ) . '</a>',
				'assembly' => '<a href="edit.php?post_type=assembly">' . __( 'Assembly', 'wc-bom' ) . '</a>',
			];
			$actions  = array_merge( $settings, $actions );
		}

		return $actions;
	}

	/**
	 *
	 */
	protected function load_assets() {
		$url  = 'assets/';
		$url2 = 'assets/';

		//$val = 'http://cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js';
		//wp_enqueue_script( 'sweetalertjs', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js' );
		//wp_enqueue_style( 'sweetalert_css', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css' );
		//wp_register_script( 'bom_adm_js', plugins_url( $url . 'wc-bom-admin.js', __FILE__ ), [ 'jquery' ] );
		//wp_register_style( 'bom_css', plugins_url( $url2 . 'wc-bom.css', __FILE__ ) );

		//wp_enqueue_script( 'valjs', $val );

		$this->check_dist();
		wp_enqueue_script( 'sweetalertjs', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js' );
		wp_enqueue_style( 'sweetalert_css', 'https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css' );

		wp_register_script( 'chosen_js',
			'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.jquery.min.js', [ 'jquery' ] );
		wp_register_style( 'chosen_css',
			'https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.min.css' );
		wp_enqueue_script( 'postbox' );
		//wp_enqueue_script( 'bom_adm_js' );
		wp_enqueue_script( 'chosen_js' );
		wp_enqueue_style( 'chosen_css' );
		//wp_enqueue_style( 'bom_css' );
	}

	/**
	 *
	 */
	protected function check_dist() {

		if ( file_exists( __DIR__ . '/dist/wc-bom-admin.min.js' ) ) {
			wp_register_script( 'bom_adm_js', plugins_url( 'assets/wc-bom-admin.js', __FILE__ ), [ 'jquery' ] );
			wp_register_script( 'bom_adm_min_js', plugins_url( 'dist/wc-bom-admin.min.js', __FILE__ ), [ 'jquery' ] );

			wp_enqueue_script( 'bom_adm_js' );
			//wp_enqueue_script( 'bom_adm_min_js' );
		}

		if ( file_exists( __DIR__ . '/dist/wc-bom.min.css' ) ) {
			wp_register_style( 'bom_css', plugins_url( 'assets/wc-bom.css', __FILE__ ) );
			wp_register_style( 'bom_min_css', plugins_url( 'dist/wc-bom.min.css', __FILE__ ) );

			wp_enqueue_style( 'bom_css' );
			//wp_enqueue_style( 'bom_min_css' );
		}

	}
}

$wcrp = wc_bill_materials::getInstance();

