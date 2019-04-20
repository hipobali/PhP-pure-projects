<?php
include 'cat_config.php';

$cat_name=$_POST['cat_name'];

$cat=new Category();
$cat->deleteCategory($cat_name);