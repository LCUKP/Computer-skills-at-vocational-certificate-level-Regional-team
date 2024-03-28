<?php 

session_start();
include('../Page/dbconnect.php');
$id=$_SESSION['SelID'];
$sql="SELECT * FROM tb_seller WHERE SelID=$id";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
if(!$_SESSION['SelID']){
    header("location:sellogin.php");
} else { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">แก้ไขข้อมูลร้าน</h1>
        <form action="selupdate.php" method="post" enctype="multipart/form-data">
            <img src="Simg/<?php echo $row['Selimage'] ;?>" width="150" class="m-1">
            <input type="file" name="Selimage" accept="image/*" class="form-control">

            <p>รหัสร้าน :</p>
            <input type="text" disabled name="SelID" class="form-control" value="<?php echo $row['SelID']; ?>">
            <input type="hidden" required name="SelID" value="<?php echo $row['SelID']; ?>"><br>

            <p>ชื่อร้าน :</p>
            <input type="text" required name="Res_name" class="form-control" value="<?php echo $row['Res_name']; ?>">

            <p>ชื่อผู้ใช้ :</p>
            <input type="text" required name="Sellername" class="form-control" value="<?php echo $row['Sellername']; ?>">

            <p>รหัสผ่าน :</p>
            <input type="Password" required name="Password" class="form-control" value="<?php echo $row['Password']; ?>">

            <p>ที่อยู่ร้าน :</p>
            <input type="text" required name="Seladdress" class="form-control" value="<?php echo $row['Seladdress']; ?>">

            <p>เบอร์มือถือ :</p>
            <input type="text" required name="Selphone" class="form-control" value="<?php echo $row['Selphone']; ?>">

            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success m-1">
            <a href="dataseller.php" class="btn btn-info">กลับหน้าแรก</a>
        </form>
    </div>
</body>
</html>

<?php

}

?>