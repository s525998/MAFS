<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    
    // temporarily storing data
    session_start();

    // creating varibale
    $id ="";
    $eventName = " ";
    $dates= " ";
    $Agenda_name = " ";
    $Minute_name= " ";
    $note = " ";
    $update = false;

    /* Check if admin has clicked add button  */ 
    if (isset($_POST['Add'])){

        // Stroing all the information of FILES form field such as file name, current location of file and many more
        $Agenda_name = $_FILES['Agenda']['name'];
        $Agenda_tmp = $_FILES['Agenda']['tmp_name'];
        $Minute_name =  $_FILES['Minutes']['name'];
        $Minute_tmp = $_FILES['Minutes']['tmp_name'];
        $eventName = $_POST['eventName'];
        $dates =  $_POST['Dates'];
        $note = $_POST['note'];

        /* Checking if Agenda file and Minute file from their current location is moved to Folder we wanted  */
        if (move_uploaded_file($Agenda_tmp,"../../uploadFile/Agenda/".$Agenda_name) ) {
            if ( move_uploaded_file($Minute_tmp,"../../uploadFile/Minutes/".$Minute_name) ){

                /* If both file is moved in the folder we want then insert some of info in `meetingagendaminute` table */
                $insertReport= "INSERT INTO `meetingagendaminute`(`EventName`, `EventDate`, `MeetingAgenda`, `MeetingMinute`, `Note`) VALUES ('$eventName','$dates','$Agenda_name','$Minute_name','$note')";
                // running above query
                $queryInsert = mysqli_query($con,$insertReport); 
                
                //checking if above query is running or not 
                    if ($queryInsert){
                        // storing successful message to be displayed 
                        $_SESSION['messageAgeMin'] ="Minute and Agenda for $eventName has been added and posted";
                        $_SESSION['msg_type'] = "success";
                    }   
                    else{
                        // storing unsuccessful message to be displayed 
                        $_SESSION['messageAgeMin'] ="Could not post Minute and Agenda for $eventName";
                        $_SESSION['msg_type'] = "warning";
                    }    
                }
            }
            // render to this page 
            header('location: agendaAndMinute.php');   
        }

    // check if editIt is empty or not
  if (isset($_GET['editId'])){
        
    // Store all the information which was send using GET method to store in created variable 
    $id = $_GET['editId'];
    $update= true;

    // select an event of an $id 
    $queryEdit = "SELECT  * FROM `meetingagendaminute` WHERE `ID` = $id ";
    $resultEdit = mysqli_query($con,$queryEdit);

    // check if above query has any problem execting 
    if($resultEdit){
        // Store above information from resultEdit to $row variable
        $row = mysqli_fetch_array($resultEdit);

        // store all the data in created variable
        $eventName = $row['EventName'];
        $dates= $row['date'];
        $Agenda_name = $row['MeetingAgenda'];;
        $Minute_name= $row['MeetingMinute'];;
    }
    else{
        // Display unsuccessful msg 
        echo "Could not edit";
    }
}


// check if update is empty or not
if (isset($_POST['update'])){

/* Store all the information which was send using POST method
 Files properties to store file Name and file location of Agenda and Minutes */ 
    $id = $_POST['id'];
    $Agenda_name = $_FILES['Agenda']['name'];
    $Agenda_tmp = $_FILES['Agenda']['tmp_name'];
    $Minute_name =  $_FILES['Minutes']['name'];
    $Minute_tmp = $_FILES['Minutes']['tmp_name'];
    $eventName = $_POST['eventName'];
    $dates =  $_POST['Dates'];
    $note = $_POST['note'];

 /* Checking if Agenda file and Minute file from their current location is moved to Folder we wanted  */
    if (move_uploaded_file($Agenda_tmp,"../../uploadFile/Agenda/".$Agenda_name) ) {
        if ( move_uploaded_file($Minute_tmp,"../../uploadFile/Minutes/".$Minute_name) ){
      
            // update the event table of $id with above information
            $queryUpdate= "UPDATE `meetingagendaminute` SET `EventName`='$eventName',`EventDate`='$dates',`MeetingAgenda`='$Agenda_name',`MeetingMinute`='$Minute_name' WHERE `ID` = $id ";
             $resultUpdate = mysqli_query($con,$queryUpdate);  
             
            // check if above query has any problem execting              
                if ($resultUpdate){
                     // Store messageEvent and msg_type with successfull message
                    $_SESSION['messageAgeMin'] ="Minute and Agenda of $eventName has been updated and posted";
                    $_SESSION['msg_type'] = "success";
                }   
                else{
                     // Store messageEvent and msg_type with unsuccessfull message
                    $_SESSION['messageAgeMin'] ="Could not update Minute and Agenda of $eventName";
                    $_SESSION['msg_type'] = "warning";
                }    
            }
        }
         //render page to this page
        header('location: agendaAndMinute.php');   
    }


    // check if idEvent is empty or not
    if(isset($_GET['idList'])){

        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['idList'];
        $eventName = $_GET['Name'];

        // delete event from PastEmployee table of eventID passes using GET method
        $deleteReport = "DELETE FROM `meetingagendaminute` WHERE `ID` = $id ";

        $result = mysqli_query($con,$deleteReport);

        // check if above query has any problem execting 
        if ($result){
              // Store messageEvent and msg_type with successfull message
              $_SESSION['messageAgeMin'] ="Minute and Agenda of $eventName has been deleted";
              $_SESSION['msg_type'] = "success";
          }   
          else{
               // Store messageEvent and msg_type with unsuccessfull message
              $_SESSION['messageAgeMin'] ="Could not delete Minute and Agenda of $eventName";
              $_SESSION['msg_type'] = "warning";          
        }

        //render page
        header('location: agendaAndMinuteList.php');
    } 

    ?>