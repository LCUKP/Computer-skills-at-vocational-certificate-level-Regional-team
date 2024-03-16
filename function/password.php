<?php
    include "../dbcon.php";
    session_start();
    $path = $_GET['path'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- <link rel="stylesheet" href="style.php"> -->
    <link rel="stylesheet" href="../bootstrap\css\bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.bundle.js"></script>
</head>
<body>
    
    <p class="display-3 text-center border-bottom p-3">Change password</p>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET['id']?>&path=<?php echo $path?>" method="post">
            <div class="my-3 form-floating">
                <input type="password" name="old" placeholder="Old password" class="form-control">
                <label for="old">Old password</label>
            </div>
            <div class="my-3 form-floating">
                <input type="password" name="new1" placeholder="new password" class="form-control">
                <label for="new1">new password</label>
            </div>
            <div class="my-3 form-floating">
                <input type="password" name="new2" placeholder="repeat new password" class="form-control">
                <label for="new2">repeat new password</label>
            </div>
            <div class="my-3">
                <input type="submit" value="Change password" class="btn btn-primary" onclick="return confirm('ต้องการแก้ไขหรือไม่')">
                <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-danger">Go back</a>
            </div>
        </form>
    </div>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_GET['id'];
            $data = fetchArray("SELECT * FROM account where acc_id = $id");
            $old = $_POST['old'];
            $new1 = $_POST['new1'];
            $new2 = $_POST['new2'];

            if ($old == $data['acc_password'] && $new1 == $new2) {
                $sql = "UPDATE account
                SET acc_password = '$new2'
                WHERE acc_id = $id";
                if (mysqli_query($con, $sql)) {
                    header("location: ../". $path . "/page.php");
                }
            } else { 
                echo "รหัสผ่านไม่ถูกต้องหรือไม่ตรงกัน";
                header("Location: password.php");
            }
        }
    ?>

</body>
</html>