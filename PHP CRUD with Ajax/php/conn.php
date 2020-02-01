<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","ajax_crud");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>