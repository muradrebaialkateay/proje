
<?php

$pageTitle="أضافة منتج";
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
extract($row);}
?>
<html>
<head>


</head>
<body bgcolor="#CCFF00" dir="rtl">
<div align="center" >

<div>
<h1 align="center">أضافة منتجات </h1>
<form action="adproduct.php" method="post " enctype="multipart/form-data">
<table><tr><td>
اسم المنتج :</td><td><input name="name" type="text"
></td></tr>
<tr><td>مواصفات المنتج :</td><td><input name="description"
type="text" ></td></tr>
<tr><td>سعر المنتج :</td><td><input name="price" type="text"
></td></tr>
<tr><td>صورة المنتج :</td><td><input name="imagename"
type="file" ></td></tr>
</table>
<input type="submit" value="اضافة منتج جديد">
</form>
</div></body>
</html>