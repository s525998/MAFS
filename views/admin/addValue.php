<?php
 include('Templates/header2.html')
 ?>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = $_POST['userName'];

print "<p> Thank you, your User Name is $username </p>";
?>