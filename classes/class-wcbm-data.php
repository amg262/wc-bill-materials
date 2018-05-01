<?php

/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/28/18
 * Time: 1:18 AM
 */
class WC_Bom_Data {


	/**
	 * @var null
	 */
	protected static $instance;
	public $wc_bom_settings = [];
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

		//delete_option('wc_bom_db');

		add_action( 'admin_footer', [ $this, 'upgrade_data' ] );
		add_action( 'admin_footer', [ $this, 'install_data' ] );

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
				'data' => $welcome_text,
				'url'  => 'http://cloudground.net/',
			]
		);
	}

	public function upgrade_data() {
		global $wpdb;
		global $wc_bom_settings;

		$key             = 'db_version';
		$wc_bom_settings = get_option( 'wcb_db' );

		var_dump( $wc_bom_settings );
		if ( $wc_bom_settings[ $key ] !== WC_BOM_DB_VERSION ) {
			$table_name = $wpdb->prefix . 'wc_bill_materials';

			/*$sql = "CREATE TABLE IF NOT EXISTS $table_name(
					`id` INT NOT NULL AUTO_INCREMENT , 
					`date_created` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
					`part_array` LONGTEXT NOT NULL , 
					`is_active` INT NOT NULL DEFAULT '1' , 
					PRIMARY KEY (`id`), 
					FULLTEXT (`part_array`));";
*/
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

			if ( get_option( 'wcb_db' ) === null ) {
				add_option( 'wcb_db', absint( WC_BOM_DB_VERSION ) );
			} else {
				update_option( 'wcb_db', absint( WC_BOM_DB_VERSION ) );
			}

		}

	}


}