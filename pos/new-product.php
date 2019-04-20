<?php
include 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | New Product</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php include 'side_bar.php' ?>

        </div>
        <div class="col-md-9">
            <?php
            if(isset($_SESSION['err'])){
                ?>
                <div class="alert alert-danger"><?php echo $_SESSION['err'] ?></div>
                <?php
            }
            unset($_SESSION['err']);

            ?>
            <?php
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success"><?php echo $_SESSION['info'] ?></div>
                <?php
            }
            unset($_SESSION['info']);

            ?>
            <div class="page-header"><h2>New Product</h2></div>
            <form method="post" action="post_new_product.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="control-label">Product Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price" class="control-label">Prices</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="images" class="control-label">Images</label>
                    <input type="file" name="images" id="images" class="form-control" style="height: auto">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
