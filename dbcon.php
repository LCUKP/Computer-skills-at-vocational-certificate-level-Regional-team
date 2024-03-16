<?php 

$con = mysqli_connect("localhost","root","","songkhla");


function fetchArray($sql) {
    global $con;
    $query = mysqli_query($con, $sql);
    return mysqli_fetch_array($query, MYSQLI_ASSOC);
}
function fetchAll($sql) {
    global $con;
    $query = mysqli_query($con, $sql);
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

?>