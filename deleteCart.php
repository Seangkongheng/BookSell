<?php

session_start();
if (isset($_GET['id'])){
$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
    unset($cart[$id]);
$_SESSION["cart"] = array_values($_SESSION["cart"]);

header('Location: index.php');

    echo $id ;
}
else
{
    echo "ID NOT FOUND";
}
?>


  
 ?>