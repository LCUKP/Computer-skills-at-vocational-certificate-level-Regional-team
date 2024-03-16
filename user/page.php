<?php
    include "../dbcon.php";
    session_start();

    
    $id = $_SESSION['acc_id_type_U'];
    if (empty($id)){
        header("location: ../index.php");
    } 
    $mainpage = 1;
    $data = fetchArray("SELECT * FROM account WHERE acc_id = $id");
    $Sdata = fetchAll("SELECT * FROM account WHERE type = 'S'");

    $acc_id = $_SESSION["acc_id_type_U"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $result = fetchArray($sql);
    if(($result["type"] == "U")&&($result["verify"]=="Y")) { 
    
    // print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Page</title>
    <?php include "../function/style.php";?>
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container">
            <p class="fs-3 navbar-brand text-light">Food_delivery</p>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="#homepage" class="nav-link active" data-bs-toggle="tab">Home</a>
                </li>
                <li class="nav-item">
                    <a href="orderhis.php" class="nav-link">Order History</a>
                </li>
                <li class="nav-item">
                    <a href="#info" class="nav-link" data-bs-toggle="tab">Account Info</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-4">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="homepage">
                <p class="fs-1">Welcome, <b><?php echo $data['acc_name']?></b></p>
                <small class="text-secondary fs-5">เลือกร้านอาหารที่คุณต้องการสั่งซื้อ</small>
                
                <div class="row row-cols-auto mt-4">
                    <?php if (empty($Sdata)):?>
                        <p class="fs-4 text-secondary text-center mt-5">ยังไม่มีร้านค้าสมัครเข้าใช้งาน</p>
                    <?php endif;?>
                    <?php foreach ($Sdata as $value):?>
                        <div class="col">
                            <div class="card">
                                <img src="<?php echo $value['acc_img']?>" alt="" class="card-img img-fluid">
                                <div class="card-body">
                                    <p class="card-title">Name : <?php echo $value['acc_name']?></p>
                                    <p class="card-text">Address : <?php echo $value['acc_address']?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="show-food.php?name=<?php echo $value['acc_name']?>" class="btn btn-primary">Select</a>
                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach;?>
                </div>
            </div>

            <!-- account info -->
            <div class="tab-pane fade" id="info">
                <p class="display-4">Account Info</p>
                <div class="d-flex gx-5 align-items-center">
                    <img src="<?php echo $data['acc_img']?>" class="" alt="profile img" width="400">
                    <p class="fs-2 ms-5"><?php echo $data['acc_name']. $data['acc_lname']?></p>
                </div>
                <form action="">
                    <div class="my-3">
                        <label for="name">Firstname</label>
                        <input type="text" name="name" class="form-control" disabled value="<?php echo $data['acc_name']?>">
                    </div>
                    <div class="my-3">
                        <label for="lname">Lastname</label>
                        <input type="text" name="lname" class="form-control" disabled value="<?php echo $data['acc_lname']?>">
                    </div>
                    <div class="my-3">
                        <label for="phone">Phone Number</label>
                        <input type="phone" name="phone" class="form-control" disabled value="<?php echo $data['acc_phone']?>">
                    </div>
                    <div class="my-3">
                        <label for="address">Address</label>
                        <textarea name="address" cols="30" rows="3" class="form-control" disabled><?php echo $data['acc_address']?></textarea>
                    </div>
                    <div class="my-3 btn-group">
                        <a href="../function/editinfo-form.php?path=user&id=<?php echo $id?>" class="btn btn-warning">Edit info</a>
                        <a href="../function/password.php?id=<?php echo $data['acc_id']?>&path=user" class="btn btn-info">Change Password</a>
                        <a href="../function/logout.php?path=user" class="btn btn-danger">Logout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }else {
        if($result["verify"]=="N"){
            header("Location: ../verify/N.php");
        }elseif($result["verify"]=="U"){
            header("Location: ../verify/U.php");
        }else{
            header("Location: ../index.php");
        }
        
    } ?>