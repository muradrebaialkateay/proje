

<?php
$pageTitle="بحث عن عنصر ";
$section="searchitems";
include ('inc/header.php');

$connect = mysqli_connect("localhost", "root","", "myshopping") or
die("Please, check your server connection.");
$tosearch=$_POST['tosearch'];
$query = "select * from products where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM products"; // #1
$columnlist = mysqli_query($connect, $sql) or die(mysql_error()); // #2
while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){ // #3
extract($arr);
$query_fields[] = $Field . " like('%". $tosearch . "%')";
}
$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysql_error());
?>

		<div class="section_latest">
			<div class="wrapper">
				<center><h1>صفحة المنتجات </h1></center>

                    <ul class="products">
                    	

<?php
echo "<table border=\"0\" >";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
if ($x <= 3)
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
echo "</tr><tr>";
}
}
echo "</table>";
?>

</div>
</div>