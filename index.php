
<?php 
$pageTitle="homepage";
$section="index";
include ('inc/header.php');
?>
	
	
        	<div class=""><!--start of section banner -->

			<div class="wrapper">


 <!-- Slideshow container -->
    <div class="cont">
  <div class="mySlides fade">
    <img src="img/22.jpg" style="width:99%" height="500px">
  </div>
  <div class="mySlides fade">
    <img src="img/7.jpg" style="width:99%" height="500">
  </div>
   <div class="mySlides fade">
    <img src="img/23.jpg" style="width:99%" height="500">
  </div>
  <div class="mySlides fade">
    <img src="img/24.jpg" style="width:99%" height="500">
  </div>
  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<!-- The dots/circles -->
<div width="98%">
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span></div>
              <script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5000);
}
</script>
</div>
			</div>
        
		</div><!--end o section banner -->


		<div class="section_latest">
			<div class="wrapper">
				    <ul class="products">
<?php
$connect = mysqli_connect("localhost", "root", "", "myshopping") or die("Please, check your server connection.");
$query = "SELECT item_code, item_name, description, imagename, price FROM products";
$results = mysqli_query($connect, $query) or die(mysql_error());
					
$x=1;
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
?>


				</ul>
        
				</div><!--end of wrapper-->
           
			</div><!--end of section_latest-->	

	
	
<?php
include('inc/footer.php');
?>