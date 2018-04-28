<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/28/18
 * Time: 1:18 AM
 */
class WC_Bom_Data {


	public $wcbm_settings = [];
	/**
	 * @var null
	 */
	protected static $instance;
	/**
	 * @var
	 */
	private $table;
	/**
	 * @var string
	 */

	/**
	 * WC_Bom constructor.
	 */
	private function __construct() {
		$this->init();
	}

	/**
	 *
	 */
	public function init() {


		$this->create_data();
		add_action( 'admin_init', [ $this, 'upgrade_data' ] );

	}

	public function create_data() {

		//	$add = add_option( 'wcbm_settings', [ 'db_init' => true ] );

		$f = file_put_contents( __DIR__.'/booger.txt', 'heyo', FILE_APPEND );
		//var_dump( $f );


	}

	/**
	 * @return null
	 */
	public static function getInstance() {

		if ( null === static::$instance ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	/**
	 *
	 */
	public function install() {

		global $wpdb;
		global $jal_db_version;

		$table_name = $wpdb->prefix . 'wc_bill_materials';

		$charset_collate = $wpdb->get_charset_collate();

		$sql =
			'CREATE TABLE wp_wcbom (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT \'0000-00-00 00:00:00\' NOT NULL,
			name tinytext NOT NULL,
			text text NOT NULL,
			url varchar(55) DEFAULT \'\' NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;';

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );


	}

	/**
	 *
	 */
	public function install_data() {
		global $wpdb;

		$welcome_name = 'Mr. WordPress';
		$welcome_text = 'Congratulations, you just completed the installation!';

		$table_name = $wpdb->prefix . 'wc_bill_materials';

		$wpdb->insert(
			$table_name,
			[
				'time' => current_time( 'mysql' ),
				'name' => $welcome_name,
				'text' => $welcome_text,
			]
		);
	}

	public function upgrade_data() {
		global $wpdb;


		$table_name = $wpdb->prefix . 'wc_bill_materials';

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
					id int(11) NOT NULL AUTO_INCREMENT,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					name tinytext NOT NULL,
					data text NOT NULL,
					url varchar(255) DEFAULT '' NOT NULL,
					PRIMARY KEY  (id)
				);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );


		dbDelta( $sql );


	}

	public function upgrade_db() {
		global $wpdb;
		global $wc_bom_settings;
		global $wc_bom_options;

		$key             = 'db_version';
		$wc_bom_settings = get_option( WC_BOM_SETTINGS );

		if ( $wc_bom_settings[ $key ] !== WC_BOM_VERSION ) {

			$table_name = $wpdb->prefix . 'woocommerce_bom';

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
					id int(11) NOT NULL AUTO_INCREMENT,
					time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
					name tinytext NOT NULL,
					data text NOT NULL,
					url varchar(255) DEFAULT '' NOT NULL,
					PRIMARY KEY  (id)
				);";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			update_option( WC_BOM_SETTINGS, [ $key => WC_BOM_VERSION ] );


			dbDelta( $sql );

		}
	}


}