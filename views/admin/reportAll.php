<?php
      // needed for connection of database which is contain in sql.php
     include("sql.php");

     // temporarily storing data
     session_start();

      /* To check if user logged in and visit this page */
     if (isset($_SESSION['isAdmin'])){   
     
     // using header from the Templates folder
     include("../Templates/headerAdmin.html");

    // if condition to check if ID is empty or not
     if (isset($_GET['ID']) ){
         // store ID in variable $id
        $id = $_GET['ID'];

        // query to search all the data from 'mafsaction' table with given criteria 
        $queryReport = "SELECT * FROM  `mafsaction` WHERE mafsaction.ID = $id ";
        $resultReport = mysqli_query($con,$queryReport);
        
        // check if above query has problem executing
        if ($resultReport){
             // Store above information from resultReport to $rowReport variable as array
             $rowReport = mysqli_fetch_array($resultReport);

             // query to search all the data from 'mafs_report' table with given criteria 
             $queryDisplay= "SELECT * FROM  `mafs_report` WHERE mafs_report.mafs_id = '".$rowReport['ID']."' AND mafs_report.Report NOT IN ('N/A', 'n/a')";
             $resultDisplay = mysqli_query($con,$queryDisplay);
             
        }
        else{
             // If you are unable to run the above query then output following statement 
             die("Could not find above data");
        }
   }

   ?>

<div class= "container-fluid">
     
     <div class="post-div">
     <!-- Header -->
     <h2 style=" padding: 5px 6em;"> MAFS ACTION </h2>

     <!-- Div with this id is use in JS to copy whole chunk of div text  -->
     <div id="copyText">
     <div style="padding: 10px; font-size:16px; ">
          <?php echo($rowReport['action']); ?> 
     </div>

  
     <!-- orderline attribute to display all the mafsreport in list -->
     <ol type ="1" class="allReport" >

     <!-- storing data from $resultDisplay to an array $rowDisplay and using while condition   -->
     <?php while($rowDisplay = mysqli_fetch_array($resultDisplay)): ?> 
     
     <!-- display all the Report from the $rowDispaly in list -->
     <li>  <?php echo $rowDisplay['Report']; ?></li>
     <?php endwhile ?>

     </ol>
</div>
<!-- This button has HTML event called 'onclick' which will trigger the method 'CopyToClipboard' in JS -->
<button  class="btn btn-primary" onclick="CopyToClipboard('copyText')">Copy Reports</button>
     </div>
</div>


<script>
// function which is trigger when you click button `Copy Reports`
// With this function you are able to copy any text inside with any Div html element that you pass in as parameter
function CopyToClipboard(containerid) {
if (document.selection) { 
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("copy");
}}
  </script>

<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
