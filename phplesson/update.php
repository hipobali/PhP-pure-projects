<?php

include 'linki.php';

$id=$_POST['id'];
$Product=$_POST['Product_name'];
$Price=$_POST['Price'];

$user=new User();
$user->update ($id,$Product,$Price);