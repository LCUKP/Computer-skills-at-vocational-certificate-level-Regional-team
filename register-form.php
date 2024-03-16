<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body class="bg-dark d-grid align-items-center p-5" data-bs-theme="dark" style="min-height:100vh;">
    
    <div class="container">
        <ul class="nav nav-pills justify-content-center my-4">
            <li class="nav-item">
                <a href="" class="nav-link disabled">Apply for --></a>
            </li>
            <li class="nav-item">
                <a href="#user" class="nav-link active" data-bs-toggle="tab">User</a>
            </li>
            <li class="nav-item">
                <a href="#seller" class="nav-link" data-bs-toggle="tab">Seller</a>
            </li>
            <li class="nav-item">
                <a href="#rider" class="nav-link" data-bs-toggle="tab">Rider</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="user">
                <div class="card p-3">
                <p class="display-3 text-center">Register</p>
                <div class="card-body">
                    <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="my-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="fname">Firstname</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="lname">Lastname</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="phone">Phone Number</label>
                            <input type="phone" name="phone" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="address">Address</label>
                            <textarea name="address" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="my-3">
                            <label for="address">Profile Picture</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="my-3">
                            <a href="index.php">มีบัญชีอยู่เเล้วใช่หรือไม่?</a>
                        </div>
                        <div class="my-3">
                            <input type="submit" value="Register" class="btn btn-primary">
                            <input type="hidden" name="type" value="U">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="seller">
                <div class="card p-3">
                <p class="display-3 text-center">Register</p>
                <div class="card-body">
                    <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="my-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="fname">Shop name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <!-- <div class="my-3">
                            <label for="lname">Lastname</label>
                            <input type="text" name="lname" class="form-control">
                        </div> -->
                        <div class="my-3">
                            <label for="phone">Shop Phone Number</label>
                            <input type="phone" name="phone" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="address">Shop Address</label>
                            <textarea name="address" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="my-3">
                            <label for="address">Profile Picture</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="my-3">
                            <a href="index.php">มีบัญชีอยู่เเล้วใช่หรือไม่?</a>
                        </div>
                        <div class="my-3">
                            <input type="hidden" name="type" value="S">
                            <input type="submit" value="Register" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="tab-pane fade" id="rider">
                <div class="card p-3">
                <p class="display-3 text-center">Register</p>
                <div class="card-body">
                    <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="my-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="fname">Firstname</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="lname">Lastname</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="phone">Phone Number</label>
                            <input type="phone" name="phone" class="form-control">
                        </div>
                        <div class="my-3">
                            <label for="address">Address</label>
                            <textarea name="address" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="my-3">
                            <label for="address">Profile Picture</label>
                            <input type="file" name="pic" class="form-control">
                        </div>
                        <div class="my-3">
                            <a href="index.php">มีบัญชีอยู่เเล้วใช่หรือไม่?</a>
                        </div>
                        <div class="my-3">
                            <input type="submit" value="Register" class="btn btn-primary">
                            <input type="hidden" name="type" value="R">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>