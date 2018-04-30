<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/30/18
 * Time: 1:07 PM
 */

class WCBM_Bill {

	private $product = null;

	private $assemblies = [];

	private $parts = [];

	private $data = [];

	/**
	 * WCBM_Bill constructor.
	 *
	 * @param null $product
	 */
	public function __construct( $product ) {
		$this->setProduct( $product );
		$this->get_assem();
	}

	/**
	 * @return array
	 */
	public function getAssemblies(): array {
		return $this->assemblies;
	}

	/**
	 * @param array $assemblies
	 */
	public function setAssemblies( array $assemblies ): void {
		$this->assemblies = $assemblies;
	}

	/**
	 * @return array
	 */
	public function getParts(): array {
		return $this->parts;
	}

	/**
	 * @param array $parts
	 */
	public function setParts( array $parts ): void {
		$this->parts = $parts;
	}

	public function get_assem() {

		$prod = $this->getProduct();


		$p = wc_get_product($prod);

		$this->setAssemblies( get_post_meta($prod, '_product_assembly',true ));

		$json = json_encode($this->getAssemblies());

		echo $json;

	}

	/**
	 * @return null
	 */
	public function getProduct() {
		return $this->product;
	}

	/**
	 * @param null $product
	 */
	public function setProduct( $product ): void {
		$this->product = $product;
	}

}