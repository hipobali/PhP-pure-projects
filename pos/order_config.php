<?php
session_start();
include 'db_config.php';

class Order extends DB{
    public function getOrderById($id){
        $sql="select * from myOrder WHERE id='$id'";
        return $this->db->query($sql);
    }
    public function getOrder_item($order_id){
        $sql="select * from Order_items WHERE order_id IN ($order_id)";
        return $this->db->query($sql);
    }
    public function getOrder(){
        $sql="select * from myOrder ORDER BY id DESC ";
        return $this->db->query($sql);
    }
    public function CheckOut($customer){
        $sql="insert into myOrder (customer,created_at)
              values ('$customer',now())";
        $this->db->query($sql);

        $order_id=$this->db->lastInsertId();
        foreach ($_SESSION['cart'] as $id=>$qty){
            $get_sql="select * from products where id IN ($id)";
            $get_row=$this->db->query($get_sql);
            foreach ($get_row as $my_row){
                $item_name=$my_row['p_name'];
                $price=$my_row['price'];
                
                $item_sql="insert into Order_items (item_name,price,qty,order_id)
                           values ('$item_name' , '$price' ,'$qty','$order_id')";
                $this->db->query($item_sql);
                unset($_SESSION['cart']);
                header('location:index.php');
            }
        }

    }
}