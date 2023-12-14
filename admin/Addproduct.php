<?php
session_start();
$conn = new mysqli('localhost', 'root','','booksell');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
category_tree(1);
//recusvie funtion
function category_tree($parrent_id){
  global $conn;
  $sql ="SELECT * from tbl_catagory whre parrent_id='".$parrent_id."'";
  $query_run=mysqli_query($conn,$sql);
}

//add book
if(isset($_POST['addmovie']))
{
    $title_movie=$_POST['movieTitle'];
    $Mv_catagory=$_POST['catagory'];
    echo $Mv_catagory;
    $book_price=$_POST['price'];
    $book_author=$_POST['author'];
    $book_stock=$_POST['stock'];

    $image=$_FILES['image_book']['name'];
    $image_temp=$_FILES['image_book']['tmp_name'];
    $folder="upload/".$image;
    $sql = "INSERT INTO book (book_title,catagory,price,Author,stock,image)
    VALUES ('$title_movie','$Mv_catagory','$book_price','$book_author','$book_stock','$image')";
    $query_run=mysqli_query($conn,$sql);
    if($query_run)
    {

        move_uploaded_file($image_temp, $folder);
        header('location: product.php');

      }
      else
      {
       echo "not successfull";
     }
}
//
?>