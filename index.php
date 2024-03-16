<?php

// include "dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-dark d-grid align-items-center" data-bs-theme="dark" style="min-height:100vh;">

<div class="card p-3 mx-5">
        <p class="display-3 text-center mx-5">Login</p>
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="my-3 form-floating">
                    <input name="acc_username" type="text" class="form-control" placeholder="username">
                    <label for="acc_username">Username</label>
                </div>
                <div class="my-3 form-floating">
                    <input name="acc_password" type="password" class="form-control" placeholder="Password">
                    <label for="acc_password">Password</label>
                </div>
                <div class="my-3 form-floating">
                    <a href="register-form.php">ต้องการสร้างบัญชีผู้ใช้หรือไม่</a>
                </div>
                <div class="my-5 form-floating">
                    <input type="submit" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    


    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>