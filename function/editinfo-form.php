<?php
    include "../dbcon.php";
    session_start();
    $data = fetchArray("SELECT * from account where acc_id = $_GET[id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit info</title>
    <?php include "style.php";?>
</head>
<body>
    <p class="display-3 text-center border-bottom p-3 mb-5">Edit info</p>
    <div class="container">
        <form action="editinfo.php?path=<?php echo $_GET['path']?>&id=<?php echo $data['acc_id']?>" method="post" enctype="multipart/form-data">
            <div class="my-3 form-floating">
                <input type="text" name="name" placeholder="Firstname" class="form-control" value="<?php echo $data['acc_name']?>">
                <label for="name">Firstname</label>
            </div>
            <div class="my-3 form-floating">
                <input type="text" name="lname" placeholder="Lastname" class="form-control" value="<?php echo $data['acc_lname']?>">
                <label for="lname">Lastname</label>
            </div>
            <div class="my-3 form-floating">
                <input type="phone" name="phone" placeholder="phone" class="form-control" value="<?php echo $data['acc_phone']?>">
                <label for="phone">phone</label>
            </div>
            <div class="my-3">
                <label for="address">Address</label>
                <textarea name="address" cols="30" rows="3" class="form-control"><?php echo $data['acc_address']?></textarea>
            </div>
            <div class="my-3">
                <label for="phone">Profile Image</label>
                <input type="file" name="pic" class="form-control">
            </div>
            <div class="my-3">
                <input type="submit" value="Edit!!!!" class="btn btn-primary">
                <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="btn btn-danger">Go back</a>
            </div>
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dir = '../img/';
            $filename = basename($_FILES['pic']['name']);
            $path = $dir . $filename;

            if ($filename) {
                if (move_uploaded_file($_FILES['pic']['tmp_name'], $path)) {
                    $sql = "UPDATE account 
                    SET acc_name = '$_POST[name]',
                    SET acc_lname = '$_POST[lname]',
                    SET acc_phone = '$_POST[phone]',
                    SET acc_address = '$_POST[address]',
                    SET acc_img = '$path'
                    WHERE acc_id = $id;
                    ";
                }
            } else {
                    $sql = "UPDATE account 
                    SET acc_name = '$_POST[name]',
                    SET acc_lname = '$_POST[lname]',
                    SET acc_phone = '$_POST[phone]',
                    SET acc_address = '$_POST[address]'
                    WHERE acc_id = $data[acc_id];
                    ";
            }
            if (mysqli_query($con, $sql)) {
                header('location: ../$_GET[path]/page.php');
            }
        }
    ?>
</body>
</html>