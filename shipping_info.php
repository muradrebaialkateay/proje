<?php

$pageTitle="معلومات التسوق";
$section="validatesignup";
include ('inc/header.php');


if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$email_address="";
if (isset($_SESSION['emailaddress']))
{
$email_address=$_SESSION['emailaddress'];
}
if (isset($_SESSION['password']))
{
$password=$_SESSION['password'];
}

if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
(isset($_SESSION['password']) && $_SESSION['password'] != "")) {
$query = "SELECT * FROM customers where email_address like '$email_address'
and password like (PASSWORD('$password'))";
$results = mysqli_query($connect, $query) or die(mysql_error());
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
?>

<div class="contact">	
		<div class="wrapper">

			<center><h1>معلوماتك الشخصية </h1></center>


<form action="purchase.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">

<tr><td colspan="2" align="center">
<h2>معلوماتك المتوفره لدينا</h2></td></tr>

<tr><th>البريد الالكتروني:</th>
<td><input size="20" type="text" name="email_address" value="<?php echo $email_address; ?>"></td></tr>

<tr><th>الاسم كامل</th><td>
<input size="50" type="text" name="complete_name" value="<?php echo $complete_name; ?>"></td></tr>


<tr><th> العنوان الاول </th><td>
<input size="80" type="text" name="address1"value="<?php echo $address_line1; ?>"></td></tr>

<tr><th>العنوان الثاني</th><td>
<input size="80" type="text" name="address2" value="<?php echo $address_line2; ?>"></td></tr>

<tr><th>المدينة</th>
<td><input size="30" type="text" name="city" value="<?php echo $city; ?>"></td></tr>

<tr><th>الجنس: </th><td><input size="30" type="text" name="state"
value="<?php echo $state; ?>"></td></tr>

<tr><th>الدولة: </th><td><input size="30" type="text" name="country"
value="<?php echo $country; ?>"></td></tr>
<tr><th>مفتاح الدولة: </th><td><input size="20" type="text" name="zipcode"
value="<?php echo $zipcode; ?>"></td></tr>
<tr><th>رقم التلفون: </th><td><input size="30" type="text" name="phone_no"
value="<?php echo $cellphone_no; ?>"></td></tr>

<tr><td colspan=2 align="center">
<h2>
حدث معلوماتك من اسفل ان لزم الامر
</h2></td></tr>

<tr><th> عنوان المستلم </th><td>
<input type="text" size="80"name="shipping_address_line1" value="<?php echo $address_line1; ?>"></td></tr>


<tr><th> عنوان المستلم البديل </th><td><input type="text" size="80" name="shipping_address_line2"
value="<?php echo $address_line2; ?>"></td></tr>

<tr><th> المديــنة: </th>
<td><input size="30" type="text"name="shipping_city" value="<?php echo $city; ?>"></td></tr>

<tr><th> الجنس </th><td><input size="30" type="text"name="shipping_state" value="<?php echo $state; ?>"></td></tr>

<tr><th> الدولة: </th><td><input size="30" type="text"name="shipping_country" value="<?php echo $country; ?>"></td></tr>

<tr><th>مفتاح الدولة </th><td><input type="text" size="20" name="shipping_zipcode" value="<?php echo $zipcode; ?>"></td></tr>

<tr><td>
<input type="submit" name="submit" value="تجهيز معلومات الدفع"></td><td>

<input type="reset" value="الغاء"></td></tr>
</table>
</form>
<?php
}

include ('inc/footer.php');
?>
