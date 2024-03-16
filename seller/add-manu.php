<?php
    include "../dbcon.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>AddManu</title>
</head>
<body>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <?php include "../function/navbar.php";?>
            <div class="card p-3">
                <p class="display-3 text-center">เพิ่มเมนูอาหาร</p>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="my-3">
                            <label for="food_name">ชื่ออาหาร</label>
                            <input type="text" name="food_name" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="price">ราคา</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="food_des">รายละเอียด</label>
                            <input type="text" name="food_des" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="food_cat">เลือกหมวดหมู่อาหาร</label>
                            <select name="food_cat" class="form-control">
                                <?php
                                    $cat = fetchAll("SELECT * FROM category where acc_id = $_SESSION[acc_id_type_S]");
                                    foreach ($cat as $value):
                                ?>
                                    <option value="<?php echo $value['cat_id']?>"><?php echo $value['cat_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="my-3">
                            <label for="address">รูปอาหาร</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="my-3">
                            <input type="submit" value="add-manu" class="btn btn-primary">
                            <input type="hidden" name="type" value="U">
                        </div>
                    </form>
                </div>
</body>
</html>

<?php 

if(!empty($_POST["food_name"])){
    $food_name = $_POST["food_name"];
    $price = $_POST["price"];
    $food_des = $_POST["food_des"];
    $food_cat = $_POST["food_cat"];
    $acc_id = $_SESSION["acc_id_type_S"];


    $dir = "../img/";
    $filename = basename($_FILES['pic']['name']);
    $path = $dir . $filename;

    if($_POST["type"] == "U"){
        if ($filename) {
            if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
                $sql = "INSERT INTO food(food_name,food_price,food_img,food_des,acc_id,cat_id) 
                VALUES('$food_name','$price','$path','$food_des','$acc_id','$food_cat')";

              }     
            } else {
                $sql = "INSERT INTO food(food_name,food_price,food_des,acc_id,cat_id) 
                VALUES('$food_name','$price','$food_des','$acc_id','$food_cat')";
        }
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: page.php");
    }
}
}
?>
