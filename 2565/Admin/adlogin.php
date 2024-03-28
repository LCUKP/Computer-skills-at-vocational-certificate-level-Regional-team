<?php
include('../page/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">

</head>
<body>
    <div class="justify-content-center m-3">
        <h2>เข้าสู่ระบบแอดมิน</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="Adminname">ชื่อผู้ใช้ :</label>
                <input type="text" name="Adminname" class="form-control">
            </div>
            <div class="form-group">
                <label for="Password">รหัสผ่าน :</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <input type="submit" value="เข้าสู่ระบบ" class="btn btn-success mt-1">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
            <a href="../Page/index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>
        </form>
    </div>

    <?php 
    
    session_start();
    if(isset($_POST['Adminname'])){
        
        $Adminname=$_POST['Adminname'];
        $Password=$_POST['Password'];

        $sql="SELECT * FROM tb_admin WHERE Adminname='".$Adminname."' and Password ='".$Password."' ";
        $result=mysqli_query($connect,$sql);

        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_array($result);

            $_SESSION["AdID"]=$row["AdID"];
            $_SESSION["Adminname"]=$row["Adfname"]." ".$row["Adlname"];

            header("Location:admin-page.php");
                
            

        } 
    }
    ?>
</body>
</html>
