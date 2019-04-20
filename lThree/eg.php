<?php
$arr=array("One","Two","Three");
$arr1=["one","two","three"];
$arr2=[];
$arr2[0]="four";
$arr2[1]="five";
$arr2[2]="six";

print_r($arr1);
foreach ($arr as $val){
    echo $val."<br>";
}

foreach ($arr2 as $item):
    echo $item."<br>";
    endforeach;

    foreach ($arr1 as $value){
        echo $value."<h1>";
    }