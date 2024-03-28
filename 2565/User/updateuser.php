<?php 
session_start();
include("../Page/dbconnect.php");
$UserID=$_SESSION["UserID"];
$sql="SELECT * FROM tb_user WHERE UserID=$UserID";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">

</head>
<body>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <div class="card m-1" style="width: 30rem;">
    
        <img src="Uimg/<?php echo $row['Userimage']; ?>" width="100" >
        <input type="file" name="Userimage" accept="image/*" class="btn btn-info" value="<?php echo $row['Userimage']; ?>">


            <div class="card-body">
                <h5 class="card-title">ข้อมูลส่วนตัว</h5>
                <label class="card-text">รหัสลูกค้า : </label>
                <input type="text" disabled="disabled" value="<?php  echo $row['UserID']; ?>" class="form-control" name="UserID" required>
                <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>"><br>

                <label class="card-text">ชื่อผู้ใช้ : </label>
                <input type="text"  value="<?php  echo $row['Username']; ?>" class="form-control" name="Username" required><br>

                <label class="card-text">รหัสผ่าน : </label>
                <input type="Password"  value="<?php  echo $row['Password']; ?>" class="form-control" name="Password" required><br>

                <label class="card-text">ชื่อ : </label>
                <input type="text"  value="<?php  echo $row['Userfname']; ?>" class="form-control" name="Userfname" required><br>

                <label class="card-text">สกุล : </label>
                <input type="text"  value="<?php  echo $row['Userlname']; ?>" class="form-control" name="Userlname" required><br>

                <label class="card-text">เบอร์มือถือ : </label>
                <input type="text" value="<?php  echo $row['Userphone']; ?>" class="form-control" name="Userphone" required><br>

                <label class="card-text">ที่อยู่ : </label>
                <input type="text" value="<?php  echo $row['Useraddress']; ?>" class="form-control" name="Useraddress" required><br>
            </div>
        
        </div>
            <input type='submit' value='บันทึกข้อมูล' class='btn btn-success m-1'>
    <?php
    echo
        "
        <a href='../Admin/Delete.php?UserID=$row[0]' class='btn btn-danger m-1' onclick=\" return confirm('ต้องการลบบัญชีหรือไม่')\">ลบบัญชี</a>"; 
        ?>
        </form>
        <a href="datauser.php" class="btn btn-light">ยกเลิก</a>
</body>
</html>

