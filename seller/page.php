<?php 
session_start();
include "../dbcon.php";
if (empty($_SESSION["acc_id_type_S"])){
    header("Location: ../index.php");
} else {
    $acc_id = $_SESSION["acc_id_type_S"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $result = fetchArray($sql);
    $mainpage = 1;
    if(($result["type"] == "S")&&($result["verify"]=="Y")) { 
    $food ="SELECT * FROM food WHERE acc_id=$acc_id";
    $qr = mysqli_query($con,$food);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Seller-page</title>
</head>
<body>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <?php include "../function/navbar.php";?>
    <div class="container">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="homepage">
            <h1>Hi <?php echo $result["acc_name"] ?></h1>
    <a href="add-cat.php" class="btn btn-dark">เพิ่มหมวดหมู่อาหาร</a>
    <a href="add-manu.php" class="btn btn-dark">เพิ่มเมนูอาหาร</a>
    <div class="row row-cols-auto mt-5">
                <?php foreach($qr as $manu) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?php echo $manu['food_img']?>" alt="" class="card-img img-fluid">
                            <div class="card-body">
                                <p class="card-title fs-3">เมนู : <?php echo $manu['food_name']?></p>
                                <p class="card-text fs-4">ราคา : <?php echo $manu['food_price']?></p>
                                <small class="text-secondary">รายละเอียด :<?php echo $manu['food_des']?></small>
                            </div>
                            <div class="card-footer">
                                <a href="del.php?id=<?php echo $manu['food_id']?>" class="btn btn-danger">ลบ</a>
                            </div>
                        </div>
                    </div>
                        <?php } ?>
                </div>
    
            </div>
        
            <div class="tab-pane fade" id="info">
            <p class="display-4">Account Info</p>
                <div class="d-flex gx-5 align-items-center">
                    <img src="<?php echo $result['acc_img']?>" class="" alt="profile img" width="400">
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
                        <a href="../function/editinfo-form.php?path=seller&id=<?php echo $acc_id?>" class="btn btn-warning">Edit info</a>
                        <a href="../function/password.php?id=<?php echo $result['acc_id']?>&path=seller" class="btn btn-info">Change Password</a>
                        <a href="../function/logout.php?path=seller" class="btn btn-danger">Logout</a>
                    </div>
                </form>
            </div>
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