<?php

require '../vendor/autoload.php';

use classes\module1\Product;

/**
 * double given integer number
 * @param integer $number
 * @return number
 */
function double_number($number){
	return $number * 2;
}

/**
 * Sum given array
 * 
 * @param unknown $array_data
 * @return number
 */
function sum_array($array_data){
	return array_sum($array_data);
}

function get_product(){
	$product1 = new Product(1,"Bike",2000);

	$product_data = $product1->toString();

	//By Autoloading class example
	echo "product detail from library.<br/>";
	echo $product_data;
}