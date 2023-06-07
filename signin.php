<?php
$pageTitle="signin";
$section="signin";
include ('inc/header.php');

?>



<div class="contact">	
		<div class="wrapper">

			<center><h1>شكرا لكم للتعامل معنا</h1></center>

			<form action="validateuser.php" method="post">

			<table border="0" cellspacing="1" cellpadding="3">
			<tr><th>البريد الالكتروني:</th><td>
			<input type="text"size="200px"  name="emailaddress">
			</td></tr>
			
			<tr><th>كلمة السر:</th><td><input type="password"  name="password"></td></tr>
			<tr><td colspan=2 align="center"><input type="submit" name="submit"
			value="Login"></td></tr>
			</table>

			</form>
		</div>
</div>
<?php
include ('inc/footer.php');

?>