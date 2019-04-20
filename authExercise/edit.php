
<?php include  'bookconfig.php'?>
<?php
session_start();
?>
<?php
$id=$_GET['id'];
$books=new Books();
$book=$books->getBookBYid($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>PHP Auth | Welcome</title>
</head>
<body>
<?php include 'nav_bar.php' ?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">book edit</div>
        <div class="panel-body">
            <form method="post" action="post_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $book['id']?>">
                    <label for="book_name" class="control-label">Book Name</label>
                    <input type="text" name="book_name" id="book_name" class="form-control" value="<?php echo $book['book_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="book_cover" class="control-label">Book Cover</label>
                    <input style="heigh" type="file" name="book_cover" id="book_cover" class="form-control">
                </div>
                <div class="form-group">
                    <label for="book_file" class="control-label">Book File</label>
                    <input style="height: auto" type="file" name="book_file" id="book_file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cat-id" class="control-label">Cat Id</label>
                    <select name="cat_id" class="form-control">
                        <option value="">Select Category</option>
                        <?php

                        $cat_row=new Books();
                        $cats=$cat_row->getCategory();
                        foreach ($cats as $cat):
                            ?>
                            <option <?php if($book['cat_id']==$cat['id']){echo "selected";} ?> value="<?php echo $cat['id']?>"><?php echo $cat['cat_name']?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>



<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html