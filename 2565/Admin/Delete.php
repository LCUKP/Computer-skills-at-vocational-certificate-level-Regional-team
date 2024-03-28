<?php 
include("../Page/dbconnect.php");

if(isset($_GET['UserID'])){
    $UserID=$_GET['UserID'];

    $sql="UPDATE tb_user SET verify='W' WHERE UserID=$UserID ";
    $result=mysqli_query($connect,$sql);

    if($result){
        header("Location:showdatauser.php");
    } else{
        echo mysqli_error($connect);
    }
} elseif(isset($_GET['SelID'])){
    $SelID=$_GET['SelID'];

    $sql="DELETE FROM tb_seller WHERE SelID=$SelID";
    $result=mysqli_query($connect,$sql);

    if($result){
        header("Location:showdataseller.php");
    } else{
        echo mysqli_error($connect);
    }
}else{
    $RiderID=$_GET['RiderID'];

    $sql="DELETE FROM tb_rider WHERE RiderID=$RiderID";
    $result=mysqli_query($connect,$sql);

    if($result){
        header("Location:showdatarider.php");
    } else{
        echo mysqli_error($connect);
    }
}
?>