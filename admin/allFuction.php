<?php
$conn = new mysqli('localhost', 'root','','booksell');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Delete row in table book
// if(isset($_POST['btndeleteproduct'])){
//     echo "hello delete";
//     $id=$_POST['bookId'];
//     $sql="DELETE FROM book WHERE book_id='$id'";
//     $result=mysqli_query($conn,$sql);
//     if($result)
//     {
//         header('location:product.php');
//     }
//     else
//     {
//         header('location:product.php');

//     }
// }
$id=$_GET["id"];
$sql="DELETE FROM book WHERE book_id='$id'";
$result=mysqli_query($conn,$sql);
if($result)
{
    header('location:product.php');
}
else
{
    header('location:product.php');
}
//delete check box
if(isset($_POST['btn_delete_check']))
{
    echo "check box";
}

//update row in book you must be write hear

//add category in to database
if(isset($_POST['addcategory']))
{
    $catName=$_POST['name'];
    $catname_sub=$_POST['ddlCategory'];
    $catDecription=$_POST['dectiption'];

    $sql = "INSERT INTO tbl_catagory (name,parrent_id,Decription)
    VALUES ('$catName','$catname_sub','$catDecription')";

$query_run=mysqli_query($conn,$sql);
if($query_run)
{
   header('location:catagory.php');
  }
  else
  {
    header('location:catagory.php');
 }
}
