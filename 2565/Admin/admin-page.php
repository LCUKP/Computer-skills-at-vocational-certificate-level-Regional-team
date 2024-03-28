<?php 
session_start();
if(!isset($_SESSION["AdID"])){
    header("Location:adlogin.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <h1>Admin Page</h1>
    <strong>HI </strong><?php echo $_SESSION['Adminname'];?><br>
    <a href="showdatauser.php" class="btn btn-info mt-1">จัดการผู้ใช้ทั้งหมด</a>
    <a href="showdataseller.php" class="btn btn-warning mt-1">จัดการร้านอาหาร</a>
    <a href="showdatarider.php" class="btn btn-primary mt-1">จัดการผู้ส่งอาหาร</a><br>
    <a href="adlogout.php" class="btn btn-danger mt-1">ออกจากระบบ</a>
</body>
</html>
<?php } ?>