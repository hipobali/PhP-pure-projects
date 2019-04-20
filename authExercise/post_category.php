<?php
include 'cat_config.php';

$cat_name=$_POST['cat_name'];

$user=new Category();
$user->insert($cat_name);