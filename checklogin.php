<?php

$pageTitle="فحص الدخول";
$section="cart";
include ('inc/header.php');
?>

<div class="contact">	
<div class="wrapper">

<center>
<h1>&nbsp;</h1>
</center>
<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$cartamount=0;
$cartamount = $_POST['cartamount'];
$_SESSION['cartamount']=$cartamount;
if (isset($_SESSION['emailaddress']))
{
$email_address=$_SESSION['emailaddress'];
echo "Welcome " . $email_address . ". <br/>";
}
if (isset($_SESSION['password']))
{
$password=$_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
(isset($_SESSION['password']) && $_SESSION['password'] != "")) {
$sess = session_id();
$query="select * from cart where cart_sess = '$sess'";
$result = mysqli_query($connect, $query) or die(mysql_error());
if(mysqli_num_rows($result)>=1)
{?>
<center>
<h2>اذا أكملت التسوق <a href=shipping_info.php> أضغط هنا </a> لتجهيز معلومات التسوق </h2>

<h2>لمتابعة التسوق <a href=allitemslist.php> أضغط هنا </a> للمتابعة </h2>
</center>
<?php
}
else
{
?>

<center>
<h2>يمكنك متابعة التسوق بأختيار العناصر التى في القائمة</h2>
</center>
<?php
}
}
else
{
?>
<h2>
		<h1>انت لم تقوم بالدخول </h1>
		<p>
		انت لم تقوم بتسجيل الدخول .<br>
		
		أنت تستطيع الشراء فقط عندما تقوم بالدخول  <br>
	  أذا انت قد قومت بتفعيل حساب مسبقاً 
		<a href="signin.php">أضغط هنا </a>
		للدخول ,<br> أو بأمكنك ان تقوم بأنشاء حسابك الكتروني  الخاص <a href="validatesignup.php">أضغط هنا </a> للتسجيل
		</p>
</h2>
</div>
</div>


<style>

p{
	line-height:1.4em;
	font-weight:bold;
}
</style>

<?php
}

include ('inc/footer.php');


?>
