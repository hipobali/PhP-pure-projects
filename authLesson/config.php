<?php
session_start();
class User
{
    public function  __construct()
    {
        try
        {
            $this->db=new PDO('mysql:host=localhost;dbname=phpAuth',"root","root");
        }catch (PDOException $e)
        {
            die("Connection failed");
        }
    }
    public function register($name,$email,$password,$password_again)
    {
        if ($name) {
           if ($email){
               $user="select email from Users where email='$email'";
               $db_email=$this->db->query ($user)->fetch (PDO::FETCH_ASSOC);
               if(!$db_email){
                   if ($password){
                         if ($password_again){
                             if ($password==$password_again){
                                $enc_password=md5($password);
                                 $sql="insert into Users (name,email,password,created_at) values ('$name','$email','$enc_password', now())";
                                $this->db->query($sql);
                                 $_SESSION['success']="account success";
                                header("location:register.php");
                             }else {
                                 $_SESSION['error'] = "The password and password again filed must match.";
                                 header("location: register.php");
                             }
                   }else{
                       $_SESSION['error']="user password_again field is required";
                       header("location:register.php");
                   }
               }else{
                   $_SESSION['error']="user password field is required";
                   header("location:register.php");
               }
               }else{
                   $_SESSION['error']="The selected email is exits";
                   header("location: register.php");
               }
           }else{
               $_SESSION['error']="user email field is required";
               header("location:register.php");
           }
        }else{
            $_SESSION['error']="user name field is required";
            header("location:register.php");
        }
    }
    public function login($email,$password)
    {
        if ($email){
            $user="select email from Users where email='$email'";
            $db_email=$this->$user->query($user)->fetch (PDO::FETCH_ASSOC);
            if ($db_email){
                if ($password){
                    $db_pass=$db_email['password'];
                    $enc_password=md5($password);
                    if($db_pass==$enc_password){
                        $_SESSION['login']=$email;
                        header("location: dashboard.php");
                        }else{
                            $_SESSION['error']="your password is invalid";
                            header("location: login.php");
                    }
                }else{
                    $_SESSION['error']="user password worng";
                    header("location: login.php");
                }
            }else{
                $_SESSION['error']="user email invalid ";
                header("location: login.php");
            }
        }else{
            $_SESSION['error']="user email valid";
            header("location: login.php");

        }
    }
}