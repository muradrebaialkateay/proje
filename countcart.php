<?php
$totalquantity=0;
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$sess = session_id();
$query="select * from cart where cart_sess = '$sess'";
$results = mysqli_query($connect, $query) or die(mysql_error());
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);
$totalquantity = $totalquantity + $cart_quantity;
}
echo $totalquantity;
?>

