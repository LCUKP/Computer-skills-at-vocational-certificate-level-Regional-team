<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Data User</title>
</head>
<body>
    <?php 
    include "../dbcon.php";
    include "../function/navbar.php";
    $sql = "SELECT * FROM account WHERE type = 'U'";
    $result = mysqli_query($con,$sql); ?>
        <table class="table">
            <thead>
                <td>รูปภาพ</td>
                <td>ID</td>
                <td>ชื่อผู้ใช้</td>
                <td>รหัสผ่าน</td>
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>เบอร์มือถือ</td>
                <td>ที่อยู่</td>
                <td>การอนุญาต</td>
                <td>การระงับการใช้งาน</td>
            </thead>
        
    <?php foreach($result as $row){ ?>
            <tbody>
                <tr>
                <td><img src="../<?php echo $row['acc_img']; ?>" alt="IMG" sizes="150px" srcset=""></td>
                <td><?php echo $row['acc_id'];?></td>
                <td><?php echo $row['acc_username'];?></td>
                <td><?php echo $row['acc_password'];?></td>
                <td><?php echo $row['acc_name'];?></td>
                <td><?php echo $row['acc_lname'];?></td>
                <td><?php echo $row['acc_phone'];?></td>
                <td><?php echo $row['acc_address'];?></td>
                <td><?php 
                    if($row["verify"] == "Y") {
                        echo "<a href='verify.php?id=$row[acc_id]' class='btn btn-success'>อนุญาตใช้แล้ว</a>";
                    }elseif($row["verify"] == "N") {
                        echo "<a href='verify.php?id=$row[acc_id]' class='btn btn-danger'>ยังไม่อนุญาตใช้งาน</a>";
                    }elseif($row["verify"] == "U") {
                        echo "<p>ถูกระงับการใช้งาน</p>";
                    }
                ?></td>
                <td><?php 
                    if($row["verify"] == "U") {
                        echo "<a href='unverify.php?id=$row[acc_id]' class='btn btn-success'>ปลดการระงับ</a>";
                    }else {
                        echo "<a href='unverify.php?id=$row[acc_id]' class='btn btn-danger'>ระงับการใช้งาน</a>";
                    }
                ?></td>
                </tr>
            </tbody>
    <?php } ?>
        </table>
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>