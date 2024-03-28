<?php 
include("../Page/dbconnect.php");
session_start();
if(!$_SESSION["UserID"]){
    header("Location: userlogin.php");
} elseif($_SESSION["verifyU"]=="N"){
  echo "<h1>รอการยืนยัน</h1>";
} elseif($_SESSION["verifyU"]=="W"){
  echo "<h1>ท่านถูกระงับการใช้งาน</h1>";
} else  { 
    $sql="SELECT * FROM tb_seller ";
    $result=mysqli_query($connect,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
<div class="container">
      <h1>User Page</h1>
      <strong>Hi </strong><?php  echo $_SESSION['Userfname']; ?><br>
      <a href="datauser.php" class="btn btn-success">ข้อมูลส่วนตัว</a>
      <a href="userlogout.php" class="btn btn-danger">Log Out</a><br>
  <div class="row">
      <?php while ($row=mysqli_fetch_array($result)){ ?> 
          <div class="card m-1" style="width: 18rem;">
          <img src="../Seller/Simg/<?php echo $row['Selimage'];?>" hiegth="100" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">ร้าน<?php echo $row['Res_name'];?></h5>
            <p class="card-text"><?php echo $row['Seladdress'];?></p>
            <?php echo "<a href='user_menu.php?SelID=$row[0]' class='btn btn-primary'>เลือก</a>"; ?>
            </div>
          </div>
    
      <?php } ?>
  </div>
</div>
</body>
</html>

<?php } ?>