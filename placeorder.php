
<?php
require_once("lib/Twocheckout.php");
Twocheckout::privateKey('E0F6517A-CFCF-11E3-8295-A7DD28100996');
Twocheckout::sellerId('102626791');
include('topmenu.php');
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$complete_name=$_SESSION['complete_name'];
$address1 = $_SESSION['address1'];
$city = $_SESSION['city'];
$state = $_SESSION['state'];
$zipcode = $_SESSION['zipcode'];
$country = $_SESSION['country'];
$shipping_address_line1 = $_SESSION['shipping_address_line1'];
$shipping_address_line2 = $_SESSION['shipping_address_line2'];
$shipping_city = $_SESSION['shipping_city'];
$shipping_state = $_SESSION['shipping_state'];
$shipping_country = $_SESSION['shipping_country'];
$shipping_zipcode = $_SESSION['shipping_zipcode'];
$phone_no= $_SESSION['phone_no'] ;
$email_address= $_SESSION['emailaddress'] ;


$today = date("Y-m-d");
$sessid = session_id();
$sql = "INSERT INTO orders (order_date, email_address,
shipping_address_line1, shipping_line_2, shipping_city, shipping_state,
shipping_country, shipping_zipcode)
VALUES ('$today','$email_address','$shipping_address_line1',
'$shipping_address_line2', '$shipping_city','$shipping_state',
'$shipping_country','$shipping_zipcode'')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
$orderid = mysql_insert_id();
try {
$charge = Twocheckout_Charge::auth(array(
"merchantOrderId" => "$orderid",
"token" => $_POST['token'],
"currency" => 'USD',
"total" => '$cartamount',
"billingAddr" => array(
"name" => '$complete_name',
"addrLine1" => '$address1',
"city" => '$city',
"state" => '$state',
"zipCode" => '$zipcode',
"country" => '$country',
"email" => '$email_address',
"phoneNumber" => '$phone_no'
),
"shippingAddr" => array(
"name" => '$complete_name',
"addrLine1" => '$shipping_address_line1',
"city" => '$shipping_city',
"state" => '$shipping_state',
"zipCode" => '$shipping_zipcode',
"country" => '$shipping_country',
"email" => '$email_address',
"phoneNumber" => '$phone_no'
)
), 'array');
if ($charge['response']['responseCode'] == 'APPROVED') {
echo "Thanks for your Order!";
echo "Please, remember your Order number is $orderid<br>";
echo "<h3>Return Parameters:</h3>";
echo "<pre>";
print_r($charge);
echo "</pre>";
$query = "SELECT * FROM cart WHERE cart_sess='$sessid'";
$results = mysqli_query($connect, $query) or die(mysql_error());
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
extract($row);


$totalamount=$totalamount + ($cart_price * $cart_quantity);
$sql2 = "INSERT INTO orders_details (order_no, item_code, item_name,
quantity, price)
VALUES ($orderid,$cart_itemcode,'$cart_item_name',
$cart_quantity,$cart_price)";
$insert = mysqli_query($connect, $sql2) or die(mysql_error());
}
$sql2 = "INSERT INTO payment_details (order_no, email_address,
customer_name, payment_type, name_on_card, card_number, expiration_date)
VALUES ($orderid,$cart_itemcode,'$cart_item_name',
$cart_quantity,$cart_price)";
$insertpayment = mysqli_query($connect, $sql2) or die(mysql_error());
$query = "DELETE FROM cart WHERE cart_sess='$sessid'";
$delete = mysqli_query($connect, $query) or die(mysql_error());
session_destroy();
}
} catch (Twocheckout_Error $e) {
print_r($e->getMessage());
}
?>