<?php

    $getpath = $_GET['path'];
    if ($getpath = 'user') {
        unset($_SESSION['acc_id_type_U']);
    } elseif ($getpath = 'seller') {
        unset($_SESSION['acc_id_type_S']);
    } elseif ($getpath = 'Admin') {
        unset($_SESSION['acc_id_type_A']);
    } elseif ($getpath = 'rider') {
        unset($_SESSION['acc_id_type_R']);
    }

    header("location: ../index.php");
?>