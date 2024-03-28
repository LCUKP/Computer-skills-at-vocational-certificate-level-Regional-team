<?php
include('dbconnect.php');
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

        $sql="SELECT * FROM User WHERE Username='".$Username."' and Password='".$Password."' ";

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
//////////////////////////////////////////////////////////////////////////////////////////////
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
<body>
    <h2 class="m-3">Register</h2>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab1">ผู้ใช้ทั่วไป</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab2">ร้านอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab3">ผู้ส่งอารหาร</a>
        </li>
    </ul>
    <div class="tab-content m-3">
        <div id="tab1" class="tab-pane fade show active">
    <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Username">ชื่อผู้ใช้ :</label>
            <input type="text" name="Username" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">รหัสผ่าน :</label>
            <input type="Password" name="Password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Firstname">ชื่อจริง :</label>
            <input type="text" name="Userfname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Lastname">นามสกุล :</label>
            <input type="text" name="Userlname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Address">ที่อยู่ปัจจุบัน :</label>
            <input type="text" name="Useraddress" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">เบอร์มือถือ :</label>
            <input type="text" name="Userphone" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">ภาพโปรไฟล์ :</label>
            <input type="file" name="Userimage" accept="image/*" class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
        <a href="index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>

    </form>
        </div>

        
    </div>
</body>
</html>
//////////////////////////////////////////////////////////////////
<?php 

include('dbconnect.php');
if(isset($_POST['Username'])){
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $Userfname=$_POST['Userfname'];
    $Userlname=$_POST['Userlname'];
    $Useraddress=$_POST['Useraddress'];
    $Userphone=$_POST['Userphone'];

    $dir="../User/Uimg/";
    $filename=$dir.basename($_FILES["Userimage"]["name"]);
    move_uploaded_file($_FILES["Userimage"]["tmp_name"],$filename);
    $Userimage=basename($_FILES["Userimage"]["name"]);

    $sql="INSERT INTO songtaew (Username,Password,Userfname,Userlname,Useraddress,Userphone,Userimage) VALUES('$Username','$Password','$Userfname','$Userlname','$Useraddress','$Userphone','$Userimage')";
    $result=mysqli_query($connect,$sql);

    if($result){
        echo '
				<script>
                    alert("ลงทะเบียนสำเร็จ!!")
				</script>
				';
        header("Location:../User/userlogin.php");
    } else {
        echo mysqli_error($connect);
    }

}
?>