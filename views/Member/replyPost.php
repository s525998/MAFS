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
    $post_id = $_GET['post_Id'];

    // creating Session variable to store $post_id
    $_SESSION['post_id']= $post_id;

    // query to select all field from table 'member' and 'post' under given condition
    $queryPost ="SELECT * FROM `post`, `member` WHERE $post_id = post.post_id AND post.post_by = member.ID";
    $resultPost = mysqli_query($con,$queryPost);  // execting above query  
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
    $total_pages_sql = "SELECT COUNT(*) FROM `replypost1` WHERE $post_id = replypost1.reply_post ";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    // it will have all the user that have posted the topic subject
    $sql =  "SELECT * FROM `member`,`replypost1` WHERE $post_id = replypost1.reply_post AND replypost1.reply_by = member.ID ORDER BY replypost1.reply_id DESC LIMIT $offset, $no_of_records_per_page";

     // excuting query and storing it in $result
    $resultReply1 = mysqli_query($con,$sql);

?>

<div class="container-fluid">
    <div class= "row">

        <div class="col-sm-3 col-md-2"></div>

        <div class="col-sm-9 col-md-10">

        <table style="margin: auto;">
            <tr>
                     <!-- table header -->
                <th height="20" width="60"> Replied By </th>
                <th width="250"> Discussion Forum</th>
                <th width="10">  Reply</th>
            </tr>
<!-- creating a array 'rowPost' that contain all the data from query '$queryPost' -->
            <?php $rowPost = mysqli_fetch_array($resultPost)?>

<!-- Creating another table header that will provide infromation such as:
        Member who posted it and what date S/He sumbmitted it, post content by the member-->
            <tr>
                <th height="40"> <?php echo $rowPost['First Name'];?> <br>
                <?php $date = date_create($rowPost['post_date']);
                 echo date_format($date, "M d, Y"); ?></th> 
                <th><?php echo $rowPost['post_content']; ?> </th>
                <th> Reply Below</th>
            </tr>

    <!-- storing data from query associate with '$resultReply1' to an array $rowReply  -->
            <?php while($rowReply = mysqli_fetch_array($resultReply1)):?>

    <!-- Each row represent the member reply on the post content, name of member who have posted it and their submission date  -->
            <tr>
                <td height="50"> <?php echo $rowReply['First Name'] ?> <br>
                <?php $date = date_create($rowReply['reply_date']);
                 echo date_format($date, "M d, Y"); ?> </td>
                <td class="replyTd" height = "90" max-width="250">  <p class="content">  <?php echo $rowReply['reply_content']; ?> </p>

                <?php 
                   // query to select all field from table 'replyPost2' under given condition
                    $queryReply1 = "SELECT * FROM `replypost2` WHERE '".$rowReply['reply_id']."' = replypost2.topic_id ";
                    $resultReply2 = mysqli_query($con,$queryReply1); // execting above query 
                ?>
                    <div style="padding-left: 10px;">
                        <!-- These are the replies for each post
                        Not to make confuse these are replies of the member replies on the post content -->
                        <p class="reply"> Replies : </p> <br> <br>
                            <ul> 

                    <!-- storing data from query associate with '$resultReply2' to an array $rowReply1 -->
                            <?php while($rowReply1 = mysqli_fetch_array($resultReply2)):?>
                            
                            <!-- Each replies are displayed in the list. So that you can distinguish replies  -->
                                <li style="font-size: 13px;" > <?php echo $rowReply1['reply2_content'];?></li> 

                            <!-- Closing while loop of $rowReply1 -->
                            <?php endwhile ?>
                            </ul> 
                        </div> 
                    </td> 

     <!-- When member click on reply it will take you to another page 'replyPost2.php' sending GET request 'reply_id' -->
            <td> <a href="replyPost2.php?reply1_Id=<?php echo $rowReply['reply_id'];?>">Reply</a></td>
        </tr>

     <!-- Closing while loop of $rowReply-->
        <?php endwhile ?>
    </table>
</div>
<div class = "row">
    <div class="col-sm-4 col-md-4"> </div>
    <div class="col-sm-6 col-md-6"> 
    <ul class="pagination">
        <li><a href="?post_Id=<?php echo $post_id ;?>&pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo "?post_Id=".($post_id)."&pageno=1"; } else { echo "?post_Id=".($post_id)."&pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo "?post_Id=".($post_id)."&pageno=".($total_pages); } else { echo "?post_Id=".($post_id)."&pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?post_Id=<?php echo $post_id;?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul> 
    </div>
</div>
<br> 

    <div class="post-div">
 <!-- Form  contain textarea to reply on post content -->
        <form action="ProcessMember.php" method="POST">

            <label style="font-size: 15px;"> Reply </label>

        <!-- Textarea field to reply the above content -->
            <div class="form-group">
                    <textarea rows="6" cols="80" name="replyPostIt"></textarea> 
            </div>
            
             <Button type="submit" class="btn btn-info" value="post" name="replyIt">Post</Button>

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