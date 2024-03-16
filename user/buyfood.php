<?php
    include "../dbcon.php";
    session_start();

    $id = $_SESSION['acc_id_type_U'];
    if (empty($id)){
        header("location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy food</title>
    <?php include "../function/style.php";?>
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

    <div class="container">
        <div class="row row-cols-auto justify-content-evenly">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Food Name</th>
                            <th>Food price</th>
                            <th>Count</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i <= count($_SESSION['foodid']) - 1; $i++):
                            $all = 0;?>
                            <tr>
                                <td><?php echo $i+1?></td>
                                <td><?php echo $_SESSION['foodname'][$i]?></td>
                                <td><?php echo $_SESSION['foodprice'][$i]?></td>
                                <td><?php echo $_SESSION['foodcount'][$i]?></td>
                                <td><?php echo $_SESSION['foodcount'][$i] * $_SESSION['foodprice'][$i]?></td>
                            </tr>
                        <?php $all += $_SESSION['foodcount'][$i] * $_SESSION['foodprice'][$i]; endfor;?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <form action="order.php" method="post">
                    <p class="fs-3">Summery</p>
                    <div class="my-3">
                        <label for="totalfood">Total Menu</label>
                        <input type="text" name="totalfood" value="<?php echo count($_SESSION['foodid'])?>" class="form-control" readonly>
                    </div>
                    <div class="my-3">
                        <label for="totalprice">Total Price</label>
                        <input type="text" name="totalprice" value="<?php echo $all?>" class="form-control" readonly>
                    </div>
                    <div class="my-3">
                        <input type="submit" value="Order now!" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>