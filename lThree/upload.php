<?php

$photo_name=$_FILES['photo']['name'];
 $photo_file=$_FILES['photo']['tmp_name'];
 move_uploaded_file($photo_file,"photo/$photo_name");
 header("location:index.php");
