<?php
    include "../dbcon.php";
    session_start();

    $id = $_SESSION['acc_id_type_U'];
    if (empty($id)){
        header("location: ../index.php");
    }
    if (!empty($_GET['id'])) {
        $foodadd = fetchArray("SELECT * from food where food_id = $_GET[id]");

    if ($_SESSION['re']) {
        if (empty($_SESSION['foodid'])){
            $_SESSION['foodid'][] = $foodadd['food_id'];
            $_SESSION['foodname'][] = $foodadd['food_name'];
            $_SESSION['foodprice'][] = $foodadd['food_price'];
            $_SESSION['foodcount'][] = 1;
            $_SESSION['re'] = false;
        } else {
            for($i = 0; $i <= count($_SESSION['foodid']) - 1; $i++){
                if ($foodadd['food_id'] == $_SESSION['foodid'][$i]) {
                    $_SESSION['foodcount'][$i] += 1;
                    $_SESSION['re'] = false;
                    break;
                } else {
                    $_SESSION['foodid'][] = $foodadd['food_id'];
                    $_SESSION['foodname'][] = $foodadd['food_name'];
                    $_SESSION['foodprice'][] = $foodadd['food_price'];
                    $_SESSION['foodcount'][] = 1;
                    $_SESSION['re'] = false;
                }
            }
        }
    }
    }

    // unset($_SESSION['foodid']);
    // unset($_SESSION['foodname']);
    // unset($_SESSION['foodprice']);
    // unset($_SESSION['foodcount']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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
                    <a href="<?php echo $_SERVER['HTTP_REFERER']?>" class="nav-link">Go Back</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <p class="display-4">Your Cart</p>
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
                <?php if (empty($_SESSION['foodid'])):?>
                    
                <?php else:?>
                    <?php for($i = 0; $i <= count($_SESSION['foodid']) - 1; $i++):?>
                        <tr>
                            <td><?php echo $i+1?></td>
                            <td><?php echo $_SESSION['foodname'][$i]?></td>
                            <td><?php echo $_SESSION['foodprice'][$i]?></td>
                            <td><?php echo $_SESSION['foodcount'][$i]?></td>
                            <td><?php echo $_SESSION['foodcount'][$i] * $_SESSION['foodprice'][$i]?></td>
                        </tr>
                    <?php endfor?>
                <?php endif;?>
            </tbody>
        </table>
        <a href="buyfood.php" class="btn btn-success">Buy</a>
    </div>


</body>
</html>