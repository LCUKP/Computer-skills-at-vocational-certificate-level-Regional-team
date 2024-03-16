<?php
include "../dbcon.php";
session_start();
$id = $_SESSION['acc_id_type_U'];
$data = fetchArray("SELECT * FROM account WHERE acc_id = $id");
// print_r($data);
$sql = "INSERT INTO orderr (acc_id)
        VALUES ($data[acc_id])";
        echo $sql;
    if (mysqli_query($con, $sql)) {
        $order = fetchArray("SELECT * FROM orderr order by order_id Desc");
        for($i = 0; $i <= count($_SESSION['foodid']) - 1; $i++) {
            $foodid = $_SESSION['foodid'][$i];
            $foodprice = $_SESSION['foodprice'][$i];
            $foodcount = $_SESSION['foodcount'][$i];
            $all = $_SESSION['foodprice'][$i] * $_SESSION['foodcount'][$i];
            $sql = "INSERT INTO order_detail (order_id, food_id, unitprice, count, total)
            values ($order[order_id], $foodid, $foodprice, $foodcount, $all)";
            $resalt = mysqli_query($con, $sql);
        }
        if ($resalt) {
            unset($_SESSION['foodid']);
            unset($_SESSION['foodname']);
            unset($_SESSION['foodprice']);
            unset($_SESSION['foodcount']);
        }
    }

    header("location: recipt.php");