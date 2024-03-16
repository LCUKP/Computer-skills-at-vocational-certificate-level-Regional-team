<?php 
include "../dbcon.php";
if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $sql = "DELETE FROM food WHERE food_id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: page.php");
    }
}

?>