
<?php include 'auth.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="dataTable.css" rel="stylesheet">
    <title>PHP Auth | Dashboard</title>
</head>
<body>
<?php include 'nav_bar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
            <div class="panel-heading"> book list</div>
            <div class="panel-body">
                <table class="table" id="table">
                    <thead>
                    <tr>
                        <td>book_name</td>
                        <td>book_cover</td>
                        <td>book_file</td>
                        <td>category</td>
                        <td>date</td>
                        <td>delete</td>
                        <td>edit</td>
                    </tr>
                    </thead>
                    <?php
                    include 'bookconfig.php';
                    $book=new Books();
                    $books=$book->getBook();
                    foreach ($books as $row):
                    ?>
                    <tr>
                        <td><?php echo $row['book_name']?></td>
                        <td><img src="book_cover/<?php echo $row['book_cover'] ?>" style="width: 60px "height="60px"> </td>
                        <td><a href="book_file/<?php  echo $row['book_file']?>">Download</a> </td>
                        <td><?php echo $row['cat_name']?></td>
                        <td><?php  echo date('d-m-y / h:i A',strtotime($row['created_at']))?></td>
                        <td><a  href="bookdelete.php?book_name=<?php  echo $row['book_name']?>">Delete</a> </td>
                        <td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a> </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
            <div class=" panel-heading">
                New books
            </div>
            <div class="panel-body">
                <form method="post" action="post_book.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="book_name" class="control-label">Book Name</label>
                        <input type="text" name="book_name" id="book_name" class="form-control">
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
                            <option value="<?php echo $cat['id']?>"><?php echo $cat['cat_name']?></option>
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
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="dataTable.js"></script>
<script>
    $("#table").dataTable();
</script>
</body>
</html>