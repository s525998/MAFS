<?php
    // needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){

    // include headerMember that contain header part of html 
    include("../Templates/headerMember.html");


    // create variable to store message and message type
    $msg = "";
    $msg_type = "";

    // setting time zone to store date in database
    date_default_timezone_set("America/Chicago");
    ?>

<!-- check if postTopic in the form is something beside null -->
<?php 
if(isset($_POST['postTopic'])){

    // currrent date 
    $dates =  date('y-m-d');

    // subject user wanted to created in form
    $topicSubject = $_POST['topicSubject'];

    // message or description of the topic subject
    $topicMessage = $_POST['topicMessage'];

    // topicBy store the user id to store in topic table
    $topicBy = $_SESSION['id'];

    // the query store all the info above in the topic table
    $query = "INSERT INTO `topic`(`topic_subject`, `topic_date`,`topic_message`, `topic_by`) VALUES ('$topicSubject','$dates','$topicMessage','$topicBy')";
    $result= mysqli_query($con,$query);
    
    // check if written query has no error
    if($result){
        // store message topic subject is posted and had no error
        $msg = "$topicSubject is posted";
        $msg_type = "Success";
    }
    else{
        //store message that topic subject is not posted and had some error
        $msg = "Some error in posting $topicSubject";
        $msg_type = "Danger";
        }
    } 

?>

<div class="container">

    <!-- Here it display message stored above -->
    <div class= "alert alert-<?php echo $msg_type; ?>" style="text-align:center">
        <h3>
    <?php 
        echo $msg; 
    ?>
    </h3>
    </div>

    <h1 class="form-heading">Create Topic</h1>


    <div class="main-div">
        <!-- form created with method post and action it to current page -->
        <form id="createTopic" action="createTopic.php" method="POST" >
        <label> Topic Subject </label>
        <div class="form-group">
            <!-- member write their Topic Subject -->
            <input type="text" name="topicSubject" class="form-control" id="inputTopicSubject" required>
        </div>

        <label> Topic Message </label>
        <div class="form-group">
        <!-- member write about their topic in description -->
        <textarea rows="6" cols="60" name="topicMessage"> </textarea> 

        </div>
        <!-- button will set postTopic true and above if condition where there is ISSEt will be executed -->
        <button type="submit" class="btn btn-primary" name="postTopic">Post</button>
    </form>
        </div>

    </div>
    
<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>