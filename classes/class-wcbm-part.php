<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 5/7/18
 * Time: 7:11 PM
 */

class WCB_Part {

	private $meta = [
		[ 'part_no', 'sku', 'cost', 'weight', 'stock' ]
	];

	private $fields = [];

	private $part_data = [];

	private $post_data = [];
//	const PART_META = [ 'part_no', 'sku', 'cost', 'weight', 'stock' ];

	/**
	 * WCB_Part constructor.
	 */
	public function __construct() {

		$a = func_get_args();
		$i = func_num_args();
		if ( method_exists( $this, $f = '__construct' . $i ) ) {
			call_user_func_array( [ $this, $f ], $a );
		}
	}

	/*public function __construct1( $a1 ) {
		echo( '__construct with 1 param called: ' . $a1 . PHP_EOL );
	}

	public function __construct2( $a1, $a2 ) {
		echo( '__construct with 2 params called: ' . $a1 . ',' . $a2 . PHP_EOL );
	}*/

	public function get_part_data($post_id) {

		$post = get_post($post_id);

		if ( isset($post)) {


			$part_no = get_post_meta($post_id,'_part_no');
			$sku = get_post_meta($post_id,'_sku');
			$cost = get_post_meta($post_id,'_cost');
			$weight = get_post_meta($post_id,'_weight');
			$stock = get_post_meta($post_id,'_stock');


			$this->part_data[] = $part_no;
			$this->part_data[] = $sku;
			$this->part_data[] = $cost;
			$this->part_data[] = $weight;
			$this->part_data[] = $stock;
		}

		return $this->part_data;

	}

}