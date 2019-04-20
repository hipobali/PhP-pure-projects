<?php

class User{
    public $address="I live in Bago";
    function name(){
        echo "I am mgmg";
        echo "<br>";

    }
    function work(){
        echo "I am work";
        echo "<br>";
    }
    public function __destruct()
    {
      echo "this is destructor";
        echo "<br>";
    }

    public function  __construct()
    {
        echo "This is constructor";
        echo "<br>";
    }


}

$user=new User();
$user->name();
echo "<br>";
$user->work();

$address=new User();
echo $user->address;
