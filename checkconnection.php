<?php
// Connect to the database server
$MySQLi = new MySQLi("localhost", "root", "", "myshopping");
if ($MySQLi->errno) {
printf("Unable to connect to the database:<br /> %s",$MySQLi->error);
exit();
}
else
printf("Successfully connected with the MySQL server and shopping
database is opened");
?>