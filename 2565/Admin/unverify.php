<?php 

include('../Page/dbconnect.php');

if(isset($_GET['SelID'])){
    faceid
}elseif(isset($_GET['RiderID'])){
    $RiderID=$_GET['RiderID'];
    $sql="UPDATE tb_rider SET verify='N' WHERE RiderID=$RiderID ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location:showdatarider.php");
    }
}else{
    $UserID=$_GET['UserID'];
    $sql="UPDATE tb_user SET verify='N' WHERE UserID=$UserID ";
    $result=mysqli_query($connect,$sql);
    if($result){
        header("Location:showdatauser.php");
    }
}

?>