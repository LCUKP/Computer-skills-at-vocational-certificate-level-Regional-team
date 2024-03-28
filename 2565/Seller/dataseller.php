<?php 

session_start();
if(!isset($_SESSION['SelID'])){
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
        <div class="#">
        <H3 class="text-center">ข้อมูลร้าน</H3>
        <img src="Simg/<?php echo $_SESSION['Selimage'] ?>" width="100">
        <p>รหัสร้าน <?php echo $_SESSION['SelID'] ?></p>
        <p>ชื่อผู้ใช้ <?php echo $_SESSION['Sellername'] ?></p>
        <p>ร้าน <?php echo $_SESSION['Res_name'] ?></p>
        <p>ที่อยู่ <?php echo $_SESSION['Seladdress'] ?></p>
        <p>เบอร์มือถือ <?php echo $_SESSION['Selphone'] ?></p>

        <a href="updatesel.php" class="btn btn-warning">แก้ไขข้อมูล</a>

    <a href="seller-page.php" class="btn btn-info">กลับหน้าแรก</a>

    </div>
</div>
</body>
</html>
<?php } ?>