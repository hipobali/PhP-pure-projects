<?php
session_start ();
class User{
    public function __construct ()
    {
        try{
            $this->db=new PDO('mysql:host=localhost;dbname=phpAuth', 'root', 'root');
        }catch (PDOException $e){
            die("Connection failed to database.");
        }
    }
    public function login($email, $password){
        if($email){
            $user="select email, password from Users where email='$email'";
            $db_user=$this->db->query ($user)->fetch (PDO::FETCH_ASSOC);
            if($db_user){
                if($password){
                    $db_password=$db_user['password'];
                    $enc_password=md5 ($password);
                    if($db_password==$enc_password){
                        $_SESSION['login']=$email;
                        header("location: dashboard.php");
                    }else{
                        $_SESSION['error']="The selected password is invalid.";
                        header("location: login.php");
                    }
                }else{
                    $_SESSION['error']="The password field is required.";
                    header("location: login.php");
                }
            }else{
                $_SESSION['error']="The selected email is invalid.";
                header("location: login.php");
            }
        }else{
            $_SESSION['error']="The email field is required.";
            header("location: login.php");
        }
    }
    public function register($name, $email, $password, $password_again){
        if($name){
            if($email){
                $user="select email from Users where email='$email'";
                $db_email=$this->db->query ($user)->fetch (PDO::FETCH_ASSOC);
                if(!$db_email['email']){
                    if($password){
                        if($password_again){
                            if($password==$password_again){
                                $enc_password=md5 ($password);
                                $sql="insert into Users (name, email, password, created_at) values ('$name', '$email', '$enc_password', now())";
                                $this->db->query ($sql);
                                $_SESSION['success']="The user account have been created.";
                                header("location: register.php");
                            }else{
                                $_SESSION['error']="The password and password again filed must match.";
                                header("location: register.php");
                            }
                        }else{
                            $_SESSION['error']="The password again field is required.";
                            header("location: register.php");
                        }
                    }else{
                        $_SESSION['error']="The password field required.";
                        header("location: register.php");
                    }
                }else{
                    $_SESSION['error']="The selected email is exists.";
                    header("location: register.php");
                }
            }else{
                $_SESSION['error']="The email field is required.";
                header("location: register.php");
            }
        }else{
            $_SESSION['error']="The username field is required.";
            header("location: register.php");
        }
    }
}