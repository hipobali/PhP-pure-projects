<?php

$arr=[];
$arr["name"]="mgmg";
$arr["email"]="mgmg@gmail";
$arr["address"]="Bago";


$arr1=["name"=>"aungaung","email"=>"aung@gmail","address"=>"Yangon"];


foreach ($arr as $key=>$value){
    echo $key."=".$value."<br>";
}

foreach ($arr1 as $key=>$value):
    echo $key."=".$value."<br>";
    endforeach;
