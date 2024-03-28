<?php 
include("../Page/dbconnect.php");
session_start();

if(!isset($_SESSION['SelID'])){
    header("Location:Sellogin.php");
} else { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มอาหาร</title>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <div class="m-3">
    <h1>เพิ่มอาหาร</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="">ชื่ออาหาร :</label>
        <input type="text" name="fdName" required class="form-control">
        </div>
        <div class="form-group">
        <label for="">ราคา :</label>
        <input type="text" name="fdPrice" required class="form-control">
        </div>
        <div class="form-group">
        <label for="">รายละเอียด :</label>
        <input type="text" name="fdDetails" class="form-control">
        </div>
        <div class="form-group mb-1">
        <label for="">รูปภาพ :</label>
        <input type="file" name="fdImage" accept="image/*" class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
        <a href="seller-page.php" class="btn btn-warning">กลับหน้าหลัก</a>
    </form>
    </div>
</body>
</html>

<?php } 
if(isset($_POST['fdName'])){
    $fdName=$_POST['fdName'];
    $fdPrice=$_POST['fdPrice'];
    $fdDetails=$_POST['fdDetails'];
    $name=$_SESSION['Seller'];
    $id=$_SESSION['SelID'];

    $dir="fdimg/";
    $filename=$dir.basename($_FILES["fdImage"]["name"]);
    move_uploaded_file($_FILES["fdImage"]["tmp_name"],$filename);
    $fdImage=basename($_FILES["fdImage"]["name"]);

    $sql="INSERT INTO tb_food(fdName,fdPrice,fdDetails,Res_name,SelID,fdImage) VALUES ('$fdName','$fdPrice','$fdDetails','$name','$id','$fdImage')";
    $result=mysqli_query($connect,$sql);

    if($result){
        echo '
            alert("เพิ่มสำเร็จ!!")
        ';
        header("Location:showfdmenu.php");
    } else{
        echo mysqli_error($connect);
    }
}
?>