<?php
include 'bookconfig.php';
$book_name=$_GET['book_name'];
$user=new Books();
$user->deleteBooks($book_name);