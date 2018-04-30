<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/28/18
 * Time: 4:14 PM
 */

class WC_Bom_Builder {

	private $product_assembly = [];

	private $product = null;

	private $assembly_items = [];

	private $parts = [];

	private $part_data = [];

	/**
	 * WC_Bom_Builder constructor.
	 */
	public function __construct() {


	}


	public function dothis($prod_id) {

		$product = wc_get_product($prod_id);

		$this->assembly_items[] = $product['_product_assembly'];


		$json = json_encode($this->assembly_items);

		echo $json;

		return $json;
	}

}