<?php 
session_start();
include "../dbcon.php";
if (empty($_SESSION["acc_id_type_R"])){
    header("Location: ../index.php");
} else {
    $acc_id = $_SESSION["acc_id_type_R"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $result = fetchArray($sql);
    $mainpage = 1;

    $job = fetchAll("SELECT *, s.acc_address as Saddress, s.acc_name as Sname, u.acc_address as Uaddress, u.acc_name as Uname from orderr as o 
    LEFT JOIN order_detail as d ON o.order_id = d.order_id
    LEFT JOIN food as f ON d.food_id = f.food_id
    LEFT JOIN account as s ON f.acc_id = s.acc_id
    LEFT JOIN account as u ON o.acc_id = u.acc_id
    where done = 0");
    if(($result["type"] == "R")&&($result["verify"]=="Y")) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Rider-page</title>
</head>
<body>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <?php include "../function/navbar.php";?>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="homepage">
            <div class="container mt-5">
                <p class="fs-2">Welcome, <b><?php echo $result['acc_name']?></b></p>
                <p class="fs-5 text-secondary">เลือกงานที่ต้องการจะเริ่มได้เลย!!!</p>
                <div class="row row-cols-auto g-4">
                    <?php foreach($job as $value):?>
                        <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Seller Name: <b><?php echo $value['Sname']?></b></p>
                                <p class="card-text">Seller Address: <b><?php echo $value['Saddress']?></b></p>
                                <p class="card-text">Customer Address: <b><?php echo $value['Uaddress']?></b></p>
                            </div>
                            <div class="card-footer">
                                <a href="detail.php?id=<?php echo $value['order_id']?>" class="btn btn-primary">Select</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="tab-pane fade container" id="info">
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
                    <a href="../function/editinfo-form.php?path=rider&id=<?php echo $result['acc_id']?>" class="btn btn-warning">Edit info</a>
                    <a href="../function/password.php?id=<?php echo $result['acc_id']?>&path=rider" class="btn btn-info">Change Password</a>
                    <a href="../function/logout.php?path=rider" class="btn btn-danger">Logout</a>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

<?php
    } else {
        if($result["verify"]=="N"){
            header("Location: ../verify/N.php");
        }elseif($result["verify"]=="U"){
            header("Location: ../verify/U.php");
        }else{
            header("Location: ../index.php");
        }
        
    }
}

?>