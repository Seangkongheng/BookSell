<?php
session_start();
// session_destroy();
unset($_SESSION['user']);
    $_SESSION['message'] = '<script>alert("You login You has been logout.")</script>';
    header("Location: index.php");




?>