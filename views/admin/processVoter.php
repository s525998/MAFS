<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    
    // temporarily storing data
    session_start();

    // creating varibale
    $id ="";
    $uniName = " ";
    $voterName1 = " ";
    $voterName2 = " ";
    $update = false;
    
      // check if idEvent is empty or not
      if(isset($_GET['idEmp'])){

        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['idEmp'];
        $uniName = $_GET['Name'];

        // delete event from PastEmployee table of eventID passes using GET method
        $deleteReport = "DELETE FROM `voter` WHERE `id` = $id ";

        $result = mysqli_query($con,$deleteReport);

        // check if above query has any problem execting 
        if ($result){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['voterList'] = "$uniName and their voter is deleted";
            $_SESSION['msg_type'] = "danger";     
        }
        else{
             // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['voterList'] = "Could not delete";
            $_SESSION['msg_type']= "warning";           
        }

        //render page to EventPost.php
        header('location: voterList.php');
    } 

  // check if Post is empty or not
  if(isset($_POST['Add'])){

    // Store all the information which was send using POST method to store in created variable 
    $uniName = $_POST['uniName'];
    $voterName1 = $_POST['voterName1'];
    $voterName2 = $_POST['voterName2'];

     // insert data to Event Table
    $queryInsert = "INSERT INTO `voter`(`UniName`, `vName1`, `vName2`) VALUES ('$uniName','$voterName1','$voterName2')";
    $resultInsert = mysqli_query($con,$queryInsert);

    // check if above query has any problem execting 
    if ($resultInsert){
        // Store messageEvent and msg_type with successfull message
        $_SESSION['voter'] = "$uniName voter has been added and posted in Website";
        $_SESSION['msg_type']= "success";
    }
    else {
          // Store messageEvent and msg_type with unsuccessfull messag
       $_SESSION['voter']= "$uniName voter could not added";
       $_SESSION['msg_type']= "warning";
    }
      //render page to addUniversity.php
    header('location: addVoter.php');
}

  // check if editIt is empty or not
  if (isset($_GET['editId'])){
        
    // Store all the information which was send using GET method to store in created variable 
    $id = $_GET['editId'];
    $update= true;

    // select an event of an $id 
    $queryEdit = "SELECT * FROM `voter` WHERE `id` = $id ";
    $resultEdit = mysqli_query($con,$queryEdit);

    // check if above query has any problem execting 
    if($resultEdit){
        // Store above information from resultEdit to $row variable
        $row = mysqli_fetch_array($resultEdit);

        // store all the data in created variable
        $uniName = $row['UniName'];
        $voterName1 =$row['vName1'];
        $voterName2 = $row['vName2'];

    }
    else{
        // Display unsuccessful msg 
        echo "Could not edit";
    }
}


// check if update is empty or not
if (isset($_POST['update'])){

    // Store all the information which was send using POST method to store in created variable 
    $id = $_POST['id'];
    $uniName = $_POST['uniName'];
    $voterName1 = $_POST['voterName1'];
    $voterName2 = $_POST['voterName2'];


   // update the event table of $id with above information
   $queryUpdate= "UPDATE `voter` SET `UniName`='$uniName',`vName1`='$voterName1',`vName2`='$voterName2' WHERE `id` = $id ";
   $resultUpdate = mysqli_query($con,$queryUpdate);

    // check if above query has any problem execting 
   if($resultUpdate){
       // Store messageEvent and msg_type with successfull message
       $_SESSION['voter'] = "$uniName voter has been updated and posted in website";
       $_SESSION['msg_type']="info";
   }
   else{
       // Store messageEvent and msg_type with unsuccessfull message
       $_SESSION['voter'] = "$uniName voter could not be updated";
       $_SESSION['msg_type'] = "warning";
   }
     //render page to PastEmployee.php
   header('location: addVoter.php');
}

    