<?php
session_start();
include "../dbcon.php";
$orderid = $_GET['id'];

$sql = "INSERT INTO job (order_id, acc_id)
VALUES ($orderid, $_SESSION[acc_id_type_R])";
$sql2 = "UPDATE orderr
SET done = 1
where order_id = $orderid";

if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
    header("location: page.php");
}