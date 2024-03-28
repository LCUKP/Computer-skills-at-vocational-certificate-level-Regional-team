<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/css/bootstrap.css">
<body>
    <h2 class="m-3">Register</h2>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab1">ผู้ใช้ทั่วไป</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab2">ร้านอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab3">ผู้ส่งอารหาร</a>
        </li>
    </ul>
    <div class="tab-content m-3">
        <div id="tab1" class="tab-pane fade show active">
    <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Username">ชื่อผู้ใช้ :</label>
            <input type="text" name="Username" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">รหัสผ่าน :</label>
            <input type="Password" name="Password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Firstname">ชื่อจริง :</label>
            <input type="text" name="Userfname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Lastname">นามสกุล :</label>
            <input type="text" name="Userlname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Address">ที่อยู่ปัจจุบัน :</label>
            <input type="text" name="Useraddress" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">เบอร์มือถือ :</label>
            <input type="text" name="Userphone" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">ภาพโปรไฟล์ :</label>
            <input type="file" name="Userimage" accept="image/*" class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
        <a href="index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>

    </form>
        </div>
        <div id="tab2" class="tab-pane fade">
        <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Sellername">ชื่อผู้ใช้ :</label>
            <input type="text" name="Sellername" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">รหัสผ่าน :</label>
            <input type="Password" name="Password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="res_name">ชื่อร้าน :</label>
            <input type="text" name="Res_name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="seladdress">ที่อยู่ของร้านอาหาร :</label>
            <input type="text" name="Seladdress" required class="form-control">
        </div>
        <div class="form-group">
            <label for="selPhone">เบอร์มือถือ :</label>
            <input type="text" name="Selphone" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">รูปโปรไฟล์ :</label>
            <input type="file" name="Selimage" accept="image/*"  class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
        <a href="index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>

        </form>
        </div>
        <div id="tab3" class="tab-pane fade">
        <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="Ridername">ชื่อผู้ใช้ :</label>
            <input type="text" name="Ridername" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">รหัสผ่าน :</label>
            <input type="Password" name="Password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Firstname">ชื่อจริง :</label>
            <input type="text" name="Ridfname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Lastname">นามสกุล :</label>
            <input type="text" name="Ridlname" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Phone">เบอร์มือถือ :</label>
            <input type="text" name="Ridphone" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Image">รูปโปรไฟล์ :</label>
            <input type="file" name="Ridimage" accept="image/*"  class="form-control">
        </div>
        <input type="submit" value="บันทึก" class="btn btn-success mt-1">
        <input type="reset" value="ล้างข้อมูล" class="btn btn-danger mt-1">
        <a href="index.php" class="btn btn-warning mt-1">กลับหน้าแรก</a>

        </form>
        </div>
    </div>
</body>
</html>