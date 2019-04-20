<?php
include 'phpmailer/src/Exception.php';
include 'phpmailer/src/PHPMailer.php';
include 'phpmailer/src/SMTP.php';

$sender_email=$_POST['sender_email'];
$receiver_email=$_POST['receiver_email'];
$subject=$_POST['subject'];
$body=$_POST['body'];
echo $sender_email,$receiver_email,$subject,$body;


$mail = new \PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = false;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'siithuphyo145@gmail.com';                 // SMTP username
    $mail->Password = 'gtbcjwosvoqelbbv';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($sender_email, $sender_email);
    $mail->addAddress($receiver_email, $receiver_email);     // Add a recipient

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>