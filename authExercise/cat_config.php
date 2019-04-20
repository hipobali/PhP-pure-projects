<?php
session_start();
class Category
{
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=phpAuth', 'root', 'root');
        } catch (PDOException $e) {
            die("Connection failed ");
        }
    }

    public function insert($cat_name)
    {
        if ($cat_name) {
            $sql = "select * from category where cat_name='$cat_name'";
            $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                $mySql = "insert into category (cat_name) values ('$cat_name')";
                $this->db->query($mySql);
                $_SESSION['success'] = "the Category have been created";
                header("location: category.php");
            } else {
                $_SESSION['error'] = "the selected category name is exists";
                header("location:category.php");
            }
        } else {
            $_SESSION['error'] = "Category name failed is required";
            header("location: category.php");
        }
    }

    public function getCategory(){

        $sql="select * from category ORDER BY id DESC ";
        return $this->db->query($sql);

    }
    public function deleteCategory($id){
        $sql="delete from category where id='$id'";
        $this->db->query($sql);
        header('location:category.php');
    }
}
