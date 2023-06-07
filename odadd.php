<?php
include("includes/checkconection.php");
include("includes/function.php");
include("header.php");$name=$_POST["item_name"];
$description=$_POST["description"];
$price=$_POST["price"];
//Protect against SQL Injection
$price=floatval($price);
if
(!get_magic_quotes_gpc())$name=mysql_escape_string($item_name);
if
(!get_magic_quotes_gpc())$description=mysql_escape_string($description);

//Protect against XSS
$name=strip_tags($name);
$description=strip_tags($description);
//Content validation
$errors=array();
if(empty($name))$errors[]="الاسم  ";
if(empty($description)) $errors[]="الوصف ";
if($price<=0) $errors[]="السعر ";
if($_FILES['imagename']['error']>0) $errors[]="الصورة ";
if($_FILES['imagename']['error']==0 &&
strpos($_FILES['imagename']['type'],"image/")===false)
$errors[]=" صيغة الملف";
echo "<center>";
if (count($errors)){
echo "يرجى التاكد من   (" . implode(" , ",$errors) . ")
<br /><a href='add.php'> العودة</a>";
}else{
$path="images/".dechex(rand(1,1e6))."
".$_FILES['picture']['name'];
if
(move_uploaded_file($_FILES['imagename']['tmp_name'],$path)){
$sql="INSERT INTO products(item ,description
,price ,picture) VALUES('$name', '$description', $price,
'$path')";
$query=mysql_query($sql);
if (!mysql_errno()){
echo " تم اضافة المنتج بنجاح ";
}else{
echo " حدث خطا اثناء دخول القاعدة";
}
}else{
echo "حدث خطا اثناء نقل الملف ";}
}
echo "</center>";
include("footer.php");
?>