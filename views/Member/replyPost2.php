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
    $topic_id = $_GET['reply1_Id'];

    $_SESSION['reply1_Id']= $topic_id;
    // query to select all field from table 'member' and 'replypost1' under given condition
    $queryPost ="SELECT * FROM `replypost1`, `member` WHERE $topic_id = replypost1.reply_id AND replypost1.reply_by = member.ID";
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
    $total_pages_sql = "SELECT COUNT(*) FROM `replypost2` WHERE $topic_id = replypost2.topic_id ";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    // query to select all field from table 'member' and 'replypost2' under given condition
    $queryReplyPost = "SELECT * FROM `member`,`replypost2` WHERE $topic_id = replypost2.topic_id AND replypost2.reply2_by = member.ID ORDER BY replypost2.reply2_id DESC LIMIT $offset, $no_of_records_per_page";

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
                <th width="60">  Reply</th>
            </tr>

<!-- creating a array 'rowPost' that contain all the data from query associate with '$resultPost' -->
            <?php $rowPost = mysqli_fetch_array($resultPost)?>

 <!-- Creating another table header that will provide infromation such as:
        Member who posted it and what date S/He submitted it, 'replypost1' content by the member-->
            <tr>
                <th height="40"> <?php echo $rowPost['First Name'];?> <br>
                <?php $date = date_create($rowPost['reply_date']);
                 echo date_format($date, "M d, Y");?> </th> 
                <th> <?php echo $rowPost['reply_content']; ?></th>
                <th> Reply Below</th>
            </tr>

    <!-- storing data from query associate with '$resultReply1' to an array $rowReply  -->
            <?php while($rowReply = mysqli_fetch_array($resultReply1)):?>

    <!-- Each row represent the member reply on the replyPost1 content, name of member who have posted it and their submission date  -->
            <tr>
                <td height="50"> <?php echo $rowReply['First Name'] ?> <br>
                <?php $date = date_create($rowReply['reply2_date']);
                 echo date_format($date, "M d, Y"); ?> </td>

                <td class="replyTd" height = "90" max-width="250">  <p class="content"> <?php echo $rowReply['reply2_content']; ?> </p> 

                <?php  
            //  query to select all field from table 'replypost3' under given condition
                    $queryReplyPost2 = "SELECT * FROM `replypost3` WHERE '".$rowReply['reply2_id']."' = replypost3.topic_id ";
                     $resultReply2= mysqli_query($con,$queryReplyPost2); // executing above query
                ?>

                <div style="padding-left: 10px;">
             <!-- These are the replies for each post
                Not to make confuse these are replies of the member replies on the 'replyPost1' content -->
                    <p class="reply"> Replies : </p> <br> <br>
                         <ul> 

                 <!-- storing data from query associate with '$resultReply2' to an array $rowReply1 -->
                          <?php while($rowReply2 = mysqli_fetch_array($resultReply2)):?>
                            <li style="font-size: 13px;" > <?php echo $rowReply2['reply3_content'];?></li> 

                     <!-- Closing while loop condition for $rowReply2 -->
                           <?php endwhile ?>
                        </ul>  
                    </div> 
            
            </td>
        
 <!-- When member click on reply it will take you to another page 'replyPost3.php' sending GET request 'reply2_id' -->
            <td> <a href="replyPost3.php?reply2_Id=<?php echo $rowReply['reply2_id'];?>"> Reply</a> </td>
            </tr>

    <!-- Closing while loop of $rowReply-->
            <?php endwhile ?>   
        </table>
        </div>

<div class = "row">
    <div class="col-sm-4 col-md-4"> </div>
    <div class="col-sm-6 col-md-6"> 
    <ul class="pagination">
        <li><a href="?reply1_Id=<?php echo $topic_id ;?>&pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo "?reply1_Id=".($topic_id)."&pageno=1"; } else { echo "?reply1_Id=".($topic_id)."&pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo "?reply1_Id=".($topic_id)."&pageno=".($total_pages); } else { echo "?reply1_Id=".($topic_id)."&pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?reply1_Id=<?php echo $topic_id;?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul> 
    </div>
</div>
  <br><br>


<div class="post-div">
<!-- Form  contain textarea to reply on replyPost1 content -->
    <form action="ProcessMember.php" method="POST">
        <label style="font-size: 15px;"> Reply </label>

        <!-- Textarea field to reply the above content -->
        <div class="form-group">
                <textarea rows="6" cols="80" name="replyPostIt2"></textarea> 
        </div>

        <Button type="submit" class="btn btn-info" value="post" name="reply2">Post</Button>

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