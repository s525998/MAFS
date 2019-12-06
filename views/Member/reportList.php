<?php
     // needed for connection of database which is contain in sql.php
     include_once('../admin/sql.php');
     session_start();

     /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){

     // including member header from Templates Folder
     include("../Templates/headerMember.html");
 ?>

<div class= "container-fluid">
    <div class="main-div">

        <div class="officer ff8300 ">Strategic Action</div>

<!-- List of Strategic Action and each action  is linked to 'report.php' page and send GET request
        where it send ID information and you can submit report on that page w.r.t Action  -->    
        <ol class="lists" style=" font-size: 20px;" type= "1">

            <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80; font-size:17px;">
                <a class="list" style="font-size:17px;"  href="report.php?ID=1">Attainment</a>
            </li>

            <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80; font-size:17px;">
                <a class="list" style="font-size:17px;" href="report.php?ID=2">Affordability</a>  
            </li>

            <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80; font-size:17px;">
               <a class="list" style="font-size:17px;"  href="report.php?ID=3">Quality</a>
            </li>

            <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80; font-size:17px;">
                <a class="list" style="font-size:17px;"  href="report.php?ID=4">Research & Innovation</a>
            </li>

            <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80; font-size:17px;">
                <a class="list" style="font-size:17px;"  href="report.php?ID=5">Investment, Advocacy & Partnerships</a>
            </li>
        </ol>   
    </div>
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
