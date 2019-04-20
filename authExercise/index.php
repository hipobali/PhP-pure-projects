<?php include 'puplic_config.php'?>
<?php
session_start();
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
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Search box</div>
                <div class="panel-body">
                    <form class="navbar-form navbar-left" role="search" method="get" action="index.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="book_name" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Categories
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php
                        $get_cat=new myPublic();
                        $cats=$get_cat->getCategory();
                        foreach ($cats as $cat):
                         ?>
                            <li class="list-group-item"><a href="index.php?cat_id=<?php echo $cat['id']?>" ><?php echo $cat['cat_name'] ?></a></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-primary">
                <div class="panel-heading">Books</div>
                <div class="panel-body bg-danger" >
                    <?php
                    $cat_id=$_GET['cat_id'];
                    $book_name=$_GET['book_name'];
                    if($book_name){
                        $book=$get_cat->searchBook($book_name);
                    }else{
                        $book=$get_cat->getBooks($cat_id);
                    }

                    foreach ($book as $books):
                        ?>
                        <div class="col-md-4 ">
                            <div class="thumbnail" style="background-color: #c7254e">
                                <img src="book_cover/<?php echo $books['book_cover']?>" style="width: 100px;height: 100px" class="img-rounded " >
                                <h3 class="text-center text-primary"><?php echo $books['book_name']?></h3>
                                <p>Upload-on:<?php echo date('D-m-Y',strtotime('created_at'))?></p>
                                <a class="btn btn-primary btn-block " href="book_file">Download</a>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
p


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html