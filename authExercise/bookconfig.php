<?php
session_start ();
class Books
{
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=phpAuth', 'root', 'root');
        } catch (PDOException $e) {
            die("Connection failed to database.");
        }

    }
    public function getCategory(){

        $sql="select * from category ORDER BY id DESC ";
        return $this->db->query($sql);

    }

    public function newBook($book_name,$book_cover,$book_file,$cat_id)
    {
        $book_cover_name=$book_cover['name'];
        $book_cover_tmp=$book_cover['tmp_name'];
        $book_file_name=$book_file['name'];
        $book_file_tmp=$book_file['tmp_name'];
        {
            $sql = "insert into books (book_name,book_cover,book_file,cat_id,created_at) values ('$book_name','$book_cover_name','$book_file_name','$cat_id',now())";
            $this->db->query($sql);
            move_uploaded_file($book_cover_tmp,"book_cover/$book_cover_name");
            move_uploaded_file($book_file_tmp,"book_file/$book_file_name");
            header("location:dashboard.php");
        }
    }
    public function getBook()
    {
        $sql="select category.cat_name,books.* from books left join category on books.cat_id=category.id";
        return $this->db->query($sql);
    }
    public function deleteBooks($book_name)
    {
        $sql="select * from books where book_name='$book_name'";
        $row=$this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $book_cover=$row['book_cover'];
        $book_file=$row['book_file'];
        unlink("book_cover/$book_cover");
        unlink("book_file/$book_file");

        $delsql="delete from books where  book_name='$book_name'";
        $this->db->query($delsql);
        header('location: dashboard.php');
    }
    public function getBookBYid($id)
    {
        $sql="select * from books where id='$id'";
      return  $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);

    }
    public function updateBook($id,$book_name,$book_cover,$book_file,$cat_id)
    {
        $book_cover_name=$book_cover['name'];
        $book_cover_tmp=$book_cover['tmp_name'];
        $book_file_name=$book_file['name'];
        $book_file_tmp=$book_file['tmp_name'];

        if ($book_cover_name && $book_file_name){
            $sql="update books set book_file='$book_file_name', book_cover='$book_cover_name',book_name='$book_name',cat_id='$cat_id' where id='$id'";
            move_uploaded_file($book_cover_tmp,"book_cover/$book_cover_name");
            move_uploaded_file($book_file_tmp,"book_file/$book_file_name");

        }elseif($book_cover_name){
            $sql="update books set book_cover='$book_cover_name',book_name='$book_name',cat_id='$cat_id' where id='$id'";
            move_uploaded_file($book_cover_tmp,"book_cover/$book_cover_name");

        }elseif($book_file_name){
            $sql="update books set book_file='$book_file_name',book_name='$book_name',cat_id='$cat_id' where id='$id'";
            move_uploaded_file($book_file_tmp,"book_file/$book_file_name");

        }else{
            $sql="update books set book_name='$book_name', cat_id='$cat_id' where id='$id'" ;
        }
        $this->db->query($sql);
        header("location:dashboard.php");
    }
}