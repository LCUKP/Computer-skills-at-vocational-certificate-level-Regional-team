<?php 
include('../Page/dbconnect.php');
if(isset($_POST['SelID'])){
    $SelID=$_POST['SelID'];
    $Res_name=$_POST['Res_name'];
    $Sellername=$_POST['Sellername'];
    $Password=$_POST['Password'];
    $Seladdress=$_POST['Seladdress'];
    $Selphone=$_POST['Selphone'];

    $dir="Simg/";
    $filename=$dir.basename($_FILES["Selimage"]["name"]);
    move_uploaded_file($_FILES["Selimage"]["tmp_name"],$filename);
    $Selimage=basename($_FILES["Selimage"]["name"]);

    $sql="UPDATE tb_seller SET
        Res_name='$Res_name',
        Sellername='$Sellername',
        Password='$Password',
        Seladdress='$Seladdress',
        Selphone='$Selphone',
        Selimage='$Selimage'
        WHERE SelID = '$SelID' ";

    $result=mysqli_query($connect,$sql);
    if($result){
        header("location:dataseller.php");
    }
}

?>