<?php 
session_start();
include "dbcon.php";
include "function/style.php";

if(!empty($_POST["acc_username"])){
    $acc_username = $_POST["acc_username"];
    $acc_password = $_POST["acc_password"];

    $sql = "SELECT * FROM account WHERE acc_username = '$acc_username' AND acc_password = '$acc_password'";
    $result = fetchArray($sql);
        if($result!=NULL){
            if($result["type"] == "A") {
                $_SESSION["acc_id_type_A"] = $result["acc_id"];
                header("Location: admin/page.php");
            } 
            elseif($result["type"] == "U") {
                $_SESSION["acc_id_type_U"] = $result["acc_id"];
                header("Location: user/page.php");
            }
            elseif($result["type"] == "S") {
                $_SESSION["acc_id_type_S"] = $result["acc_id"];
                header("Location: seller/page.php");
            }
            elseif($result["type"] == "R") {
                $_SESSION["acc_id_type_R"] = $result["acc_id"];
                header("Location: rider/page.php");
            }
        } else { ?>
            <div class="container">
            <p class="display-3 text-center border-bottom p-3 mb-5">รหัสผ่านหรือชือผู้ใช้ไม่ถูกต้อง</p>
            <a href="../index.php">Login</a>
            </div>
        <?php }

    

}

?>