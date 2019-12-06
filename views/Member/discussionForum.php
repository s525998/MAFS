<?php
// needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){


// include headerMember that contain header part of html 
    include("../Templates/headerMember.html");

// Storing `topic_id` value store from GET request in variable 'id' 
    $id = $_GET['topic_Id'];

// select all from 'topic', 'post' and 'member' table for given criteria 
   

?>
<?php
    // The following condition met if there is GET request
    if (isset($_GET['topic_Id'])){
        
    // Storing `topic_id` value store from GET request in variable 'id' 
        $id = $_GET['topic_Id'];

     // select all from 'topic' and 'member' table for given criteria 
        $queryTopic = "SELECT * from `topic`,`member` WHERE  $id = topic.topic_id AND topic.topic_by = member.ID ";
        $resultTopic= mysqli_query($con,$queryTopic);

     /* storing data from query associate with '$resultTopic' to an array $rowTopic */
        $rowTopic = mysqli_fetch_array($resultTopic);

        // create a session with key 'topic_id' where you store topic_id from array '$rowTopic'
        $_SESSION['topic_id'] = $rowTopic['topic_id'];    }
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
    $total_pages_sql = "SELECT COUNT(*) FROM `post` WHERE $id = post.post_topic ";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    // it will have all the user that have posted the topic subject
    $queryView = "SELECT * FROM `topic`, `post`, `member` WHERE  $id = topic.topic_id AND $id = post.post_topic AND post.post_by = member.ID ORDER BY post.post_id DESC LIMIT $offset, $no_of_records_per_page";

     // excuting query and storing it in $result
     $resultView= mysqli_query($con,$queryView);

?>
<div class="container-fluid">

<div class= "row">
        <div class="col-sm-3 col-md-2"></div>
        <div class="col-sm-9 col-md-10"> 

        <!-- Creating table -->
        <table style = "margin:auto;">
        
        <!-- Creating table title with 'topic subject' -->
        <tr>
            <th colspan = "3"> <h4> Topic : <?php echo $rowTopic['topic_subject'];?></h4></th>
        </tr>

        <!-- Creating table columns header-->
        <tr>
           <th height="35" width="50"> Posted By </th>
           <th height="35" width="210"> Discussion </th>
           <th height="35" width="30"> Reply </th>
        </tr>

    <!-- Creating another table header that will provide infromation such as:
        Member who posted it and what date S/He sumbmitted it, Topic content by the member-->
        <tr>
            <th height="90"> <?php echo $rowTopic['First Name'];?> <br> 
            <?php $date = date_create($rowTopic['topic_date']);
                 echo date_format($date, "M d, Y"); ?></th>
            <th height ="90"> <?php echo $rowTopic['topic_message'];?> </th>
            <th> Reply Below</th>
        </tr>
       
        <!-- storing data from query associate with '$resultView' to an array $row  -->
        <?php while( $row = mysqli_fetch_array($resultView)): ?>

        <!-- Each row represent the member reply on the topic content, name of member who have posted it and their submission date  -->
        <tr> 
            <td height = "90" > <?php echo  $row['First Name']?> <br> <?php $date = date_create($row['post_date']);
                 echo date_format($date, "M d, Y"); ?> </td>
            <td class="replyTd" height = "90" max-width="250"> <p class="content"> <?php echo $row['post_content']?> </p>

            <?php 
                // query to select all field from table 'member' and 'replypost1' under given condition
                $queryReplyPost = "SELECT * FROM `replypost1` WHERE '".$row['post_id']."' = replypost1.reply_post";
                $resultReply1= mysqli_query($con,$queryReplyPost);  // executing above query 
            ?>
        
                <div style="padding-left: 10px;">
                <!-- These are the replies for each post
                Not to make confuse these are replies of the member replies on the topic content -->
                    <p class="reply"> Replies : </p> <br> <br>
                    <ul> 

                <!-- storing data from query associate with '$resultReply1' to an array $row  -->
                    <?php while($rowReply = mysqli_fetch_array($resultReply1)):?>

                        <!-- Each replies are displayed in the list. So that you can distinguish replies  -->
                        <li style="font-size: 13px;" > <?php echo $rowReply['reply_content'];?></li> 

                    <!-- Closing while loop of $rowReply -->
                    <?php endwhile ?>
                    </ul>  
                </div> 
            </td> 

    <!-- When member click on reply it will take you to another page 'replyPost.php' sending GET request 'post_id' -->
            <td> <a href="replyPost.php?post_Id=<?php echo $row['post_id']?>"> Reply </a> </td>
        </tr>

        <!-- Closing while loop of $row -->
        <?php endwhile ?>
    </table>
        </div>
    </div>
    <!-- ?topic_Id=".($id)."pageno=1" -->
  
    <div class = "row">
    <div class="col-sm-4 col-md-4"> </div>
    <div class="col-sm-6 col-md-6"> 
    <ul class="pagination">
        <li><a href="?topic_Id=<?php echo $id;?>&pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo "?topic_Id=".($id)."&pageno=1"; } else { echo "?topic_Id=".($id)."&pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo "?topic_Id=".($id)."&pageno=".($total_pages); } else { echo "?topic_Id=".($id)."&pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?topic_Id=<?php echo $id; ?>&pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul> 
    </div>
</div>
    <div class="post-div">
 <!-- Form  contain textarea to reply on topic content -->
    <form action="ProcessMember.php" method="POST">
        <label style="font-size: 20px;"> Reply </label>

        <!-- Textarea field to reply the above content -->
        <div class="form-group">
                <textarea rows="6" cols="80" name="reply"></textarea> 
        </div>
        
        <Button type="submit" class="btn btn-info" value="post" name="replyPost">Post</Button>

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
