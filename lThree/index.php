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
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <?php

            $dir=scandir("photo");
            for($i=2;$i<count($dir);$i++){

                ?>
                <div class="col-md-3">
                    <div class="thumbnail">

                <img src="photo/<?php echo $dir[$i] ?>" width="100px" height="200px" class="img-rounded">
                <a href="delete.php?photo_name=<?php echo $dir[$i]?>">
                    <span class="glyphicon glyphicon-flash" ></span> </a>
                </div>
                </div>
                <?php

            }

            ?>

        </div>
        <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Upload</div>
            <div class="panel-body">
                <form  role="form" enctype="multipart/form-data" action="upload.php" method="post">
                    <div class="form-group">
                    <label for="photo" class="control-label">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block">Upload</button>
                    </div>

                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>

