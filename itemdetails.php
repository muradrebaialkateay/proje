<?php 
$pageTitle="مواصفات العنصر";
$section="allitemslist";
include ('inc/header.php');

$connect = mysqli_connect("localhost", "root", "", "myshopping") or
die("Please, check your server connection.");
$code=$_REQUEST['itemcode'];

$query = "SELECT item_code, item_name, description, imagename, price FROM products where item_code like '$code'";
$results = mysqli_query($connect, $query) or die(mysql_error()); // #1

$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
?>

	<div class="section_latest">

		<div class="wrapper">

			<div class="getback">	<a href="allitemslist.php"><H2>ارجع الى القائمة</a> --&gt; <?php echo $item_name; ?> 	</div>
				</H2>
				<div class="agag-picture">
					<span>
					<img src="<?php echo $imagename ; ?>" alt="<?php echo $item_name;?>" >
					</span>
				</div>	
				

<?php
$itemname=urlencode($item_name);
$itemprice=$price;
$itemdescription=$description;
$pfquery = "SELECT feature1, feature2, feature3, feature4, feature5,feature6 FROM productfeatures " .
"where item_code like '$code'"; // #2
//$pfresults = mysqli_query($connect, $pfquery) or die(mysql_error());
//$pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
//extract($pfrow);
echo "<form method=\"POST\" action=\"cart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice\" 
style=\" margin-right:50px; margin-top:70px;\">";
?>

					<table>
						<tr>
							<th>السعر </th>
							<th> $<?php echo $itemprice; ?></th>
						</tr>
						<tr>
							<th>الاسم</th>
							<th><?php echo $item_name; ?></th>
						</tr>
						<tr>
							<th>الكمية</th>
							<td><?php  echo "<input type=\"text\" name=\"quantity\" size=\"2\">"; ?></td>
						</tr>
						
						</table>
							<input type="submit"  name="buynow" value="اشتري الان">
							
							<input type="submit"  name="addtocart" value="إضافة الى السلة">
<?php


echo" </form>";
echo "<center><h2>";
/*echo $feature1;
echo $feature2;
echo $feature3;
echo $feature4;*/
echo "</2></center>";

?>
			</div>

			</div>

	</div>
	

<?php 
include ('inc/footer.php');
?>