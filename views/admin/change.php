
    <?php 
         // page run thorugh ProcessUser.php once admin.php is loaded
        include('ProcessUser.php');        

        /* To check if user logged in and visit this page */
        if (isset($_SESSION['isAdmin'])){
        

          // adding header from Template folder
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
    $no_of_records_per_page = 7;

    // used in Limit method in query
    $offset = ($pageno-1) * $no_of_records_per_page;

    // this query will display total record in given table
    $total_pages_sql = "SELECT COUNT(*)FROM `member`";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

  
   /* This query is selecting all data from table 'member' which is order by ID(report-id) in descending order */
   $query = "SELECT  * FROM `member` ORDER BY `ID` DESC LIMIT $offset, $no_of_records_per_page";

     // to run above query
     $result = mysqli_query($con,$query);

?>

<?php
        // check if 'deleteMsg' is empty or not
        if (isset($_SESSION['deleteMsg'])):
?>
     <!-- retrieving 'msg-type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
        //displaying deleteMsg and id 
        echo $_SESSION['deleteMsg']; 
        echo $_SESSION['id'];
        unset ($_SESSION['deleteMsg']);
    ?>
</div>
 <!-- closing if conditon -->
<?php endif ?>


<?php
        // check if 'deleteMsg' is empty or not
        if (isset($_SESSION['updateMsg'])):
?>
     <!-- retrieving 'msg-type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
        //displaying deleteMsg and id 
        echo $_SESSION['updateMsg']; 
        echo $_SESSION['id'];
        unset ($_SESSION['updateMsg']);
    ?>
</div>
 <!-- closing if conditon -->
<?php endif ?>



<!-- creating table -->
<table id="mafsTable">

    <!-- First row of the table -->
    <thead>
        <tr>
            <th> First Name</th>
            <th>Last Name</th>
            <th> Email-Address</th>
            <th colspan="2"> Action</th>
        </tr>
    </thead>


<?php 
    // store all the data of member table in array called $row and using while Loop condition until it contain value
    while($row = $result->fetch_assoc()): 
?>

<tr>
    <!-- Display First Name, Last Name and E-mail in each row from `member` Table -->
    <td> <?php echo $row['First Name']; ?></td>
    <td> <?php echo $row['Last Name']; ?></td>
    <td> <?php echo $row['E-Mail']; ?></td>

    <!-- this column display edit and delete option -->
    <td> 
        <!-- passing User ID to admin.php from GET method for Edit option-->
        <a href="admin.php?editId=<?php echo $row['ID'];?>" class="btn btn-info" id="btn"> Edit </a>
        
        <!-- Passing User ID, FirstName and LastName from GET method for delete option -->
        <a href="ProcessUser.php?id=<?php echo $row['ID'];?>&first=<?php echo $row['First Name'];?>&last=<?php echo $row['Last Name'];?>" class="btn btn-danger" id="btn"> Delete </a>
    </td>
</tr>

<!-- closing while loop -->
<?php 
    endwhile;
?>
    </table>
<br>
<div class = "row">
        <div class="col-sm-4 col-md-4"> </div>
        <div class="col-sm-6 col-md-6"> 
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


</html>
<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>


