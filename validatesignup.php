
<?php
$pageTitle="validatesignup";
$section="validatesignup";
include ('inc/header.php');

?>

<html>
<head>
<script language="JavaScript" type="text/JavaScript" src="js/checkform.js">
</script>
</head>

<body>

	
<div class="contact">	
		<div class="wrapper">

			<center><h1>انشاء حساب  الكتروني</h1></center>

<form action="addcustomer.php" method="post" onSubmit="return validate(this);">

<table border="2">

<tr>
<td colspan="2" align="center"><h1>إدخل معلوماتك الشخصية</h1></td></tr>


<tr>
<th>البريد الالكتروني </th>
<th><input size="20" type="text" name="emailaddress" >
<span id="emailmsg"></span>
</th>
</tr>


<tr><th>كلمة السر</th><td><input type="password"name="password" >
<span id="passwdmsg"></span></td></tr>

<tr><th>إعادة كلمة السر</th><td><input type="password" name="repassword">
<span id="repasswdmsg"></span></td></tr>

<tr><th>الاسم كامل </th><td><input type="text" name="complete_name" >
<span id="usrmsg"></span></td></tr>


<tr><th>العنوان </th><td><input  type="text" name="address1"></td></tr>

<tr>
<th>عنوان اخر </th><td><input size="80" type="text" name="address2">
</td></tr>

<tr><th>المدينة </th><td><input size="30" type="text"
name="city"></td></tr>

<tr><th>الجنس </th><td><input size="30" type="text"
name="state"></td></tr>

<tr><th>الدولة</th><td><input size="30" type="text"
name="country"></td></tr>

<tr><th>مفتاح الدولة</th><td><input size="20" type="text"
name="zipcode"></td></tr>

<tr><th>رقم التلفون</th><td><input size="30" type="text"
name="phone_no"></td></tr>

<tr>
<td><input type="submit" name="submit" value="أرسال و تأكيد"></td>
<td>
<input type="reset" value="مسح البيانات">
</td>
</tr>

</table>
</form>


<?php
include ('inc/footer.php');
?>
