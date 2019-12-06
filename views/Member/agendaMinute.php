<?php
// needed for connection of database which is contain in sql.php
        include_once('../admin/sql.php');
        session_start();

/* To check if user logged in and visit this page */
        if (isset($_SESSION['isMember'])){

 // include headerMember that contain header part of html
        include("../Templates/headerMember.html");

       
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

  
// select data from the `meetingagendaminute` table from given criteria and order value by Date in descending order
    $query = "SELECT * FROM `meetingagendaminute` ORDER BY CONVERT(EventDate, DateTime) Desc LIMIT $offset, $no_of_records_per_page";

     // to run above query
     $result = mysqli_query($con,$query);

?>

<!-- check if search text field is written -->
<?php if (isset($_GET['search'])){  
        $searchValue= $_GET['search'];

        // query to search topic subject and showing only person who posted topic 
        $querySearch = "SELECT * FROM `meetingagendaminute` WHERE `EventName` LIKE '$searchValue%' "; 

        // executing above query and storing it in resultSearch
        $resultSearch = mysqli_query($con,$querySearch);
        $search = true;
    }
    ?>

<div class="container-fluid"> 
    <div class ="post-div"> 

    <div class="row">

 <!-- The form is only for the search text field where user want to search for specific EventName  -->
        <form class="example" action="agendaMinute.php" style="margin:auto;max-width:300px">
            <input type="text" placeholder="Search by Event.." name="search" >
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>

        <br>  <br>

            <div class="newsHeader"> Agenda And Minutes </div>

            <!-- check weather search field is typed or not -->
            <?php if ($search){?>

<!-- store all the data of obtain from query associate with '$resultSearch' in array called $row and using while Loop condition until it contain value -->
                <?php  while ($row = mysqli_fetch_array($resultSearch)): ?>

<!-- Creating variable to store fileName and location of Meeting Agenda and Minute -->
                <?php   $agenda = $row['MeetingAgenda'];
                        $minute = $row['MeetingMinute'];
                        $showAgenda= "../../uploadFile/Agenda/$agenda"; 
                        $showMinute= "../../uploadFile/Minutes/$minute"; ?>
        
<!-- Displaying EventName , Date in format (Month Day and Year) and link that allow member to download meeting agenda and minute  -->
                <div id="<?php echo $row['EventName']; ?>"> <p style="float:right; font-size:15px">Date:
                        <?php  $date = date_create($row['EventDate']);
                        echo date_format($date, "M d, Y"); ?> </p> <br>
                        <p style="font-Size:18px; text-align:center;">Events : <?php echo $row['EventName'];?> </p>
                <p  class="agenda"style="font-Size: 13.5px" > Agenda : <a href="<?php echo $showAgenda;?> " target = "_blank"><?php echo $agenda;?> </a> </p>
                <p  class="minute"style="font-Size: 13.5px" > Minutes : <a href="<?php echo $showMinute;?>" target = "_blank"><?php echo $minute;?> </a> </p>
                </div>

                <!-- Horizontal line border for each loop -->
                <hr style ="border: .5px solid">

                <!-- Closing while conditon -->
             <?php endwhile; ?>

 <!-- If member does not search any specific event then it will display all the details minute and agenda information  -->
            <?php } else{ ?> 


<!-- store all the data of obtain from query associate with '$result' in array called $row and using while Loop condition until it contain value -->
            <?php  while ($row = mysqli_fetch_array($result)): ?>

        <!-- Creating variable to store fileName and location of Meeting Agenda and Minute -->
                <?php   $agenda = $row['MeetingAgenda'];
                        $minute = $row['MeetingMinute'];
                        $showAgenda= "../../uploadFile/Agenda/$agenda"; 
                        $showMinute= "../../uploadFile/Minutes/$minute"; ?>

        <!-- Displaying EventName , Date in format (Month Day and Year) and link that allow member to download meeting agenda and minute  -->
                <div id="<?php echo $row['EventName']; ?>"> <p style="float:right; font-size:15px">Date:
                        <?php  $date = date_create($row['EventDate']);
                        echo date_format($date, "M d, Y"); ?> </p> <br>
                        <p style="font-Size:18px; text-align:center;">Events : <?php echo $row['EventName'];?> </p>
                <p  class="agenda"style="font-Size: 13.5px" > Agenda : <a href="<?php echo $showAgenda;?> " target = "_blank"><?php echo $agenda;?> </a> </p>
                <p  class="minute"style="font-Size: 13.5px" > Minutes : <a href="<?php echo $showMinute;?>" target = "_blank"><?php echo $minute;?> </a> </p>
                </div>

        <!-- Horizontal line border for each loop -->
                <hr style ="border: .5px solid">

                <!-- closing while condition -->
             <?php endwhile; ?>
            <?php } ?>
        </div>
     </div>

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
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>

