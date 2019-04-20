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
    <title>POS | Product</title>
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
            <div class="page-header"><h2>Products</h2></div>
            <table class="table">
                <tr>
                    <td>Images</td>
                    <td>Product Name</td>
                    <td>Price</td>
                   <td>Create User</td>
                    <td>Created Date</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                include 'product_config.php';
                $pds=new Products();
                $pd=$pds->getProduct();
                foreach ($pd as $row):
                    ?>
                    <tr>
                        <td><img src="products/<?php echo $row['images'] ?>" style="width: 100px" class="img-circle"></td>
                        <td><?php echo $row['p_name'] ?></td>
                        <td><?php echo $row['price'] ?> MMK</td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo date('D, M, Y / h:i A', strtotime($row['created_at'])) ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </table>
        </div>
    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
