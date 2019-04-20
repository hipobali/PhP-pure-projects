<?php
class User
{
    public function __construct()
    {
        try
        {
            $this->db=new PDO("mysql:host=localhost;dbname=phpLesson","root","root");
        }catch(PDOException $e)
        {
            die("connection Failed");
        }
    }
    public function insert ($Product, $Price)
    {
        $sql="insert into Product (Product_name, Price, created_at) values ('$Product', '$Price', now())";
        $this->db->query($sql);
        header("location:index.php");
    }

    public function getAllData()
    {
        $sql = "select * form Product";
        return $this->db->query($sql);

    }
    public function delete()
    {
        $sql="delete from Product where id='$colName'";
        $this->db->query($sql);
        header("location: index.php");
    }
    public  function update($id,$Product,$Price)
    {
        $sql = "update Product set Product_name='$Product' Price='$Price' id='$id'";
        $this->db->query($sql);
        header("location:index.php");
    }
}