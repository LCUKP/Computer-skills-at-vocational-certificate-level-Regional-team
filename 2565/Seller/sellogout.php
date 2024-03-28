<?php 

session_start();
unset($_SESSION['SelID']);
header("Location: sellogin.php");

?>