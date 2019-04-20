<?php

$photo_name=$_GET['photo_name'];

unlink("photo/$photo_name");

header("location:index.php");
