<?php
$pageTitle="معلوات الشراء";
$section="cart";
include ('inc/header.php');
?>

<HTML>
<HEAD>
<script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
var successCallback = function(data) {
var myForm = document.getElementById('payment-form');
// Set the token as the value for the token input
myForm.token.value = data.response.token.token;
myForm.submit();
};
// Called when token creation fails.
var errorCallback = function(data) {
// Retry the token request if ajax call fails
if (data.errorCode === 200) {
call tokenRequest();
} else {
alert(data.errorMsg);
}
};
var tokenRequest = function() {
// Setup token request arguments
var args = {
sellerId: "102626791",
publishableKey: "E0F6517A-CFCF-11E3-8295-A7DD28100996",
ccNo: $("#card-number").val(),
cvv: $("#card-cvc").val(),
expMonth: $("#card-expiry-month").val(),
expYear: $("#card-expiry-year").val()
};
// Make the token request
TCO.requestToken(successCallback, errorCallback, args);
};
$(function() {
// Pull in the public encryption key for our environment
TCO.loadPubKey('production');
$("#payment-form").submit(function(e) {
// Call our token request function
tokenRequest();
// Prevent form from submitting
return false;
});
});
</SCRIPT>
</HEAD>
<BODY>

	<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$complete_name=$_POST['complete_name'];
$address1 = $_POST['address1'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];


$country = $_POST['country'];
$shipping_address_line1 = $_POST['shipping_address_line1'];
$shipping_address_line2 = $_POST['shipping_address_line2'];
$shipping_city = $_POST['shipping_city'];
$shipping_state = $_POST['shipping_state'];
$shipping_country = $_POST['shipping_country'];
$shipping_zipcode = $_POST['shipping_zipcode'];
$phone_no= $_POST['phone_no'] ;
$_SESSION['complete_name'] =$complete_name;
$_SESSION['address1'] =$address1;
$_SESSION['city'] =$city;
$_SESSION['state'] =$state;
$_SESSION['zipcode'] =$zipcode;
$_SESSION['country'] =$country;
$_SESSION['shipping_address_line1'] =$shipping_address_line1;
$_SESSION['shipping_address_line2'] =$shipping_address_line2;
$_SESSION['shipping_city'] =$shipping_city;
$_SESSION['shipping_state'] =$shipping_state;
$_SESSION['shipping_country'] =$shipping_country;
$_SESSION['shipping_zipcode'] =$shipping_zipcode;
$_SESSION['phone_no'] =$phone_no;
?>

<div class="contact">	
		<div class="wrapper">

<span class="payment-errors"></span>

<form action="placeorder.php" method="POST" id="payment-form">

	<input id="token" name="token" type="hidden" value="">
	<table border="0" cellspacing="1" cellpadding="3">
		<tr><td colspan="2" align="center"><h2>الدفع  عن طريق الانترنت</h2></td></tr>
		
		<tr><th>رقم البطاقة</th><td><input type="text"  autocomplete="off" id="card-number"></td></tr>
		
		<tr><th>CVC</th><td><input type="text"  autocomplete="off" id="card-cvc"></td></tr>
		
		<tr><th>الاسم كامل</th><td><input type="text" id="name" size="80" autocomplete="on"></td></tr>
		
		<tr><th>Expiration (MM/YYYY)</th><td><input type="text" size="2" id="card-expiry-month">
		<input type="text" id="card-expiry-year"></td></tr>
		
		<tr><th>مبلغ الدفع </th><th><?php echo $cartamount; ?></th></tr>
		
		<tr><td colspan="2" align="center"><input type="submit" name="submit" value="تاكيد" onclick="formSubmit()">
	</table>

</form>
</DIV>
</div>	
<?php
include ('inc/footer.php');
?>
