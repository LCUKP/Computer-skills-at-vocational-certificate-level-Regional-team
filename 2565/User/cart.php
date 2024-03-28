<?php 
session_start();
$id=$_GET['id'];
$act=$_GET['act'];

include('../Page/dbconnect.php');

if($act=="add" && !empty($id)){
    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]++;

    } else {
        $_SESSION['cart'][$id]=1;
    }
} 

if($act=="remove" && !empty($id)){
    unset($_SESSION['cart'][$id]);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
</head>
<body>
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
      <td align="center" bgcolor="#F9D5E3">ลบ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $FoodID=>$qty)
	{
		$sql	= "select * from tb_food where FoodID=$FoodID";
		$query	= mysqli_query($connect, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['fdPrice']*$qty;
		$total	+= $sum;
    echo "<tr>";
    echo "<td>" . $row["fdName"] . "</td>";
    echo "<td align='right'>" .number_format($row['fdPrice'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "<td><a href='cart.php?id=$row[0]&act=remove'>ลบ</a></td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>

</form>
</body>
</html>