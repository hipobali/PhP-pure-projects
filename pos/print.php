<?php
include 'order_config.php';
$id=$_GET['id'];
$order=new Order();
$row=$order->getOrderById($id)->fetch(PDO::FETCH_ASSOC);
?>
<?php include 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS | Print</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>


<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <h1 class="text-center">MY RO Coffee Shop</h1>
          <p class="text-center">THATON</p>
         <p> Invoice-ID:<?php echo $row['id']?></p>
          <p>Name: <?php echo $row['customer'] ?></p>
          <?php
          $order_id=$row['id'];
          $order_item=$order->getOrder_item($order_id);
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
    </div>
</div>


<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

