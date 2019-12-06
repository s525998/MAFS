<?php
    // needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){

    // include headerMember that contain header part of html 
    include("../Templates/headerMember.html");  ?>

<div class="container">

    <!-- check if postReply has value 1 -->
    <?php if ($_GET['postReply'] == '1'){ ?>

    <h4 style="text-align:center">

    <!--when above condition is met (click here to view) will link it to discussionforum.php where it passes value of topic_id -->
    Your reply is posted. <a href = "discussionForum.php?topic_Id=<?php echo ($_SESSION['topic_id']); ?>"> Click here to view </a> </h4> 
    <?php }?>

    <!-- check if postReply has value 2 -->
    <?php if ($_GET ['postReply'] == '2') {?>
        <h4 style="text-align:center">

         <!--when above condition is met (click here to view) will link it to replyPost.php where it passes value of post_id -->
    Your reply is posted. <a href = "replyPost.php?post_Id=<?php echo ($_SESSION['post_id']); ?>"> Click here to view </a> </h4> 
    
    <?php }?>

     <!-- check if postReply has value 4 -->
     <?php if ($_GET ['postReply'] == '4') {?>
        <h4 style="text-align:center">

         <!--when above condition is met (click here to view) will link it to replyPost.php where it passes value of post_id -->
    Your reply is posted. <a href = "replyPost2.php?reply1_Id=<?php echo $_SESSION['reply1_Id']; ?>"> Click here to view </a> </h4> 
    
    <?php }?>

      <!-- check if postReply has value 5 -->
      <?php if ($_GET ['postReply'] == '5') {?>
        <h4 style="text-align:center">

         <!--when above condition is met (click here to view) will link it to replyPost.php where it passes value of post_id -->
    Your reply is posted. <a href = "replyPost3.php?reply2_Id=<?php echo $_SESSION['reply2_Id']; ?>"> Click here to view </a> </h4> 
    
    <?php }?>

      <!-- check if postReply has value 3 -->
      <?php if ($_GET ['postReply'] == '3') {?>
        <h4 style="text-align:center">

         <!--when above condition is met (click here to view) will link it to replyPost.php where it passes value of post_id -->
    Your report is submitted.  Click here to go <a href = "reportList.php"> list </a> . </h4> 
    
    <?php }?>
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
