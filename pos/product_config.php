<?php
session_start();
include 'db_config.php';

class Products extends DB {
    public function postUpdate($id, $p_name, $price, $images){
        $img_name=$images['name'];
        $img_file=$images['tmp_name'];
        if($img_name){
            $myData="select images from products where id='$id'";
            $row=$this->db->query($myData)->fetch(PDO::FETCH_ASSOC);
            $db_images=$row['images'];
            unlink("products/$db_images");

            $sql="update products set p_name='$p_name', price='$price', images='$img_name' where id='$id'";

            move_uploaded_file($img_file, "products/$img_name");

        }else{
            $sql="update products set p_name='$p_name', price='$price' where id='$id'";
        }

        $this->db->query($sql);
        header("location: product.php");
    }
    public function getProductById($id){
        $sql="select * from products where id='$id'";
        return $this->db->query($sql);
    }
    public function getSearch($q){
        $sql="select * from products where p_name LIKE '%$q%'";
        return $this->db->query($sql);
    }
    public function getProduct(){
        $sql="select users.*, products.* from products left JOIN users on users.id=products.user_id";
        return $this->db->query($sql);
    }
    public function getCart($id)
    {
        $sql = "select * from products WHERE id IN ($id)";
        return $this->db->query($sql);
    }
        public function newProduct($name, $price, $images){
        $img_name=$images['name'];
        $img_file=$images['tmp_name'];

        if($name){
            if($price){
                if($img_name){
                    $user_id=$_SESSION['user_id'];
                    $sql="insert into products (p_name, price, images, user_id, created_at)
                          values ('$name' ,'$price', '$img_name', '$user_id', now())";
                    $this->db->query($sql);


                    move_uploaded_file($img_file, "products/$img_name");
                    $_SESSION['info']="The product have been created.";
                    header("location: new-product.php");


                }else{
                    $_SESSION['err']="The product images field is selected required.";
                    header("location: new-product.php");
                }
            }else{
                $_SESSION['err']="The product price field is required.";
                header("location: new-product.php");
            }
        }else{
            $_SESSION['err']="The product name field is required.";
            header("location: new-product.php");
        }

    }
}