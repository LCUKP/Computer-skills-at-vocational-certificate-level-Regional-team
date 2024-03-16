<?php
include "../dbcon.php";
session_start();
$data = fetchArray("SELECT * from account where acc_id = $_GET[id]");
$dir = '../img/';
$filename = basename($_FILES['pic']['name']);
$path = $dir . $filename;

if ($filename) {
    if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
        $sql = "UPDATE account 
        SET acc_name = '$_POST[name]',
        acc_lname = '$_POST[lname]',
        acc_phone = '$_POST[phone]',
        acc_address = '$_POST[address]',
        acc_img = '$path'
        WHERE acc_id = $data[acc_id];
        ";
    }
} else {
        $sql = "UPDATE account 
        SET acc_name = '$_POST[name]',
        acc_lname = '$_POST[lname]',
        acc_phone = '$_POST[phone]',
        acc_address = '$_POST[address]'
        WHERE acc_id = $data[acc_id];
        ";
}

echo $sql;

if (mysqli_query($con, $sql)) {
    header('location: ../'.$_GET['path'].'/page.php');
}