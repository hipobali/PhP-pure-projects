<?php include 'auth.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>PHP Auth | Dashboard</title>
</head>
<body>
<?php include 'nav_bar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">

            <div class="panel panel-primary">
                <div class="panel-heading">Data of Category</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>id</td>
                            <td>cat_name</td>
                            <td>cancel</td>
                        </tr>
                        <?php
                        include 'cat_config.php';
                        $cats=new Category();
                        $cat=$cats->getCategory();
                        foreach ($cat as $row):
                            ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['cat_name']?></td>
                                <td><a href="delete.php?id=<?php echo $row['id']?>" class="text-danger">Delete</a> </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <?php
            if(isset($_SESSION['error'])){
                ?>
                <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> <?php echo $_SESSION['error'] ?></div>
                <?php
            }
            unset($_SESSION['error']);
            ?>

            <?php
            if(isset($_SESSION['success'])){
                ?>
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok-circle"></span> <?php echo $_SESSION['success'] ?></div>
                <?php
            }
            unset($_SESSION['success']);
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">Category</div>
                <div class="panel-body">
                    <form method="post" action="post_category.php">
                        <div class="form-group">
                            <label for="cat_name" class="control-label">Category name</label>
                            <input type="text" name="cat_name" id="cat_name" class="form-control">
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

<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>