
<?php
$connect = mysqli_connect("localhost", "root", "", "myshopping") or die
("Please, check the server connection.");
$item_code = $_POST['item_code'];
$item_name = $_POST['item_name'];
$item_brand = $_POST['item_brand'];
$model_number= $_POST['model_number'];
$weigth = $_POST['weigth'];
$dimension = $_POST[' 
 dimension'];
$description = $_POST[' description'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$price  = $_POST['price '];
$imagename = $_POST['imagename'];

$sql = "INSERT INTO customers (item_code,item_name, item_brand,
model_number, weigth, dimension,description, category, quantity, price,imagename)
VALUES ('$email_address',(item_name('$item_name')), '$item_brand', 'model_number',
'$weigth','$dimension', '$description', '$category', '$quantity', '$price','imagename')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
if ($result)
	
{
?>
<p>
عزيزي, <?php echo $item_name; ?>
 لقد تم أضافة  المنتج بنجاح
<?php
}
else
{
echo "Some error occurred. Please use different email address";
}
?>