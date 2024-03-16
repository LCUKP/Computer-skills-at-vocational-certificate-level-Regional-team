<?php 
session_start();
include "../dbcon.php";
if (empty($_SESSION["acc_id_type_A"])){
    header("Location: ../index.php");
} else {
    $mainpage = 1;
    $acc_id = $_SESSION["acc_id_type_A"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $result = fetchArray($sql);
    if($result["type"] == "A") { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
    <title>Admin-page</title>
    <?php include "../function/style.php";?>
</head>
<body>
    <?php include "../function/navbar.php";?>
    
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="homepage">
                <h1>Hi <?php echo $result["acc_name"] ?></h1>
                <a href="show-user.php" class="btn btn-darg">ตรวจสอบผู้ใช้</a>
                <a href="show-seller.php" class="btn btn-darg">ตรวจสอบร้านค้า</a>
                <a href="show-rider.php" class="btn btn-darg">ตรวจสอบคนขับ</a>
            </div>
            <div class="tab-pane fade" id="info">
                <p class="display-4">Account Info</p>
                <div class="d-flex align-items-center">
                    <img src="<?php echo $result['acc_img']?>" class="" alt="profile img" max-height="200">
                    <p class="fs-2 ms-5"><?php echo $result['acc_name']. $result['acc_lname']?></p>
                </div>
                <form action="">
                    <div class="my-3">
                        <label for="name">Firstname</label>
                        <input type="text" name="name" class="form-control" disabled value="<?php echo $result['acc_name']?>">
                    </div>
                    <div class="my-3">
                        <label for="lname">Lastname</label>
                        <input type="text" name="lname" class="form-control" disabled value="<?php echo $result['acc_lname']?>">
                    </div>
                    <div class="my-3">
                        <label for="phone">Phone Number</label>
                        <input type="phone" name="phone" class="form-control" disabled value="<?php echo $result['acc_phone']?>">
                    </div>
                    <div class="my-3">
                        <label for="address">Address</label>
                        <textarea name="address" cols="30" rows="3" class="form-control" disabled><?php echo $result['acc_address']?></textarea>
                    </div>
                    <div class="my-3 btn-group">
                        <a href="../function/editinfo-form.php?path=admin&id=<?php echo $result['acc_id']?>" class="btn btn-warning">Edit info</a>
                        <a href="../function/password.php?id=<?php echo $result['acc_id']?>&path=admin" class="btn btn-info">Change Password</a>
                        <a href="../function/logout.php?path=Admin" class="btn btn-danger">Logout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    } else {
        header("Location: ../index.php");
    }
}

?>