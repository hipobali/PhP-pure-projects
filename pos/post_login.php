<?php
include 'user_config.php';

$email=$_POST['email'];
$password=$_POST['password'];

$user=new User();
$user->login($email, $password);