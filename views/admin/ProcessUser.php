<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    
   //temporarily storing data
    session_start();

        // created variable
        $update= false;
        $id= 0;
        $firstName =" ";
        $lastName=" ";
        $userName=" ";
        $passWord=" ";
        $mail=" ";
        
        // If condition whether save is empty or not
        if (isset($_POST['save'])){
            // retrieving value from the Form that has been enter by user
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName= $_POST['userName'];
            $passWord = $_POST['passWord'];
            $mail = $_POST['Email'];
            $position = $_POST['position'];

            // insert data to member Table
        $query= "INSERT INTO `member`(`First Name`, `Last Name`, `UserName`, `Password`, `E-Mail`,`Position`) VALUES ('$firstName','$lastName','$userName','$passWord','$mail','$position')";
        $result= mysqli_query($con,$query);

        // check if above query has any problem execting 
        if ($result){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['message']="$firstName $lastName has been saved";
            $_SESSION['msg_type']="success";
          
        }
        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['message']="$firstName cannot be saved";
            $_SESSION['msg_type']="warning";
        }
          //render page to admin.php
        header('Location: admin.php');
        }

        //if condition whether id is empty or not
        if(isset($_GET['id'])){
            // Store all the information which was send using GET method to store in created variable 
            $id = $_GET['id'];
            $name = $_GET['first']. " ".$_GET['last'];

            // delete user from member table of user id passes using GET method
            $query = "DELETE FROM `member` WHERE `ID` = $id ";
            $result = mysqli_query($con,$query);

             // check if above query has any problem execting 
            if ($result){
                // Store messageEvent and msg_type with successfull message
                $_SESSION['deleteMsg'] = "$name is deleted";
                $_SESSION['msg_type'] = "danger";   
               
            }
            else{
                // Store messageEvent and msg_type with unsuccessfull message
                $_SESSION['deleteMsg'] = "Could not delete";
                $_SESSION['msg_type']= "warning";
                $_SESSION['id'] = "$id";
             
            }
             //render page to change.php
            header('location: change.php');
            
            
        }

        //if condition whether editId is empty or not
        if (isset($_GET['editId'])){
            // Store all the information which was send using GET method to store in created variable 
            $id = $_GET['editId'];
            $update= true;

              // select an user from an ID
            $query = "SELECT * FROM `member` WHERE `ID` = $id ";
            $result= mysqli_query($con,$query);

             // check if above query has any problem execting 
            if($result){
                 // Store above information from result to $row variable
                $row=mysqli_fetch_array($result);

                // store all the data in created variable
                $firstName = $row['First Name'];
                $lastName = $row['Last Name'];
                $userName = $row['UserName'];
                $passWord = $row['Password'];
                $mail = $row['E-Mail'];
                $position = $row['Position'];

        }
        else{
            echo "Could not edit";
        }
    }

     //if condition whether update is empty or not
        if (isset($_POST['update'])){

            // Store all the information which was send using POST method to store in created variable 
            $id= $_POST['id'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName =$_POST['userName'];
            $passWord = $_POST['passWord'];
            $mail = $_POST['Email'];
            $position = $_POST['position'];

            // update the member table
            $query= "UPDATE `member` SET `First Name`='$firstName',`Last Name`='$lastName',`UserName`='$userName',`Password`= '$passWord',`E-Mail`='$mail', `Position` = '$position' WHERE `ID` = $id ";
            $result = mysqli_query($con,$query);
            
             // check if above query has any problem execting 
            if($result){
                 // Store messageEvent and msg_type with successfull message
                $_SESSION['updateMsg']="$firstName $lastName has been updated";
                $_SESSION['msg_type']="info";
              
            }
            else{
                 // Store messageEvent and msg_type with unsuccessfull message
                $_SESSION['updateMsg']="$firstName $lastName could not be updated";
                $_SESSION['msg_type']="warning";
             
            }
             //render page to change.php
            header('location: change.php');
        }
     ?>