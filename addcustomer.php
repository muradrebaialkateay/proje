
<?php
$connect = mysqli_connect("localhost", "root", "", "myshopping") or die
("Please, check the server connection.");
$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$completename = $_POST['complete_name'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];

$sql = "INSERT INTO customers (email_address, password, complete_name,
address_line1, address_line2, city, state, zipcode, country, cellphone_no)
VALUES ('$email_address',(PASSWORD('$password')), '$completename', '$address1',
'$address2','$city', '$state', '$zipcode', '$country', '$phone_no')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
if ($result)
	
{
?>
<p>
عزيزي, <?php echo $completename; ?>
 لقد تم أنشاء حسابك بنجاح
<?php
}
else
{
echo "Some error occurred. Please use different email address";
}
?>