<?php

session_start();
$name=$_REQUEST['user_name'];
$password=$_REQUEST['password'];

if(($name=='admin')&&($password=='admin')){
    $_SESSION['login']=$name;
    header("location:datainput.php");
}else{
    header("location:datainput.php");
}