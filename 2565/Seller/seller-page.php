<?php 

session_start();
if(!$_SESSION["SelID"]){
    header("Location: sellogin.php");
} elseif($_SESSION["verifyS"]=="N"){
    echo "<h1>รอการยืนยัน</h1>";
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SellerPage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <h1>Seller Page</h1>
    <strong>Hi <?php  echo $_SESSION['Res_name']; ?></strong><br>
    <a href="dataseller.php" class="btn btn-info m-1">ข้อมูลร้าน</a>
    <a href="showfdmenu.php" class="btn btn-warning m-1">ดูรายการอาหาร</a>
    <a href="addFood-form.php" class="btn btn-success m-1">เพิ่มอาหาร</a><br>
    <a href="sellogout.php" class="btn btn-danger m-1">Log Out</a>
</body>
</html>

<?php } ?>