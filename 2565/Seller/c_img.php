<?php
include('../Page/dbconnect.php');

if(isset($_FILES['fdImage']['name'])){
        $FoodID=$_POST['FoodID'];
        $dir="fdimg/";
        $filename=$dir.basename($_FILES["fdImage"]["name"]);
        move_uploaded_file($_FILES["fdImage"]["tmp_name"],$filename);
        $fdImage=basename($_FILES["fdImage"]["name"]);
    
        $sql="UPDATE tb_food SET
            fdImage='$fdImage'
            WHERE FoodID = '$FoodID'
        ";
    
        $result=mysqli_query($connect,$sql);
        if($result){
            header("location:showfdmenu.php");
    }
    
    }
?>