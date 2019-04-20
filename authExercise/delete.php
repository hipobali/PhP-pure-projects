<?php
include 'cat_config.php';
$id=$_GET['id'];
$user=new Category();
$user->deleteCategory($id);