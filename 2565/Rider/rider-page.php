<?php 

session_start();
if(!$_SESSION["RiderID"]){
    header("Location: ridlogin.php");
} elseif($_SESSION["verifyR"]=="N"){
    echo "<h1>รอการยืนยัน</h1>";
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RiderPage</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
</head>
<body>
    <h1>Rider Page</h1>
    <strong>Hi </strong><?php  echo $_SESSION['Rider'] ?><br>
    <a href="ridlogout.php" class="btn btn-danger">Log Out</a>
</body>
</html>

<?php } ?>