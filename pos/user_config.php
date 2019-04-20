<?php
session_start();
include 'db_config.php';

class User extends DB{
    public function login($email, $password){
        if($email){
            $sql="select id, name, email, password from users where email='$email'";
            $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
            if($row['email']){
                if($password){
                    $enc_password=md5($password);
                    $db_password=$row['password'];
                    if($enc_password==$db_password){
                        $_SESSION['login']=$row['name'];
                        $_SESSION['user_id']=$row['id'];
                        header("location: home.php");

                    }else{
                        $_SESSION['err']="The selected password is invalid";
                        header("location: login.php");
                    }

                }else{
                    $_SESSION['err']="The password field is required.";
                    header("location: login.php");
                }

            }else{
                $_SESSION['err']="The selected email is not found on server.";
                header("location: login.php");
            }


        }else{
            $_SESSION['err']="The email field is required.";
            header("location: login.php");
        }

    }
    public function register($name, $email, $password, $password_again){
        if($name){
            if($email){
                $sql="select email from users where email='$email'";
                $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
                if(!$row['email']){
                    if($password){
                        if($password_again){
                            if($password==$password_again){
                                $enc_password=md5($password);
                                $insert="insert into users (name, email, password, created_at) 
                                          values ('$name', '$email', '$enc_password', now())";
                                $result=$this->db->query($insert);
                                if($result){
                                    header("location: login.php");
                                }else{
                                    $_SESSION['err']="The user account signup have been failed.";
                                    header("location: register.php");
                                }

                            }else{
                                $_SESSION['err']="The password and password again field must match.";
                                header("location: register.php");
                            }

                        }else{
                            $_SESSION['err']="The password again field is required.";
                            header("location: register.php");
                        }
                    }else{
                        $_SESSION['err']="The password field is required.";
                        header("location: register.php");
                    }

                }else{
                    $_SESSION['err']="The selected email address is in use.";
                    header("location: register.php");
                }
            }else{
                $_SESSION['err']="The email address field is required.";
                header("location: register.php");
            }
        }else{
            $_SESSION['err']="The username field is required.";
            header("location: register.php");
        }
    }

}