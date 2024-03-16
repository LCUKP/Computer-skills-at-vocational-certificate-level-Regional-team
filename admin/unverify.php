<?php
    if(!empty($_GET["id"])){
    include "../dbcon.php";
    $verify = "SELECT * FROM account WHERE acc_id = '$_GET[id]'";
    $result = mysqli_query($con,$verify);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $id = $_GET["id"];
    if($row["verify"] == "Y"){
        $sql = "UPDATE account
        SET verify = 'U'
        WHERE acc_id = $id";
    } elseif($row["verify"] == "N"){
        $sql = "UPDATE account
        SET verify = 'U'
        WHERE acc_id = $id";
    } elseif($row["verify"] == "U"){
        $sql = "UPDATE account
        SET verify = 'N'
        WHERE acc_id = $id";
    }
    $update = mysqli_query($con,$sql);

    if($update){
        if($row["type"] == "U"){
            header("Location: show-user.php");
        }elseif($row["type"] == "S"){
            header("Location: show-seller.php");
        }elseif($row["type"] == "R"){
            header("Location: show-rider.php");
        }
    }
}

?>