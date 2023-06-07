<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<?php
$con=mysqli_connect("localhost","root","","myshopping");
if(mysqli_connect_errno())
{echo "failed to connect to Mysql: ".mysqli_connect_error();}
$item_code=$_POST['item_code'];
$item_name=$_POST['item_name'];
$addrrss1=$_POST['addrrss1'];
$imgename=$_POST['imgename'];
$descrpion=$_POST['descrpion'];
$sql="insert into products(item_code,item_name,addrrss1,descrpion,imgename)values('$item_code','$item_name','$addrrss1','$descrpion','imgename')";
if(mysqli_query($con,$sql))
{
echo "تمت الاضافه بنجاح ";
mysqli_close($con);
header("location: index.php");
}
?>










<body>
</body>
</html>