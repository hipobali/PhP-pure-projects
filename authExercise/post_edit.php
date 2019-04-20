<?php
include 'bookconfig.php';
$id=$_POST['id'];
$book_name=$_POST['book_name'];
$book_cover=$_FILES['book_cover'];
$book_file=$_FILES['book_file'];
$cat_id=$_POST['cat_id'];

$book=new Books();
$book->updateBook($id,$book_name,$book_cover,$book_file,$cat_id);