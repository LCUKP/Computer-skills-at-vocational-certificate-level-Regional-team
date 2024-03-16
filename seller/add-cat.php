<?php 
session_start();
include "../dbcon.php";
if (empty($_SESSION["acc_id_type_S"])){
    header("Location: ../index.php");
} else {
    $acc_id = $_SESSION["acc_id_type_S"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $result = fetchArray($sql);
    if($result["type"] == "S") { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>add-cat</title>
</head>
<body>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
    <?php include "../function/navbar.php";?>
    <h1>Hi <?php echo $result["acc_name"] ?></h1>
    <p class="display-3 text-center border-bottom p-3 mb-5">เพิ่มหมวดหมู่อาหาร</p>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="my-3 form-floating">
                <input type="text" name="cat_name" placeholder="ชื่อหมวดหมู่อาหาร" class="form-control">
                <label for="name">ชื่อหมวดหมู่อาหาร</label>
            </div>
            <div class="my-3">
                <input type="submit" value="เพิ่ม!!!!" class="btn btn-primary" onclick="return confirm('ต้องการเพิ่มหรือไม่')">
                <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-danger">Go back</a>
            </div>
        </form>
    </div>
        
</body>
</html>

<?php
    } else {
        header("Location: ../index.php");
    }

    if(!empty($_POST["cat_name"])){
        $cat_name = $_POST["cat_name"];
        $sql = "INSERT INTO category(cat_name,acc_id) VALUES('$cat_name','$acc_id')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "<script>
                confirm('เพิ่มหมวดหมู่สำเร็จ')
            </script>";
            header("Location: add-cat.php");
        }
    }
}

?>