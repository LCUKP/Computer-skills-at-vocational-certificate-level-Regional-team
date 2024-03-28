<meta charset="UTS-8">
<?php 
include("../Page/dbconnect.php");
session_start();

if(!isset($_SESSION['AdID'])){
    header("Location:adlogin.php");
} else { 
    $query="SELECT * FROM tb_rider" or die("Error : ". mysqli_error($connect));
    $result= mysqli_query($connect,$query);
?>

<head>
<link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<h1 class="text-center">ข้อมูลผู้ส่งอาหาร</h1>
<div class="container m-3">
<table align='center' class="table">
<tr align='center' class="table-dark"><td>ID</td><td>รูปโปรไฟล์</td><td>Username</td><td>ชื่อ</td><td>สกุล</td><td>เบอร์มือถือ</td><td>การอนุมัติ</td><td></td></tr>
<?php while ($row=mysqli_fetch_array($result)){ ?>
    <tr align='center'>
    <td><?php echo $row['RiderID']; ?></td>
    <td><img src="../Rider/Rimg/<?php echo $row['Ridimage']; ?>" width="100"></td>
    <td><?php echo $row['Ridername'];?></td>
    <td><?php echo $row['Ridfname'];?></td>
    <td><?php echo $row['Ridlname'];?></td>
    <td><?php echo $row['Ridphone'];?></td>
    <td><?php if($row['verify']=="N"){
        echo "<a href='verify.php?RiderID=$row[0]' class='btn btn-warning' onclick=\"return confirm('อนุมัติร้านค้า')\">รอการยืนยัน</a>";
    }elseif($row['verify']=="Y"){
        echo "<a href='unverify.php?RiderID=$row[0]' class='btn btn-success' onclick=\"return confirm('ยกเลิกอนุมัติร้านค้า')\">อนุมัติแล้ว</a>";

    }
    ?></td>

    <?php echo "<td> <a href='Delete.php?RiderID=$row[0]' class='btn btn-danger' onclick=\"return confirm('ยืนยันการยกเลิก!!!')\">ยกเลิกผู้ส่งอาหาร</a></td>"; ?>
   
    </tr>
<?php } ?>
</table>
<a href="admin-page.php" class="btn btn-warning">กลับหน้าหลัก</a>
</div>
<?php 
mysqli_close($connect);
?>


<?php } ?> 