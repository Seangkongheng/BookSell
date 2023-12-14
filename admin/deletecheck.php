
<?php
session_start();
$conn = new mysqli('localhost', 'root','','booksell');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

    if(isset($_POST['btn_delete_check']))
    {
       $checkbok= count( $_POST['delete']);
     $checkbok=$_SESSION["Checkbook"];
        $i=0;
        while($i<$checkbok){
            $keyDelete=$_POST['delete'][$i];
            $sql="DELETE FROM book WHERe book_id ='$keyDelete' ";
            $query_run=mysqli_query($conn,$sql);
            $i++;
        }
        header('location:product.php');
    }
?>