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
        <a href="show/1000/sithuphyo">Go show</a>
        <div class="col-md-4 col-md-offset-4">
            <h1>Send Email</h1>
            <form method="post" action="send">
            <div class="form-group">
                <input type="email" class="form-control" name="sender_email" id="sender_email" placeholder="Enter your Sender-email">
            </div>
            <div class="form-group">
                <input type="email" name="receiver_email" id="receiver_email" placeholder="Enter your Receiver_email">
            </div>
            <div class="form-group">
                <input type="text" name="subject" id="subject" placeholder="Enter your send subject">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="body" ></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">send</button>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
