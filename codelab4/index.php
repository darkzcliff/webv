<?php

include "controller/product_controller.php";

use controller\product_controller;

$pc = new product_controller;
echo $pc->getProducts();

?>