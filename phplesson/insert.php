<?php
include 'linki.php';


$Product=$_POST['Product_name'];
$Price=$_POST['Price'];

$user=new User();
$user->insert ($Product,$Price);
