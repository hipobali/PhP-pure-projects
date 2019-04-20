<?php
class My{
    public $name="mgmg";
    public function getName(){
        echo $this->name;

    }
}

$user=new My();
  $user->getName();