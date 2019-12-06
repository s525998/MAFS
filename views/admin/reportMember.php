<?php
     // needed for connection of database which is contain in sql.php
     include("sql.php");

     //temporarily storing data
     session_start();

     /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
            

     // using header from the Templates folder
     include("../Templates/headerAdmin.html");

     // storing ID passed from GET method
     $id = $_GET['ID'];

     // if condition to check if ID is empty or not
     if (isset($_GET['ID']) ){
          $id = $_GET['ID'];

          //search the data from mafsaction table from the following criteria
          $queryReport = "SELECT * FROM  `mafsaction` WHERE mafsaction.ID = $id ";
          $resultReport = mysqli_query($con,$queryReport);
          
          // check if above query execute
          if ($resultReport){
               // Store all data of $resultReport in $rowReport as array 
               $rowReport = mysqli_fetch_array($resultReport);

               // query to select all the data from mafs_report and member table of given criteria
               $queryDisplay= "SELECT * FROM  `mafs_report`, `member` WHERE mafs_report.mafs_id = '".$rowReport['ID']."' AND mafs_report.report_by = member.ID";
               $resultDisplay = mysqli_query($con,$queryDisplay);
               
          }
          else{
               // if above query does not execute then given an error message
               die("error could not connect database");
          }
     }

    ?>

     <h2 style=" margin-left: 16em;"> MAFS Action </h2>
    <div style=" margin-left: 6em; marign-top: 1em; font-size:16px; color: lightseagreen; ">
          <a href="reportAll.php?ID=<?php echo $id; ?>"> <?php echo($rowReport['action']); ?> </a>
          </div>
 <table class="table">

<tr>
     <th height="35" width="50">Submitted By</th>
     <th height="35" width="210">Report</th>
</tr>

<!-- storing data from $resultDisplay to an array $rowDisplay and using while condition   -->
<?php while ($rowDisplay = mysqli_fetch_array($resultDisplay)): ?>

<tr>
     <!-- display the firstname and lastname and the report     -->
     <td><?php echo ($rowDisplay['First Name']. " " . $rowDisplay['Last Name']); ?></td>
     <td><?php echo($rowDisplay['Report'])?></td>     
</tr>

<!-- ending while loop condition -->
<?php endwhile; ?>

</table>

<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>



