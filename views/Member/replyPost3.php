<?php
    // needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){

    // including member header from Templates Folder
    include("../Templates/headerMember.html");

    // storing Session data set from another page 
    $memberId = $_SESSION['id'];

    // Storing data from the GET request 
    $topic_id = $_GET['reply2_Id'];

    $_SESSION['reply2_Id']= $topic_id;


 
    // query to select all field from table 'member' and 'replypost2' under given condition
    $queryPost ="SELECT * FROM `replypost2`, `member` WHERE $topic_id = replypost2.reply2_id AND replypost2.reply2_by = member.ID";
    $resultPost = mysqli_query($con,$queryPost);
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

    // this query will display total record in given table under given condition
    $total_pages_sql = "SELECT COUNT(*) FROM `replypost3` WHERE $topic_id = replypost3.topic_id ";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    // query to select all field from table 'member' and 'replypost3' under given condition
    $queryReplyPost = "SELECT * FROM `member`,`replypost3` WHERE $topic_id = replypost3.topic_id AND replypost3.reply3_by = member.ID ORDER BY replypost3.reply3_id DESC LIMIT $offset, $no_of_records_per_page";

    // excuting query and storing it in $result
    $resultReply1= mysqli_query($con,$queryReplyPost);
?>


<div class="container-fluid">
    <div class= "row">
        <div class="col-sm-3 col-md-2"></div>

        <div class="col-sm-9 col-md-10"> 

        <table style="margin: auto;">

                    <!--  Table Header -->
            <tr>
                <th height="40" width="60"> Replied By </th>
                <th width="200"> Discussion Forum</th>
                <th width="60">  Date</th>
            </tr>

<!-- creating a array 'rowPost' that contain all the data from query associate with '$resultPost' -->
            <?php $rowPost = mysqli_fetch_array($resultPost)?>

<!-- Creating another table header that will provide infromation such as:
     Member who posted it and what date S/He submitted it, 'replypost2' content by the member-->
            <tr>
                <th height="40"> <?php echo $rowPost['First Name'];?> </th> 
                <th> <?php echo $rowPost['reply2_content']; ?></th>
                <th>  <?php $date = date_create($rowPost['reply2_date']);
                 echo date_format($date, "M d, Y");?></th>
            </tr>
        
    <!-- storing data from query associate with '$resultReply1' to an array $rowReply  -->
            <?php while($rowReply = mysqli_fetch_array($resultReply1)):?>

 <!-- Each row represent the member reply on the replyPost2 content, name of member who have posted it and their submission date  -->
            <tr>
                <td height="50"> <?php echo $rowReply['First Name'] ?>
                <td max-height="60"> <?php echo $rowReply['reply3_content']; ?> </td>
                <td> <?php $date = date_create($rowReply['reply3_date']);
                 echo date_format($date, "M d, Y");?> </td>
            </tr>

        <!-- Closing while loop for $rowReply -->
            <?php endwhile ?>
         </table>

    </div>
<div class = "row">
    <div class="col-sm-4 col-md-4"> </div>
    <div class="col-sm-6 col-md-6"> 
    <ul class="pagination">
        <li><a href="?reply2_Id=<?php echo $topic_id ;?>&pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo "?reply2_Id=".($topic_id)."&pageno=1"; } else { echo "?reply2_Id=".($topic_id)."&pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo "?reply2_Id=".($topic_id)."&pageno=".($total_pages); } else { echo "?reply2_Id=".($topic_id)."&pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?reply2_Id=<?php echo $topic_id;?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul> 
    </div>
</div>

</div> <br> <br>


<div class="post-div">
<!-- Form  contain textarea to reply on replyPost2 content -->
    <form action="ProcessMember.php" method="POST">
        <label style="font-size: 15px;"> Reply </label>

    <!-- Textarea field to reply the above content -->
        <div class="form-group">
                <textarea rows="6" cols="80" name="replyPostIt3"></textarea> 
        </div>

        <Button type="submit" class="btn btn-info" value="post" name="reply3">Post</Button>
 
 <!-- This link will take you to viewTopic.php page which contain list of topic  -->        
        <a href="viewTopics.php" style="float:right"> Topic Page</a>
    </form>

</div>
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>