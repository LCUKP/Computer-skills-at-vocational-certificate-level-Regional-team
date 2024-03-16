<?php
    include "../dbcon.php";
    session_start();

    $id = $_SESSION['acc_id_type_U'];
    $data = fetchArray("SELECT * from account where acc_id = $id");
    if (empty($id)){
        header("location: ../index.php");
    }

    // $sql = "INSERT INTO orderr (acc_id)
    // VALUES ($data[acc_id])";
    // if (mysqli_query($con, $sql)) {
    //     $order = fetchArray("SELECT * FROM orderr order by order_id Desc");
    //     for($i = 0; $i <= count($_SESSION['foodid']) - 1; $i++) {
    //         $sql = "INSERT INTO order_detail (order_id, food_id, unitprice, count, total)";
    //         $resalt = mysqli_query($con, $sql);
    //     }
    //     if ($resalt) {
    //         unset($_SESSION['foodid']);
    //         unset($_SESSION['foodname']);
    //         unset($_SESSION['foodprice']);
    //         unset($_SESSION['foodcount']);
    //     }
    // }
    $order = fetchArray("SELECT * FROM orderr order by order_id Desc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipt</title>
    <?php include "../function/style.php";?>
</head>
<body>
    <p class="display-3 text-center p-3 border-bottom">Recipt</p>

    <div class="container">
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
                Where order_id = $order[order_id]");
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
        <div class="btn-group">
            <a href="orderhis.php" class="btn btn-success">View order stat</a>
            <a href="page.php" class="btn btn-danger">Back to home page</a>
        </div>
    </div>
</body>
</html>