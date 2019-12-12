<?php
    // needed for connection of database which is contain in sql.php
    include_once('ProcessEvent.php');

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
    $no_of_records_per_page = 8;

    // used in Limit method in query
    $offset = ($pageno-1) * $no_of_records_per_page;

    // this query will display total record in given table
    $total_pages_sql = "SELECT COUNT(*)FROM `mafsfile`";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

  
    /* This query is selecting all data from table 'meeting_report' which is order by ID(report-id) in descending order */
    $queryReport ="SELECT * FROM `mafsfile` ORDER BY `id` DESC LIMIT $offset, $no_of_records_per_page";

    // run the above query 
    $resultReport = mysqli_query($con,$queryReport);   

?>
<?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['mafsMsg'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['mafsMsg']; 
        unset ($_SESSION['mafsMsg']); ?>
</div>
<?php endif?>
<div class = "row">
    <div class="col-sm-2 col-md-1"></div>
    <div class="col-sm-10 col-md-10">
        <!-- Creating Table -->
<table id="mafsTable">
<!-- These are list columns that we are gonna use for the table -->
    <thead>
    <tr>
        <th> Name</th>
        <th>University</th>
        <th>File </th>
        <th>Submitted On</th>
        <th> Action </th>

    </tr>
    </thead>
  <!-- store all the data of 'meeting_report' table in array called $row and using while Loop condition until it contain value -->
<?php  while ($row = mysqli_fetch_array($resultReport)): ?>
    <?php 
        // these variable store the file name and location of that file
        $file = $row['File'];
        if ($file == null){
            break;
        }
        $files_show= "../../uploadFile/mafsReports/$file"; ?>
    <tr>
    <!-- For each loop, It display a row with name, university, fileName, Note and submission date -->
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['University']; ?></td>

<!-- When user click the File Name it will link to file location which will download the file -->
        <td><a href="<?php echo $files_show;?>" target="_blank"><?php echo $row['File'];?> </a> </td>
        
        <!-- Format the date in Month Date, Year -->
        <td>  <?php $date = date_create($row['Date']);
            echo date_format($date, "M d, Y");?></td>
        <td>
            <a href="ProcessEvent.php?id=<?php echo $row['id'];?>&Name=<?php echo $row['Name'];?>&file=<?php echo $file?>" class="btn btn-danger" id="btn"> Delete </a>
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