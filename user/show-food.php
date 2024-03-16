<?php
    include "../dbcon.php";
    session_start();

    $_SESSION['re'] = true;

    
    $id = $_SESSION['acc_id_type_U'];
    if (empty($id)){
        header("location: ../index.php");
    }
    $data = fetchArray("SELECT * FROM account WHERE acc_id = $id");
    $Sdata = fetchArray("SELECT * FROM account WHERE acc_name LIKE '$_GET[name]'");
    $category = fetchAll("SELECT * from category where acc_id = $Sdata[acc_id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show food</title>
    <?php include "../function/style.php"?>
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container">
            <p class="fs-3 navbar-brand text-light">Food_delivery</p>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="page.php" class="nav-link active">Home Page</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <p class="display-3"><?php echo $Sdata['acc_name']?><small class="text-secondary fs-5"> - Food list</small></p>

        <?php if (empty($category)):?>
            <p class="fs-4 text-secondary text-center mt-5">ร้านค้ายังไม่ทำการเพิ่มรายการอาหาร</p>
        <?php else:?>
        <?php foreach ($category as $cat):?>
            
                <p class="bg-info p-1 px-3 rounded-3 text-light fs-3"><?php echo $cat['cat_name']?></p>
                <div class="row row-cols-auto mt-5">
                    <?php 
                    $food = fetchAll("SELECT * from food where cat_id = $cat[cat_id]");
                    foreach ($food as $catfood):?>
                    <div class="col">
                        <div class="card">
                            <img src="<?php echo $catfood['food_img']?>" alt="" class="card-img img-fluid">
                            <div class="card-body">
                                <p class="card-title fs-3">เมนู : <?php echo $catfood['food_name']?></p>
                                <p class="card-text fs-4">ราคา : <?php echo $catfood['food_price']?></p>
                                <small class="text-secondary">รายละเอียด :<?php echo $catfood['food_des']?></small>
                            </div>
                            <div class="card-footer">
                                <a href="cart.php?id=<?php echo $catfood['food_id']?>" class="btn btn-primary">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

        <?php endforeach;?>
        <?php endif;?>

        
    </div>

</body>
</html>