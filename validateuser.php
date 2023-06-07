<html>
<head>
<?php
$pageTitle="التحقق من المستخدم";
$section="validateuser";
include ('inc/header.php');

?>

<script language="JavaScript" type="text/JavaScript">
function updateUser(username){ // #1
var ajaxUser = document.getElementById("userinfo"); // #2
ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp;
<a href=\"logout.php\">Log Out</a>";
}
</script>
</head>

<body>

		<div class="wrapper">

<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}

$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$query = "SELECT email_address, password, complete_name FROM customers WHERE
email_address like '" . $_POST['emailaddress'] . "' " .
"AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($connect, $query) or die(mysql_error()); // #3
if (mysqli_num_rows($result) == 1) {
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
extract($row);
echo " <center><h1>مرحباً بك  " . $complete_name . " الى موقعنا التجاري <br>"; // #4
$_SESSION['emailaddress'] = $_POST['emailaddress'];
$_SESSION['password'] = $_POST['password'];
echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$complete_name');
</SCRIPT>"; // #5
}
}
else {
?>

<center><h1> يوجد خطا اثناء ادخال  كلمة السر او الايميل   </h1><h2><br>
  او ليس لديك حساب الكترو <a href="validatesignup.php">أضغط هنا </a> لانشاء حساب.<br><br><br>
للمحاولة مرة أخرى<br>
<a href="signin.php">أضغط هنا</a>...<br>
</h2></center>
</div>

<?php
}
?>