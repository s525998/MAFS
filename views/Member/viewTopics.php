<?php
    // connecting to database contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){
    
    // include headerMember that contain header part of html 
    include("../Templates/headerMember.html");


    $search = FALSE;  
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
    $total_pages_sql = "SELECT COUNT(*)FROM `topic`";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    // it will have all the user that have posted the topic subject
    $sql =  "SELECT * FROM `topic`,`member` WHERE topic.topic_by = member.ID ORDER BY topic.topic_id DESC LIMIT $offset, $no_of_records_per_page";

     // excuting query and storing it in $result
    $res_data = mysqli_query($con,$sql);

?>


<!-- check if search text field is written -->
<?php if (isset($_GET['search'])){  
    $searchValue= $_GET['search'];

    // query to search topic subject and showing only person who posted topic 
    $querySearch = "SELECT * FROM `topic`, `member` WHERE topic.topic_by = member.ID AND topic.topic_subject LIKE '$searchValue%' "; 

    // executing above query and storing it in resultSearch
    $resultSearch = mysqli_query($con,$querySearch);
    $search = true; } 
?>

<div class="container-fluid">
    <div class= "row">
        <div class="col-sm-4 col-md-2"></div>
        
        <div class="col-sm-8 col-md-8">
        <br>
        <!-- The form -->
        <form class="example" action="viewTopics.php" style="margin:auto;max-width:300px">
            <input type="text" placeholder="Search by Topic.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <br>
        <br>

        <!-- table created to display posted subject and by whom -->
        <table class="Border" style="margin: auto;">
            <tr>
                    <th> Posted By </th>
                    <th height="50"> Topic Subject</th>
                    <th height = "50"> Topic Created </th>
            </tr>

            <!-- check weather search field is typed or not -->
            <?php if ($search){?>

            <!-- row will contain all the value in resultsearch in an array -->
            <?php while($row = mysqli_fetch_array($res_data)) : ?>
            <tr>
                <!-- display name of user who posted with Topic subject and which date they posted on -->
                <th height="100" width="100"> <?php echo $row['First Name']; ?> </th>

                <!-- Topic subject is link to discussionForum.php and it passses topic_Id  -->
                <th height="100" width="100"> <a href ="discussionForum.php?topic_Id=<?php echo $row['topic_id'];?>" target="_blank"><?php echo $row['topic_subject']; ?> </a></th>

                <th height="100" width="100"> <?php $date = date_create($row['topic_date']); 
                echo date_format($date, "M d, Y"); ?> </th>
            </tr>
            <!-- Closing while loop of $row -->
            <?php endwhile?>

            <?php } else{?>
            <!-- At beginning search is false so it will display all the topic subject and those who posted it -->

            <!-- row will contain entire topic subject and name of user who have posted it -->
            <?php while($row = mysqli_fetch_array($res_data)) : ?>
            <tr>
                <!-- display name of user who posted with Topic subject and which date they posted on -->
                <td height="100" width="100"> <?php echo $row['First Name']; ?> </td>

                <!-- Topic subject is link to discussionForum.php and it passses topic_Id  -->
                <td height="100" width="100"> <a href ="discussionForum.php?topic_Id=<?php echo $row['topic_id'];?>" ><?php echo $row['topic_subject']; ?> </a></td>
                
                <td height="100" width="100">  <?php $date = date_create($row['topic_date']); 
                echo date_format($date, "M d, Y"); ?> </td>
            </tr>
            <!-- Closing while loop of $row -->
            <?php endwhile ?>
            <?php }?>
        </table>


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

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>


