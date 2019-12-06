<?php
      session_start();
    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
            
    // including header from Templates Folder
    include("../Templates/headerAdmin.html");
?>
    <br> <br>
    <!-- Display list of bill tracking from the below web-site-->
    <div class="reg-Form"><iframe src="https://webmail4.networksolutionsemail.com/interfaces/sso/login.php?user_domain=mail.mafs.org" style="margin:auto; width:100%; height:75vw; "></iframe> </div>

<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
