<?php 
session_start();
unset($_SESSION['AdID']);
header("Location:adlogin.php")
?>