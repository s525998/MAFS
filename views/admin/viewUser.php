
<?php
    // needed for connection of database which is contain in sql.php
        include("sql.php");

        session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
            
    // using header from the Templates folder
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
    $no_of_records_per_page = 10;

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
        <!-- Creating Table -->
        <table id="mafsTable">
<!-- These are list columns that we are gonna use for the table -->
            <tr>
                <th> First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Pass Word </th>
                <th> Email-Address</th>
                <th> Position </th>
            </tr>

 <!-- store all the data of 'member' table in array called $row and using while Loop condition until it contain value -->
        <?php  while ($row = mysqli_fetch_array($result)): ?>

 <!-- For each loop, It display a row with First Name, Last Name , UserName, Password , E-Mail and Postion-->
        <tr>
            <td><?php echo $row['First Name']; ?></td>
            <td><?php echo $row['Last Name']; ?></td>
            <td><?php echo $row['UserName']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php echo $row['E-Mail']; ?></td>
            <td><?php echo $row['Position']; ?> </td>
        </tr>
           <!-- closing while condition -->
        <?php endwhile; ?>
        </table>
    </div>
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
  </div>



</html>

<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>