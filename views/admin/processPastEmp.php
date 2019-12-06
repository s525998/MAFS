<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    
    // temporarily storing data
    session_start();

    // creating varibale
    $id ="";
    $empName = " ";
    $university = " ";
    $position = " ";
    $yearServed= " ";
    $update = false;

      // check if idEvent is empty or not
      if(isset($_GET['idEmp'])){

        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['idEmp'];
        $empName = $_GET['Name'];

        // delete event from PastEmployee table of eventID passes using GET method
        $deleteReport = "DELETE FROM `PastEmployee` WHERE `ID` = $id ";

        $result = mysqli_query($con,$deleteReport);

        // check if above query has any problem execting 
        if ($result){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['pastEmpList'] = "$empName is deleted";
            $_SESSION['msg_type'] = "danger";     
        }
        else{
             // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['pastEmpList'] = "Could not delete";
            $_SESSION['msg_type']= "warning";           
        }

        //render page to EventPost.php
        header('location: pastEmployeeList.php');
    } 

  // check if Post is empty or not
  if(isset($_POST['Add'])){

    // Store all the information which was send using POST method to store in created variable 
    $empName = $_POST['empName'];
    $university = $_POST['university'];
    $position = $_POST['position'];
    $yearServed= $_POST['years'];

     // insert data to Event Table
    $queryInsert = "INSERT INTO `pastemployee`( `Name`, `University`, `Position`, `Year`) VALUES ('$empName','$university','$position','$yearServed')";
    $resultInsert = mysqli_query($con,$queryInsert);

    // check if above query has any problem execting 
    if ($resultInsert){
        // Store messageEvent and msg_type with successfull message
        $_SESSION['pastEmp'] = "$empName has been added and posted in Website";
        $_SESSION['msg_type']= "success";
    }
    else {
          // Store messageEvent and msg_type with unsuccessfull messag
       $_SESSION['pastEmp']= "$empName could not added";
       $_SESSION['msg_type']= "warning";
    }
      //render page to EventPost.php
    header('location: PastEmployee.php');
}

  // check if editIt is empty or not
  if (isset($_GET['editId'])){
        
    // Store all the information which was send using GET method to store in created variable 
    $id = $_GET['editId'];
    $update= true;

    // select an event of an $id 
    $queryEdit = "SELECT  * FROM `PastEmployee` WHERE `ID` = $id ";
    $resultEdit = mysqli_query($con,$queryEdit);

    // check if above query has any problem execting 
    if($resultEdit){
        // Store above information from resultEdit to $row variable
        $row = mysqli_fetch_array($resultEdit);

        // store all the data in created variable
        $empName = $row['Name'];
        $university = $row['University'];
        $position = $row['Position'];
        $yearServed= $row['Year'];
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
    $empName = $_POST['empName'];
    $university = $_POST['university'];
    $position = $_POST['position'];
    $yearServed= $_POST['years'];

   // update the event table of $id with above information
   $queryUpdate= "UPDATE `pastemployee` SET `Name`= '$empName',`University`= '$university',`Position`= '$position',`Year`= '$yearServed' WHERE `ID` = $id ";
   $resultUpdate = mysqli_query($con,$queryUpdate);

    // check if above query has any problem execting 
   if($resultUpdate){
       // Store messageEvent and msg_type with successfull message
       $_SESSION['pastEmp'] = "$empName has been updated and posted in website";
       $_SESSION['msg_type']="info";
   }
   else{
       // Store messageEvent and msg_type with unsuccessfull message
       $_SESSION['pastEmp'] = "$empName could not be updated";
       $_SESSION['msg_type'] = "warning";
   }
     //render page to PastEmployee.php
   header('location: PastEmployee.php');
}

    