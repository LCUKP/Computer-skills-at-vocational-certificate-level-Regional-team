<?php 

session_start();
unset($_SESSION['RiderID']);
header("Location: ridlogin.php");

?>