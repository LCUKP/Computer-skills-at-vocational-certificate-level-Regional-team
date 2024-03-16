<?php

include "../dbcon.php";
    session_start();

    
    $id = $_SESSION['acc_id_type_U'];
    if (empty($id)){
        header("location: ../index.php");
    }
$data = fetchArray("SELECT * FROM account where acc_id = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order history</title>
    <?php include "../function/style.php";?>
</head>
<body>
    
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container">
        <p class="fs-3 navbar-brand text-light">Food_delivery</p>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="page.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">Order History</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Menu</th>
                <th>Total Price</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $order = fetchAll("SELECT *, count(d.food_id) as countfood, SUM(total) as sum FROM orderr as o
                LEFT JOIN order_detail as d ON o.order_id = d.order_id
                where acc_id = $id
                group by d.order_id;");
                foreach($order as $i => $value):
                    if ($value['done'] == 0) {
                        $msg = "กำลังรอไรเดอร์รับออร์เดอร์";
                        $class="table-danger";
                    } elseif ($value['done'] == 1) {
                        $msg = "ร้านกำลังจัดเตรียมอาหาร";
                        $class="table-warning";
                    } elseif ($value['done'] == 2) {
                        $msg = "กำลังจัดส่งอาหาร";
                        $class="table-warning";
                    } elseif ($value['done'] == 3) {
                        $msg = "จัดส่งสำเร็จ";
                        $class="table-success";
                    }
            ?>
            <tr class="<?php echo $class?>">
                <td><?php echo $i+1?></td>
                <td><?php echo $value['order_date']?></td>
                <td><?php echo $value['countfood']?></td>
                <td><?php echo $value['sum']?></td>
                <td><?php echo $msg?></td>
                <td> <?php if ($value['done'] == 0):?>
                    <a href="cancel.php?orderid=<?php echo $value['order_id']?>" class="btn btn-danger">ยกเลิกออร์เดอร์</a>
                    <?php else: ?>
                        <a href="recipt.php" class="btn btn-primary">ดูใบเสร็จย้อนหลัง</a>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

</body>
</html>