<?php

require '../vendor/autoload.php';

//use classes\module1\Product;

//$product1 = new Product(1,"Bike",2000);

//$product_data = $product1->toString();

//By Autoloading class example
//echo "print for autoloading class example<br/>";
//echo $product_data;

// using calss in lib function and 
// printing product by using library function
get_product();

//Print fot autoloading files
echo "<br/><br/>print for autoloading file example<br/>";
echo "calling function double_number() :".double_number(12);

?>
