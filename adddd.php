

<?php

$pageTitle="أضافة منتج";
$section="validatesignup";
include ('inc/header.php');
include ('signup.php');

if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if (isset($_SESSION['cartamount']))
{
$cartamount=$_SESSION['cartamount'];
}
$connect = mysqli_connect("locaslhost", "root", "", "myshopping") or
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
extract($row);}
?>
<html>

<div class="contact">	
		<div class="wrapper">

			<center><h1>أضافة منتج جديد </h1></center>


<form action="adproduct.php" method="post">
<table border="0" cellspacing="1" cellpadding="3">

<tr><td colspan="2" align="center">
<h2>المعلومات المتوفره لدينا</h2></td></tr>

<tr><th>رقم المنتج:</th>
<td><input size="20" type="number" name="item_code" value="<?php echo $item_code; ?>"></td></tr>

<tr><th>الاسم كامل</th><td>
<input size="50" type="text" name="complete_name" value="<?php echo $item_name; ?>"></td></tr>


<tr><th> العلامة التجارية </th><td>
<input size="80" type="text" name="address1"value="<?php echo $item_brind; ?>"></td></tr>

<tr><th>الموديل</th><td>
<input size="80" type="text" name="model_item" value="<?php echo $model_item; ?>"></td></tr>

<tr><th>الوزن</th>
<td><input size="30" type="text" name="$weigth" value="<?php echo $weigth; ?>"></td></tr>

<tr><th>الابعاد: </th><td><input size="30" type="text" name=""
value="<?php echo $dimension; ?>"></td></tr>

<tr><th>الوصف: </th><td><input size="30" type="text" name="description"
value="<?php echo $description; ?>"></td></tr>
<tr><th>الفئة: </th><td><input size="20" type="text" name="categry"
value="<?php echo $category; ?>"></td></tr>
<tr><th>العدد: </th><td><input size="30" type="text" name="quantity"
value="<?php echo $quantity; ?>"></td></tr>
<tr><th>السعر: </th><td><input size="20" type="text" name="price"
value="<?php echo $price; ?>"></td></tr>
<tr><th>الصورة: </th><td><input size="30" type="pictuer" name="imagename"
value="<?php echo $imagename; ?>"></td></tr>


<tr><td colspan=2 align="center">
<h2>
</h2></td></tr>

<tr><td>
<input type="submit" name="submit" value="أضافة"></td><td>

<input type="reset" value="الغاء"></td></tr>
</table>
</form>

</div>
</div>
</body>
</html>
<?php


include ('inc/footer.php');
?>
