<!doctype html>
<html>
<head>

<script language="JavaScript" type="text/JavaScript">
function makeRequestObject(){
var xmlhttp=false;
try {
xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); // #1
} catch (e) {
try {
xmlhttp = new
ActiveXObject('Microsoft.XMLHTTP'); // #2
} catch (E) {
xmlhttp = false;
}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
xmlhttp = new XMLHttpRequest(); // #3
}
return xmlhttp;
}
function updateCart(){ // #4
var xmlhttp=makeRequestObject();
xmlhttp.open('GET', 'countcart.php', true); // #5
xmlhttp.onreadystatechange = function(){ // #6
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // #7
var ajaxCart = document.getElementById("cartcountinfo"); // #8
ajaxCart.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.send(null);
}
</script>


<meta charset="UTF-8"/>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="improvment.css"/>
	
	
	
</head>
<body dir="rtl" >

	<div class="header" >

		<div class="wrapper">
		<?php 
		if (session_status() == PHP_SESSION_NONE) {
session_start();
}
?>
			<ul class="nav" >
				<li class=" <?php if ($section =="index") {echo "on";} ?> "><a href="index.php"> الرئيسية</a></li>
				<li class="<?php if ($section =="allitemslist") {echo "on";} ?> "><a href="allitemslist.php"> المنتجات  </a></li>
				<?php
				if (isset($_SESSION['emailaddress']))
				{
				echo "<li>مرحبـــاً بك " . $_SESSION['emailaddress'] . "&nbsp;&nbsp;&nbsp;"; // #9
				echo "<a href=\"logout.php\">تسجيل الخروج</a></li>";
				}
				else
				{?>
			<li class="<?php if ($section =="validatesignup") {echo "on";} ?> "><a href="validatesignup.php">انشاء حساب</a></li>
			<li class="<?php if ($section =="signin") {echo "on";} ?> "><a href="signin.php">تسجيل الدخول </a> </li>
            <li class="<?php if ($section =="signup") {echo "on";} ?> "><a href="add.php">أضافة منتج</a></li>
		<?php }?>

				
            	<li class="<?php if ($section =="cart") {echo "on";} ?> "><a 
				style="position: absolute ; top: 33px ;left: -640px"
            		href="cart.php"><img src="img/cart.png"width="50" alt="سلة التسوق">
					<span id="cartcountinfo"></span></a></td></tr> </a></li>
					
					
            	<li class="<?php if ($section =="searchitems") {echo "on";} ?> ">
				<div class="searchitems" style="position: absolute ; top: -30px ;left: -600px" href="cart.php">
					<table cellpadding="3" cellspacing="10">
					<form method="post" action="searchitems.php" >
					<tr>
					<td><input type="text" name="tosearch"></td>
					<td><input type="submit" name="submit" value="بــحــث"></td>
					</tr></form>
					</table>
					</li>
				</div>	

            	   	

            </ul>
		</div>
	</div>
	
	<div id="content">
