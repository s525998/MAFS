<?php

// needed for connection of database which is contain in sql.php
include('../admin/sql.php');

// to store data temporarily
session_start();

// setting time zone to store date in database
date_default_timezone_set("America/Chicago"); 

 // check if button with id 'replyPost' is clicked or not
if (isset($_POST['replyPost'])){
    // store current date in $dates variable
    $dates =  date('y-m-d');

    // storing Session data set from another page to store in table
    $topic = $_SESSION['topic_id'];
    $postBy = $_SESSION['id'];

    // store content into the $postContent variable
    $postContent= $_POST['reply'];

    // query to insert all the above variable inside 'post' table
    $queryPost = "INSERT INTO `post`(`post_date`, `post_content`, `post_by`, `post_topic`) VALUES ('$dates','$postContent','$postBy','$topic')";
    $resultPost = mysqli_query($con, $queryPost);
   
    // check if above query can be executed or not
    if ($resultPost){
        // render to page reply.php where it send Get data called postReply = 1
        header('Location: reply.php?postReply=1');
        exit();
    }
}


 // check if button with id 'replyIt' is clicked or not
if (isset($_POST['replyIt'])){
    // store current date in $dateReply variable
    $dateReply =  date('y-m-d');

    // storing Session data set from another page to store in table
    $replyPost = $_SESSION['post_id'];
    $replyBy = $_SESSION['id'];

     // store content into the $replyContent variable
    $replyContent = $_POST['replyPostIt'];

      // query to insert all the above variable inside 'replypost1' table
    $queryPostReply= "INSERT INTO `replypost1`(`reply_post`, `reply_content`, `reply_by`,`reply_date`) VALUES ('$replyPost','$replyContent','$replyBy','$dateReply')";
    $resultPostReply = mysqli_query($con, $queryPostReply);

     // check if above query can be executed or not
    if($resultPostReply){
         // render to page reply.php where it send Get data called postReply = 2
        header('Location: reply.php?postReply=2');
        exit();
    }
}

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

// check if button with id 'reply3' is clicked or not
if (isset($_POST['reply3'])){
     // store current date in $dateReply2 variable
    $dateReply3 =  date('y-m-d');

    // storing Session data set from another page to store in table
    $replyPost3 = $_SESSION['reply2_Id'];
    $replyBy3 = $_SESSION['id'];

     // store content into the $replyContent3 variable
    $replyContent3 = $_POST['replyPostIt3'];
   
    // query to insert all the above variable inside 'replypost3' table
    $queryPostReply3 = "INSERT INTO `replypost3`(`reply3_content`, `reply3_by`, `reply3_date`, `topic_id`) VALUES  ('$replyContent3','$replyBy3','$dateReply3',' $replyPost3')";
    $resultPostReply3 = mysqli_query($con, $queryPostReply3);

    // check if above query can be executed or not
    if($resultPostReply3){
        // render to page reply.php where it send Get data called postReply = 5
        header('Location: reply.php?postReply=5');
        exit();
    }
}

// check if button with id 'Submit' is clicked or not
if (isset($_POST['Submit'])){
     // store current date in $dates variable
    $dates =  date('y-m-d');

     // storing Session data set from another page to store in table
    $memberID = $_SESSION['id'];

    // for loop an array with id 'mafsAction' where you store it as key value pair 'ID' and 'mafsReport'
    foreach ($_POST['mafsAction'] as $ID => $mafsReport){
        $insertReport= "INSERT INTO `mafs_report`( `Report`, `report_by`, `mafs_id`, `submitDate`) VALUES ('$mafsReport','$memberID','$ID','$dates')";
        $resultInsert = mysqli_query($con,$insertReport);
    }
    
    // check if above query is executing or not
    if($resultInsert){
        //render to page reply.php where it send Get data called postReply = 3
        header('Location: reply.php?postReply=3');
        exit();
    }
    
} 
    ?>