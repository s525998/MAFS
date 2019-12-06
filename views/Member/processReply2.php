<?php

// needed for connection of database which is contain in sql.php
include('../admin/sql.php');

// to store data temporarily
session_start();

// setting time zone to store date in database
date_default_timezone_set("America/Chicago"); 

// check if button with id 'reply2' is clicked or not
if (isset($_POST['reply2'])){
    // store current date in $dateReply2 variable
   $dateReply2 =  date('y-m-d');

   // storing Session data set from another page to store in table
   $replyPost2 = $_SESSION['reply1_Id'];
   $replyBy2 = $_SESSION['id'];

   // store content into the $replyContent2 variable
   $replyContent2 = $_POST['replyPostIt2'];

   // query to insert all the above variable inside 'replypost2' table
   $queryPostReply2= "INSERT INTO `replypost2`(`reply2_content`, `reply2_by`, `reply2_date`, `topic_id`) VALUES ('$replyContent2','$replyBy2','$dateReply2',' $replyPost2')";
   $resultPostReply2 = mysqli_query($con, $queryPostReply2);
      
     // check if above query can be executed or not
   if($resultPostReply2){
       // render to page reply.php where it send Get data called postReply = 4
       header('Location: reply.php?postReply=4');
       exit();
   }
   else{
       echo "hello";
   }
}

?>