


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
        <div class="panel panel-primary">
            <div class="panel-heading">My Data</div>
            <div class="panel-body">
                <form role="form" action="show.php" method="post">
                    <div class="form-group">
                        <input type="text" name="user_name" placeholder="Enter your name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-success btn-block">restart</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <?php
            session_start();
            if($_SESSION['login']){
                echo "you are login now";
                echo "<br>";
                echo $_SESSION['login'];
                echo "<a href='logout.php'>logout</a>";
            }else{
                echo "you are guest";
            }
            ?>
        </div>

    </div>
</div>
</body>
</html>