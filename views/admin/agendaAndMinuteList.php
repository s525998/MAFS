<?php
    // needed for connection of database which is contain in sql.php
    include_once('processAgendaAndMinute.php');

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){


    // include headerMember that contain header part of html 
    include("../Templates/headerAdmin.html");

    //temporarily storing data
    session_start();

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
    $total_pages_sql = "SELECT COUNT(*)FROM `meetingagendaminute`";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

  
    /* This query is selecting all data from table 'meeting_report' which is order by ID(report-id) in descending order */
    $queryList ="SELECT * FROM `meetingagendaminute` ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";

    // run the above query
    $resultList = mysqli_query($con,$queryList);  

?>
<div class = "container-fluid">
<?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['messageAgeMinList'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['messageAgeMinListt']; 
        unset ($_SESSION['messageAgeMinList']); ?>
</div>
<?php endif?>
 
<div class= "row">
        <div class="col-sm-3 col-md-2"></div>
        <div class="col-sm-9 col-md-9"> 
                 <!-- table created -->
            <table id="mafsTable">

            <!-- first row of the table -->
            <thead>
                <th height="50" > Event Name </th>
                <th> Date </th>
                <th> Agenda</th>
                <th> Minute </th>
                <th> Action </th>
            </thead>

            <!-- store all the data of events table in array called $row and using while Loop condition until it contain value -->
            <?php  while($row = mysqli_fetch_array($resultList)): ?>
            
            <tr>
            <!-- Displaying Date, EventName and EventDetails in each row from 'report' table -->
            <td height="100" width="100"><?php echo $row['EventName']; ?></td>
            <td  height="100" ><?php echo $row['EventDate']; ?></td>
            <td  height="100"><?php echo $row['MeetingAgenda']; ?></td>
            <td  height="100" width="80"><?php echo $row['MeetingMinute']; ?></td>

            <!-- this column display edit and delete option -->
            <td  height="50" width="150"> 

            <!-- passing event id to EventPost.php using GET method for Edit Option -->
            <a href="agendaAndMinute.php?editId=<?php echo $row['ID'];?>" class="btn btn-info" id="btn"> Edit </a>

            <!-- Passing event id, date and eventName to ProcessEvent.php using GET method for delete option -->
            <a href="processAgendaAndMinute.php?idList=<?php echo $row['ID'];?>&Name=<?php echo $row['EventName'];?>" class="btn btn-danger" id="btn"> Delete </a>
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
</div
<?php
 /* If user is not logged and some visit this page then it redirect to login.php */
    }else{
    header('location: ../login.php'); 
}?>
