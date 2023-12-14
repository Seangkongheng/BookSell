<?php

session_start();
if(isset($_SESSION['user']))
{
$id = $_GET['id'];

 if (!in_array($id, $_SESSION['cart'])) {
    //if have card 
    array_push($_SESSION['cart'], $id);
    //alert message in successfull
    $_SESSION['message'] = '<script>alert("Add to card successfull.")</script>';
   

  } else {
    //already add message
    $_SESSION['message'] = '<script>alert("Book already added.")</script>';

  }
header('location:index.php');

}
else
{

  $_SESSION['message'] = '<script>alert("You must bee login")</script>';
  header('location:index.php');
}
?>