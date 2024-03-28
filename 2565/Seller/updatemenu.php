<?php 
include('../Page/dbconnect.php');
if(isset($_POST['FoodID'])){
    $FoodID=$_POST['FoodID'];
    $fdName=$_POST['fdName'];
    $fdPrice=$_POST['fdPrice'];
    $fdDiscount=$_POST['fdDiscount'];


    $sql="UPDATE tb_food SET
        fdName='$fdName',
        fdPrice='$fdPrice',
        fdDiscount='$fdDiscount'
        WHERE FoodID = '$FoodID'
    ";

    $result=mysqli_query($connect,$sql);
    if($result){
        header("location:showfdmenu.php");
    }
} else {
    echo "ผิดจ้า";
}


?>