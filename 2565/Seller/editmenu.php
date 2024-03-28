<?php 
include('../Page/dbconnect.php');
$FoodID=$_GET['FoodID'];
$sql="SELECT * FROM tb_food WHERE FoodID=$FoodID";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
if(!isset($_GET['FoodID'])){
    header("Location:showfdmenu.php");
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
    <div class="container">

    <H1>แก้ไขข้อมูลอาหาร</H1>
    <form action="c_img.php" method="post" enctype="multipart/form-data">
            <img src="fdimg/<?php echo $row['fdImage'] ?>" width="150"><br>
            <input type="file" name="fdImage" accept="image/*" >
            <input type="hidden" name="FoodID" value="<?php  echo $row['FoodID'] ?>">
            <input type="submit" value="เปลื่ยนรูปภาพ" class="btn btn-dark">
    </form>

    <p>รหัสสินค้า :</p>
    <form action="updatemenu.php" method="post" enctype="multipart/form-data">
        <input type="text" name="FoodID" required disabled value="<?php  echo $row['FoodID'] ?>">
        <input type="hidden" name="FoodID" value="<?php  echo $row['FoodID'] ?>">

        <p>ชื่อสินค้า :</p>
        <input type="text" name="fdName" required value="<?php  echo $row['fdName'] ?>">
        <p>ราคาสินค้า :</p>
        <input type="text" name="fdPrice" required  value="<?php  echo $row['fdPrice'] ?>">
        <p>ส่วนลดสินค้า :</p>
        <input type="text" name="fdDiscount"   value="<?php  echo $row['fdDiscount'] ?>"> 
        <p>รายละเอียดสินค้า :</p>
        <input type="text" name="fdDetails"   value="<?php  echo $row['fdDetails'] ?>"> 
        <input type="submit" value="บันทึกข้อมูล" class="btn btn-success m-1">
    </form>
    <a href="showfdmenu.php" class="btn btn-info">กลับ</a>
    </div>
</body>
</html>

<?php

}

?>