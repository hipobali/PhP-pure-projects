<?php
include 'linki.php';

$id=$_GET['myId'];


$user=new User();
$user->delete($id);
