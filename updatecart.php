<?php
	session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    // if(isset($_POST['save'])){
    //     foreach($_POST['indexes'] as $key){
    //         $_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
    //     }$cart=0;
    //      $_SESSION['qty_array'][$key];
    //     // $_SESSION['message'] = 'Cart updated successfully';
    //     // header('location: viewcart.php');
    //     // $_SESSION['message'] = '<script>alert("you cart update successfull.")</script>';
    //     echo "successfull";
    //     // header('location: viewcart.php');
    // }
    

    // if(isset($_POST['save'])){
    //     $index=($_POST['indexes']);
    //     foreach( $index as $key){
    //          $_SESSION['qty_array'][$key] = $_POST['qty_'.$key];
    //      }
    
    //     // $_SESSION['message'] = 'Cart updated successfully';
    //      header('location: viewcart.php');
       
    //  }


     
     if (isset($_POST['save'])) {
       
       $index = $_POST['indexes'];
     
       for ($i = 0; $i < count($index); $i++) {
         $qty = $_POST['qty_'. $index[$i]];
         
         echo $qty ."<br>";
         
         $_SESSION['qty']=$qty;
         $_SESSION['qty'];
        //  echo $_SESSION['qty']."<br>";
        // header('location: viewcart.php');
        // $_SESSION['message'] = '<script>alert("you cart update successfull.")</script>';
     
       }
     



     }
     
     
  

    




?>