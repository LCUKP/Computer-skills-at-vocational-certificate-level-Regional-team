<?php 

include('../Page/dbconnect.php');

if(isset($_GET['SelID'])){
    $SelID=$_GET['SelID'];
    $sql="UPDATE tb_seller SET verify='Y' WHERE SelID=$SelID ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location:showdataseller.php");
    }
}elseif(isset($_GET['RiderID'])){
    $RiderID=$_GET['RiderID'];
    $sql="UPDATE tb_rider SET verify='Y' WHERE RiderID=$RiderID ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location:showdatarider.php");
    }
}else{
    $UserID=$_GET['UserID'];
    $sql="UPDATE tb_user SET verify='Y' WHERE UserID=$UserID ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location:showdatauser.php");
    }
}
?>