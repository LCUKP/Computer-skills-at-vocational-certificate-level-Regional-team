<?php 
include "dbcon.php";
if(!empty($_POST["username"])){
    $acc_username = $_POST["username"];
    $acc_password = $_POST["password"];
    $acc_name = $_POST["name"];
    $acc_lname = $_POST["lname"];
    $acc_phone = $_POST["phone"];
    $acc_address = $_POST["address"];
    $type = $_POST["type"];
    $verify = "N";
    // echo $type == "U";
    
    $dir = "img/";
    $filename = basename($_FILES['pic']['name']);
    $path = $dir . $filename;

    if($_POST["type"] == "U"){
        if ($filename) {
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_lname,acc_phone,acc_address,type,verify, acc_img)
                VALUES ('$acc_username','$acc_password','$acc_name','$acc_lname','$acc_phone','$acc_address','$type','$verify', '$path')";
              }     
            } else {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_lname,acc_phone,acc_address,type,verify) 
                VALUES($acc_username,$acc_password,$acc_name,$acc_lname,$acc_phone,$acc_address,$type,$verify)";
        }
        // echo $sql;
        // mysqli_query($con, $sql);
        $result = mysqli_query($con, $sql);

    }elseif($_POST["type"] == "S"){

        if ($filename) {
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_phone,acc_address,type,verify, acc_img)
                VALUES ('$acc_username','$acc_password','$acc_name','$acc_phone','$acc_address','$type','$verify', '$path')";
              }     
            } else {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_phone,acc_address,type,verify) 
                VALUES($acc_username,$acc_password,$acc_name,$acc_phone,$acc_address,$type,$verify)";
        }
        // echo $sql;
        // mysqli_query($con, $sql);
        $result = mysqli_query($con, $sql);

    }elseif($_POST["type"] == "R"){

        if ($filename) {
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_lname,acc_phone,acc_address,type,verify, acc_img)
                VALUES ('$acc_username','$acc_password','$acc_name','$acc_lname','$acc_phone','$acc_address','$type','$verify', '$path')";
              }     
            } else {
                $sql = "INSERT INTO account(acc_username,acc_password,acc_name,acc_lname,acc_phone,acc_address,type,verify) 
                VALUES($acc_username,$acc_password,$acc_name,$acc_lname,$acc_phone,$acc_address,$type,$verify)";
        }
        // echo $sql;
        // mysqli_query($con, $sql);
        $result = mysqli_query($con, $sql);

    }

    if($result) {
        header("Location: index.php");
    }
}

?>