<?php
session_start();
include "../dbcon.php";
if (empty($_SESSION["acc_id_type_R"])){
    header("Location: ../index.php");
}
    $acc_id = $_SESSION["acc_id_type_R"];
    $sql = "SELECT * FROM account WHERE acc_id = '$acc_id'";
    $data = fetchArray($sql);
    $order = fetchArray("SELECT *, s.acc_address as Saddress, s.acc_name as Sname, u.acc_address as Uaddress, u.acc_name as Uname from orderr as o 
    LEFT JOIN order_detail as d ON o.order_id = d.order_id
    LEFT JOIN food as f ON d.food_id = f.food_id
    LEFT JOIN account as s ON f.acc_id = s.acc_id
    LEFT JOIN account as u ON o.acc_id = u.acc_id
    where o.order_id = $_GET[id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <?php include "../function/style.php";?>
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container">
        <p class="fs-3 navbar-brand text-light">Food_delivery</p>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="page.php" class="nav-link active">Home</a>
            </li>
            <!-- <li class="nav-item">
                <a href="" class="nav-link"></a>
            </li> -->
        </ul>
    </div>
</nav>

    <div class="container mt-5">
        <div class="row row-cols-auto justify-content-between">
            <div class="col">
                <p class="display-4 border-bottom">Seller Details</p>
                <ul>
                    <li class="fs-3">Name: <b><?php echo $order['Sname']?></b></li>
                    <li class="fs-3">Address: <b><?php echo $order['Saddress']?></b></li>
                </ul>
            </div>
            <div class="col">
                <p class="display-4 border-bottom">Customer Details</p>
                <ul>
                    <li class="fs-3">Name: <b><?php echo $order['Uname']?></b></li>
                    <li class="fs-3">Address: <b><?php echo $order['Uaddress']?></b></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <table class="table table-success">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Food Name</th>
                    <th>Food Price</th>
                    <th>Count</th>
                    <th>total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $detail = fetchAll("SELECT * FROM order_detail as d
                LEFT JOIN food as f ON d.food_id = f.food_id
                Where order_id = $_GET[id]");
                foreach($detail as $i => $value):?>
                    <tr>
                        <td><?php echo $i+1?></td>
                        <td><?php echo $value['food_name']?></td>
                        <td><?php echo $value['food_price']?></td>
                        <td><?php echo $value['count']?></td>
                        <td><?php echo $value['count'] * $value['food_price']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
            </div>
        </div>
        <a href="Getjob.php?id=<?php echo $_GET['id']?>" class="btn btn-success">รับงานนี้</a>
    </div>

</body>
</html>