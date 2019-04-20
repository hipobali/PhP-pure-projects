<?php
include 'order_config.php';
$customer=$_POST['customer'];

$order=new Order();
$order->CheckOut($customer);