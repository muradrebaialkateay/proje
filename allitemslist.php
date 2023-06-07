


	
<?php 
$pageTitle="كل المنجات";
$section="allitemlist";
include ('inc/header.php');
?>



		<div class="section_latest">
			<div class="wrapper">
				<center><h1>صفحة المنتجات </h1></center>

                    <ul class="products">

<?php
$connect = mysqli_connect("localhost", "root", "", "myshopping") or die("Please, check your server connection.");
$query = "SELECT item_code, item_name, description, imagename, price FROM products";
$results = mysqli_query($connect, $query) or die(mysql_error());
					
$x=1;
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
if ($x <= 4)
{
$x = $x + 1;
extract($row);
echo "<li>";					 	
echo "<a href=itemdetails.php?itemcode=$item_code>";

echo '<img src="' . $imagename . '  "alt=" '. $item_name  .'">';

 echo '<p>'.$item_name .'</p>';
 echo "</a>";
echo '<p> السعر$'.$price .'</p></li>';


}
else
{
$x=1;

echo "</li>";
}
}
?>


				</ul>
        
				</div><!--end of wrapper-->
           
			</div><!--end of section_latest-->	

			<?php
include ('inc/footer.php');

?>