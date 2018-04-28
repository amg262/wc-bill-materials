<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/28/18
 * Time: 4:14 PM
 */

class WC_Bom_Builder {


	/**
	 * @var null
	 */
	protected static $instance = null;

	private $prod;

	/**
	 * WC_Related_Products constructor.
	 */
	protected function __construct( $product ) {
		$this->setProd( new WC_Product( $product->ID ) );
	}

	/**
	 * @return \WC_Product
	 */
	public function getProd(): \WC_Product {
		return $this->prod;
	}

	/**
	 * @param \WC_Product $prod
	 */
	public function setProd( \WC_Product $prod ): void {
		$this->prod = $prod;
	}

	public function get_this() {
		$pa = get_field( 'product_assembly' );
	}

	protected function init() {

	}


}