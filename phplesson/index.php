<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'na_var.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">My Product</div>
            <div class="panel-body">
                <form role="form" method="post" action="insert.php">
                    <div class="form-group">
                        <label for="name" class="control-label">Product_name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="number" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">My Product Data</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>id</th>
                            <th>Product_name</th>
                            <th>Price</th>
                            <th>date</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        <?php
                        include 'linki.php';
                        $myObj=new User();
                        $myVar=$myObj->getAllData();
                        foreach ($myVar as $row):
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['Product_name']?></td>
                            <td><?php echo $row['Price']?></td>
                            <td><?php echo Date('D-n-Y:h:i A'),strtotime($row['created at'])?></td>
                            <td><a href="#" data-toggle="modal" data-target="#<?php echo $row['id']?>">Edit</a> </td>
                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><?php echo $row['Product_name'] ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="update.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <div class="form-group">
                                                    <input value="<?php echo $row['Product_name'] ?>" type="text" name="name" class="form-control" placeholder="Enter Name">
                                                </div>
                                                <div class="form-group">
                                                    <input value="<?php echo $row['Price'] ?>" type="number" name="number" class="form-control" placeholder="Enter Price">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg">Save Change</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td><a href="delete.php?myId=<?php echo $row['id'] ?>">Delete</a></td>
                        </tr>
                        <?php
                        endforeach;
                        ?>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

