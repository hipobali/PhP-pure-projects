<?php ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'nav_bar.php' ?>
<div class="container">
    <div class="row">
        <form  method="get" action="index.php" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" name="q" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading" style="text-align:center">Products</div>
            <div class="panel-body">
                <?php
                include "product_config.php";
                $pds=new products();
                $q=$_GET['q'];
                if ($q){
                    $row=$pds->getSearch($q);
                }else{
                    $row=$pds->getProduct();
                }

                foreach ($row as $pd){
                    ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="products/<?php echo $pd['images'] ?>" style="width: 200px; height: 150px" class="img-rounded">
                            <p style="text-center text-primary"><strong><?php echo $pd['p_name'] ?></strong></p>
                            <p><strong><?php echo $pd['price']?>MMK </strong></p>
                            <a href="add_to_card.php?id=<?php echo $pd['id'] ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-shopping-cart"></span>Add to card</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
        <div  class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">shopping cart</div>
                <div class="panel-body">
                    <?php if (isset($_SESSION['cart'])){?>
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Amount</td>
                        </tr>
                        <?php
                        $totalAmount=0;
                        foreach ($_SESSION['cart'] as $id=>$qty){
                            $myOrder=$pds->getCart($id);
                            foreach ($myOrder as $od){
                                $totalAmount+=$od['price']*$qty;
                                ?>
                                <tr>
                                    <td><?php echo $od['p_name'] ?></td>
                                    <td><?php echo $od['price']?></td>
                                    <td><?php echo $qty?></td>
                                    <td><?php echo $od['price']*$qty ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?><?php
                        if($totalAmount>0){

                        ?>
                        <tr>
                            <td>totalAmount</td>
                            <td><?php echo $totalAmount ?></td>
                        </tr><?php
                        }?>

                    </table>
                    <a href="cancel_cart.php" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-backward"></span> Cancel</a>

                    <form method="post" action="post_order.php">
                        <div class="form-group">
                            <label for="customer" class="control-label">Customer-Name</label>
                            <input type="text" name="customer" id="customer" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">CheckOut</button>
                        </div>
                    </form>
                    <?php
                    }else{
                        ?>
                        <p><strong> No Items selected</strong></p>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>