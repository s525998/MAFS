<!-- Connection to myPhpAdmin database  -->
<?php
$db_host="localhost";
$db_username="root";
$db_pass="mafs123";
$db_name= "mafs";


$con = mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die("could not connect to mysql");
mysqli_select_db ($con,"$db_name") or die('No Database');

error_reporting(0);
ini_set('display_errors', 0);
?>