<?php
include 'product_config.php';

$id=$_POST['id'];
$p_name=$_POST['name'];
$price=$_POST['price'];
$images=$_FILES['images'];

$pd=new Products();
$pd->postUpdate($id, $p_name, $price, $images);