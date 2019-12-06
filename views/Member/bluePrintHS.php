<?php
      session_start();
/* To check if user logged in and visit this page */
if (isset($_SESSION['isMember'])){

// using header from the Templates folder
include("../Templates/headerMember.html");
?>

<!-- Display BluePrintHighSchool.pdf that is inside the 'public/pdf' folder -->
<div class="reg-Form"><embed src="../../public/pdf/BluePrintHighSchool.pdf" style=" width:72em; height:75vw; "/></div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
