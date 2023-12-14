<?php
	session_start();
	unset($_SESSION['cart']);
	 //alert message in successfull
     $_SESSION['message'] = '<script>alert("clear cart successfull.")</script>';
	header('location: viewcart.php');
?>