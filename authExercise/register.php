<?php session_start (); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <title>PHP Auth | Register</title>
</head>
<body>
<?php include 'nav_bar.php' ?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
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
            <h1 class="text-center text-primary">PHP Auth </h1>
            <h3 class="text-center text-danger">Register</h3>
            <form method="post" action="post_register.php">
                <div class="form-group">
                    <label for="name" class="control-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_again" class="control-label">Password Again</label>
                    <input type="password" name="password_again" id="password_again" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Signup</button>
                </div>
            </form>
            Already have and account ? <a href="login.php">Login</a>
        </div>
    </div>
</div>


<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>