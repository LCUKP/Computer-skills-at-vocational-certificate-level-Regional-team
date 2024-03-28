<meta charset="UTS-8">
<?php 
include("../Page/dbconnect.php");
session_start();
$query="SELECT * FROM tb_user" or die("Error : ". mysqli_error($connect));
$result= mysqli_query($connect,$query);
if(!isset($_SESSION['AdID'])){
    header("Location:adlogin.php");
} else { ?>

<head>
<link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<h1 class="text-center">ข้อมูลผู้ใช้ทั้งหมด</h1>
<div class="container m-3">
<table align='center' class="table">
<tr align='center' class="table-dark"><td>ID</td><td>รูปโปรไฟล์</td><td>Username</td><td>ชื่อ</td><td>สกุล</td><td>ที่อยู่</td><td>เบอร์มือถือ</td><td></td><td></td></tr>
<?php while ($row=mysqli_fetch_array($result)){ ?>
    <tr align='center'>
    <td><?php echo $row['UserID']; ?></td>
    <td><img src="../User/Uimg/<?php echo $row['Userimage']; ?>"width="100"></td>
    <td><?php echo $row['Username'];?></td>
    <td><?php echo $row['Userfname'];?></td>
    <td><?php echo $row['Userlname'];?></td>
    <td><?php echo $row['Useraddress'];?></td>
    <td><?php echo $row['Userphone'];?></td>

    <td><?php if($row['verify']=="N"){
        echo "<a href='verify.php?UserID=$row[0]' class='btn btn-warning' onclick=\"return confirm('อนุมัติลูกค้า')\">รอการยืนยัน</a>";
    }elseif($row['verify']=="Y"){
        echo "<a href='unverify.php?UserID=$row[0]' class='btn btn-success' onclick=\"return confirm('ยกเลิกอนุมัติลูกค้า')\">อนุมัติแล้ว</a>";

    }elseif($row['verify']=="W"){
        echo "<a href='unverify.php?UserID=$row[0]' class='btn btn-warning' onclick=\"return confirm('ปลดการระงับ')\">ปลดการระงับการใช้งาน</a>";

    }
    ?></td>

    <?php if($row['verify']=="W"){
        echo " ";
    }
    else{
        echo "<td> <a href='Delete.php?UserID=$row[0]' class='btn btn-danger' onclick=\"return confirm('ต้องการระงับการใช้งานหรือไม่?')\">ระงับการใช้งานชั่วคราว</a></td>"; 
    }
    ?>
   
    </tr>
<?php } ?>
</table>
<a href="admin-page.php" class="btn btn-warning">กลับหน้าหลัก</a>
</div>
<?php 
mysqli_close($connect);
?>


<?php } ?> 