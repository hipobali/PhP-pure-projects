<?php
include 'product_config.php';

$name=$_POST['name'];
$price=$_POST['price'];
$images=$_FILES['images'];

$pd=new Products();
$pd->newProduct($name, $price, $images);