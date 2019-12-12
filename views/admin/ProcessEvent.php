<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    
    // temporarily storing data
    session_start();

    // creating varibale
    $id ="";
    $date = " ";
    $eventName = " ";
    $eventDetails = " ";
    $update = false;

    // check if idEvent is empty or not
    if(isset($_GET['idEvent'])){

        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['idEvent'];
        $eventName = $_GET['EventName'];
        $date = $_GET['date'];

        // delete event from events table of eventID passes using GET method
        $deleteReport = "DELETE FROM `events` WHERE `ID` = $id ";

        $result = mysqli_query($con,$deleteReport);

        // check if above query has any problem execting 
        if ($result){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messageEvent'] = "$eventName held at $date is deleted";
            $_SESSION['msg_type'] = "danger";     
        }
        else{
             // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messageEvent'] = "Could not delete";
            $_SESSION['msg_type']= "warning";           
        }

        //render page to EventPost.php
        header('location: EventPost.php');
    } 

    // check if Post is empty or not
    if(isset($_POST['Post'])){

        // Store all the information which was send using POST method to store in created variable 
        $date = $_POST['Dates'];
        $eventName = $_POST['eventName'];
        $eventDetails = $_POST['details'];

         // insert data to Event Table
        $queryInsert = "INSERT INTO `events`(`Date`, `EventName`, `EventDetails`) VALUES ('$date','$eventName','$eventDetails')";
        $resultInsert = mysqli_query($con,$queryInsert);

        // check if above query has any problem execting 
        if ($resultInsert){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messageEvent'] = "$eventName has been posted";
            $_SESSION['msg_type']= "success";
        }
        else {
              // Store messageEvent and msg_type with unsuccessfull messag
           $_SESSION['messageEvent']= "$eventName could not posted";
           $_SESSION['msg_type']= "warning";
        }
          //render page to EventPost.php
        header('location: EventPost.php');
    }

    // check if editIt is empty or not
    if (isset($_GET['editId'])){
        
        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['editId'];
        $update= true;

        // select an event of an $id 
        $queryEdit = "SELECT  * FROM `events` WHERE `ID` = $id ";
        $resultEdit = mysqli_query($con,$queryEdit);

        // check if above query has any problem execting 
        if($resultEdit){
            // Store above information from resultEdit to $row variable
            $row = mysqli_fetch_array($resultEdit);

            // store all the data in created variable
            $date = $row['Date'];
            $eventName = $row['EventName'];
            $eventDetails = $row['EventDetails'];
        }
        else{
            echo "Could not edit";
        }
}

   // check if update is empty or not
    if (isset($_POST['update'])){

         // Store all the information which was send using POST method to store in created variable 
        $id = $_POST['id'];
        $date = $_POST['Dates'];
        $eventName = $_POST['eventName'];
        $eventDetails = $_POST['details'];

        // update the event table of $id with above information
        $queryUpdate= "UPDATE `events` SET `Date`= '$date',`EventName`= '$eventName',`EventDetails`= '$eventDetails' WHERE `ID` = $id ";
        $resultUpdate = mysqli_query($con,$queryUpdate);

         // check if above query has any problem execting 
        if($resultUpdate){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messageEvent'] = "$eventName has been updated";
            $_SESSION['msg_type']="info";
        }
        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messageEvent'] = "$eventName could not be updated";
            $_SESSION['msg_type'] = "warning";
        }
          //render page to EventPost.php
        header('location: EventPost.php');
}

    // check if next is empty or not
    if (isset($_POST['next'])){
        // store id which was send using POST method
        $id = $_POST['id'];
        $id = $id + 1;

        if ( ($id < 5 && $id > 1) ){
            $next = true;
            $previous = true; 
        }
        else if ($id == 5){
            $next = false;
            $previous = true;
        }

        // render to viewReport.php and sending ID and $next and $previous using GET method
        header("location: viewReport.php?ID={$id}&Next={$next}&Previous={$previous}");
    }


      // check if previous is empty or not
    if (isset($_POST['previous'])){
        // store id which was send using POST method
        $id = $_POST['id'];
        $id = $id - 1;

        if ( ($id < 5 && $id > 1) ){
            $next = true;
            $previous = true; 
        }
        else if ($id == 1){
            $next = true;
            $previous = false;
        }
         // render to viewReport.php and sending ID and $next and $previous using GET method
        header("location: viewReport.php?ID={$id}&Next={$next}&Previous={$previous}");
    }

// check if idEvent is empty or not
if(isset($_GET['id'])){

  // Store all the information which was send using GET method to store in created variable 
  $id = $_GET['id'];
  $name = $_GET['Name'];
  $fileName = $_GET['file'];

  // delete event from PastEmployee table of eventID passes using GET method
  $deleteReport = "DELETE FROM `mafsfile` WHERE `id` = $id ";

  $result = mysqli_query($con,$deleteReport);

  // check if above query has any problem execting 
  if ($result){
        // Store messageEvent and msg_type with successfull message
        $_SESSION['mafsMsg'] ="$fileName of $name has been deleted";
        $_SESSION['msg_type'] = "success";
    }   
    else{
         // Store messageEvent and msg_type with unsuccessfull message
        $_SESSION['mafsMsg'] ="Could not delete Minute and Agenda of $fileName";
        $_SESSION['msg_type'] = "warning";          
  }

  header('location: viewMafsReport.php');
}
  
?>