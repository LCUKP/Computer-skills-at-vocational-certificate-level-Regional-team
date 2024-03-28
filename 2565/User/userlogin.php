<?php
include('../page/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <div class="justify-content-center m-3">
        <h2>เข้าสู่ระบบ</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="Username">ชื่อผู้ใช้ :</label>
                <input type="text" name="Username" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="Password">รหัสผ่าน :</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <input type="submit" value="เข้าสู่ระบบ" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            <a href="../Page/index.php" class="btn btn-warning">กลับหน้าแรก</a>
        </form>
    </div>
    <?php 
    session_start();
    if(isset($_POST['Username'])){
        $Username=$_POST['Username'];
        $Password=$_POST['Password'];

        $sql="SELECT * FROM tb_user WHERE Username='".$Username."' and Password='".$Password."' ";

        $result=mysqli_query($connect,$sql);

            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);

                $_SESSION["UserID"]=$row["UserID"];
                $_SESSION["Username"]=$row["Username"];
                $_SESSION["Userfname"]=$row["Userfname"];
                $_SESSION["Userlname"]=$row["Userlname"];
                $_SESSION["Useraddress"]=$row["Useraddress"];
                $_SESSION["Userimage"]=$row["Userimage"];
                $_SESSION["verifyU"]=$row["verify"];
                header("Location: user-page.php");
            }

    } 
    // else {
    //     header("Location: userlogin.php");
    // }
    ?>
</body>
</html>