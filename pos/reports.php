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
    <title>POS | Dashboard</title>
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
            include 'order_config.php';
            $myOrder=new Order();
            $myOrders=$myOrder->getOrder();
            foreach ($myOrders as $od){
                ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                    Invoice ID:<?php echo $od['id'] ?>
                    Customer :<?php echo $od['customer']?>
                    Date :<?php echo date('d-M-Y:,h:i:A',strtotime($od['created_at'])) ?>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    $order_id=$od['id'];
                    $order_item=$myOrder->getOrder_item($order_id);
                    ?>
                    <table class="table">
                        <tr>
                            <td>Item-name</td>
                            <td>Price</td>
                            <td>Qty</td>
                            <td>Amount</td>
                        </tr>
                        <?php
                        $totalAmount=0;
                        foreach ($order_item as $od_item){
                            $totalAmount+=$od_item['price']*$od_item['qty'];
                            ?>
                            <tr>
                                <td><?php echo $od_item['item_name']?></td>
                                <td><?php echo $od_item['price']?></td>
                                <td><?php echo $od_item['qty']?></td>
                                <td><?php echo $od_item['price']*$od_item['qty'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td>Total-Amount</td>
                            <td><?php echo $totalAmount?></td>
                        </tr>
                    </table>

                </div>
                <div class="panel-footer">
                    <a target="_blank" href="print.php?id=<?php echo $od['id'] ?>"><span class="glyphicon glyphicon-print"></span> </a>
                </div>
                <?php
            }
            ?>
        </div>

    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>
