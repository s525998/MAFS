SELECT * FROM `announcements` 
<?php
    // page run thorugh ProcessEvent.php once EventPost.php is loaded
    include_once("processPost.php");

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
        
    include("../Templates/headerAdmin.html"); 
?>
<?php
    // check if there is any other page Number rather than 1 if not then set default to page number to 1
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    // number of recrod to display in a page
    $no_of_records_per_page = 5;

    // used in Limit method in query
    $offset = ($pageno-1) * $no_of_records_per_page;

    // this query will display total record in given table
    $total_pages_sql = "SELECT COUNT(*)FROM `announcements`";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

  
   /* This query is selecting all data from table 'PastEmployee' which is order by ID(report-id) in descending order */
   $queryPost ="SELECT * FROM `announcements` WHERE `Type`='jeffCity' OR `Type`='legislationUpdate' OR `Type`='bestPractices' ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";

     // to run above query
     $resultPost = mysqli_query($con,$queryPost);

?>

<div class = "container-fluid">
<?php
      // check if 'pastEmpList' is empty or not
        if (isset($_SESSION['postList'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying pastEmpList 
        echo $_SESSION['postList']; 
        unset ($_SESSION['postList']); ?>
</div>
<?php endif?>
 
<div class= "row">
        <div class="col-sm-3 col-md-1"></div>
        <div class="col-sm-9 col-md-8"> 
                 <!-- table created -->
            <table id="mafsTable">

            <!-- first row of the table -->
            <thead>
                <th height="50" > File Name </th>
                <th> Type</th>
                <th> Action </th>
            </thead>

            <!-- store all the data of events table in array called $row and using while Loop condition until it contain value -->
            <?php  while($row = mysqli_fetch_array($resultPost)): ?>

            <tr>
            <!-- Displaying Date, EventName and EventDetails in each row from 'report' table -->
            <td height="100" ><?php echo $row['fileName']; ?></td>
            <td  height="100" ><?php echo $row['Type']; ?></td>

            <!-- this column display edit and delete option -->
            <td  height="50" width="150"> 

            <!-- Passing event id, date and eventName to ProcessEvent.php using GET method for delete option -->
            <a href="processPost.php?idEmp=<?php echo $row['ID'];?>&Name=<?php echo $row['fileName'];?>&Type=<?php echo $row['Type'];?>" class="btn btn-danger" id="btn"> Delete </a>
            </td>
            </tr>

            <!-- closing while condition -->
            <?php endwhile; ?>

            </table>    
        </div>
</div>
<div class = "row">
        <div class="col-sm-4 col-md-5"> </div>
        <div class="col-sm-6 col-md-7"> 
        <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul> 
    </div>
</div>
<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
