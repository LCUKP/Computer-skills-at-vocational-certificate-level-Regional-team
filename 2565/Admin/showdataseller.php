<meta charset="UTS-8">
<?php 
include("../Page/dbconnect.php");
session_start();
$query="SELECT * FROM tb_seller" or die("Error : ". mysqli_error($connect));
$result= mysqli_query($connect,$query);
if(!isset($_SESSION['AdID'])){
    header("Location:adlogin.php");
} else { ?>

<head>
<link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<h1 class="text-center">ข้อมูลร้านอาหาร</h1>
<div class="container m-3">
<table align='center' class="table">
<tr align='center' class="table-dark"><td>ID</td><td>รูปโปรไฟล์</td><td>Username</td><td>ชื่อ</td><td>ที่อยู่</td><td>เบอร์มือถือ</td><td>การอนุมัติ</td><td></td></tr>
<?php while ($row=mysqli_fetch_array($result)){ ?>
    <tr align='center'>
    <td><?php echo $row['SelID']; ?></td>
    <td><img src="../Seller/Simg/<?php echo $row['Selimage']; ?>" width="100"></td>
    <td><?php echo $row['Sellername'];?></td>
    <td><?php echo $row['Res_name'];?></td>
    <td><?php echo $row['Seladdress'];?></td>
    <td><?php echo $row['Selphone'];?></td>
    <td><?php if($row['verify']=="N"){
        echo "<a href='verify.php?SelID=$row[0]' class='btn btn-warning' onclick=\"return confirm('อนุมัติร้านค้า')\">รอการยืนยัน</a>";
    }elseif($row['verify']=="Y"){
        echo "<a href='unverify.php?SelID=$row[0]' class='btn btn-success' onclick=\"return confirm('ยกเลิกอนุมัติร้านค้า')\">อนุมัติแล้ว</a>";

    }
    ?></td>


    <?php echo "<td> <a href='Delete.php?SelID=$row[0]' class='btn btn-danger' onclick=\"return confirm('ยืนยืนการยกเลิก!!!')\">ยกเลิกร้านค้า</a></td>"; ?>
   
    </tr>
<?php } ?>
</table>
<a href="admin-page.php" class="btn btn-warning">กลับหน้าหลัก</a>
</div>
<?php 
mysqli_close($connect);
?>


<?php } ?> 