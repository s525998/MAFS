<?php
 // needed for connection of database which is contain in sql.php
    include("sql.php");

     //temporarily storing data
    session_start();

    //created variable
    $updatePost="";

    //Check if button id named jeffNewsPost is clicked or not
    if (isset($_POST['jeffNewsPost'])){
            // when user upload file instead of post then isText is place false 
            $isText = 0;

            //these variable contain all the information of 'file' form field 
            $jeffNews_name = $_FILES['jeffNewsFile']['name'];
            $jeffNews_tmp = $_FILES['jeffNewsFile']['tmp_name'];

            /* Checking if Jeff News File is moved from their current location to Folder we wanted  */
            if (move_uploaded_file($jeffNews_tmp,"../../uploadFile/post/jeffNews/".$jeffNews_name)){
            // query that will update announcements from Announcement Table whose type is jeffCity
            $queryUpdate = "INSERT `announcements`( `Type`,`fileName`) VALUES ('jeffCity', '$jeffNews_name')";
            // run above query 
            $resultUpdate = mysqli_query($con, $queryUpdate);
            }
            
        //    check if above query has any problem execting 
        if ($resultUpdate){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messagePost']="$jeffNews_name have been posted in Jeff News.";
            $_SESSION['msg_type']="info";
        }

        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messagePost']="Jeff City News could not be posted ";
            $_SESSION['msg_type']="warning";
        }

        // render page to post.php
        header('location: post.php');
    }



    //Check if button id named legNewsPost is clicked or not
    if (isset($_POST['legNewsPost'])){
            $legNews_name = $_FILES['legNewsFile']['name'];
            $legNews_tmp = $_FILES['legNewsFile']['tmp_name'];

                  /* Checking if Leg News File is moved from their current location to Folder we wanted  */
            if (move_uploaded_file($legNews_tmp,"../../uploadFile/post/legNews/".$legNews_name)) {
                // query that will update announcements from Announcement Table whose type is legislationUpdate
                $queryUpdate = " INSERT `announcements`( `Type`,`fileName`) VALUES ('legislationUpdate', '$legNews_name')";
                $resultUpdate = mysqli_query($con, $queryUpdate);
            }
        if ($resultUpdate){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messagePost']="$legNews_name have been posted in Legislation Update.";
            $_SESSION['msg_type']="info";
        }
        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messagePost']="Legislation could not be posted";
            $_SESSION['msg_type']="warning";
        }
        //render page to post.php
        header('location: post.php');
    }


    //Check if button id named  bestPracPost is clicked or not
    if (isset($_POST['bestPracPost'])){
            $bestPrac_name = $_FILES['bestPracFile']['name'];
            $bestPrac_tmp = $_FILES['bestPracFile']['tmp_name'];

            /* Checking if Best Practise File is moved from their current location to Folder we wanted  */
            if (move_uploaded_file($bestPrac_tmp,"../../uploadFile/post/bestPrac/".$bestPrac_name)){
                
                // query that will update announcements from Announcement Table whose type is bestPractices
                $queryUpdate = "INSERT `announcements`( `Type`,`fileName`) VALUES ('bestPractices', '$bestPrac_name')";
                $resultUpdate = mysqli_query($con, $queryUpdate);
            }
        

        if ($resultUpdate){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messagePost']="$bestPrac_name have been posted in Best Practices";
            $_SESSION['msg_type']="info";
        }
        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messagePost']="Best Practices could not be posted";
            $_SESSION['msg_type']="warning";
        }
        //render page to post.php
        header('location: post.php');
    }

    //Check if button id named  announcePost is clicked or not
    if (isset($_POST['announcePost'])){
        // update Post will contain word send by the admin
        $updatePost = $_POST['announce'];

        // query that will update announcements from Announcement Table whose type is Announcement
        $queryUpdate = "UPDATE `announcements` SET `Announcement`= '$updatePost' WHERE `type`='Announcement'";
        $resultUpdate = mysqli_query($con, $queryUpdate);

        // check if above query has any problem execting 
        if ($resultUpdate){
            // Store messageEvent and msg_type with successfull message
            $_SESSION['messagePost']="Announcement have been updated.";
            $_SESSION['msg_type']="info";
        }
        else{
            // Store messageEvent and msg_type with unsuccessfull message
            $_SESSION['messagePost']="Announcement could not be updated";
            $_SESSION['msg_type']="warning";
        }
        //render page to post.php
        header('location: post.php');
    }
    // check if idEvent is empty or not
    if(isset($_GET['idEmp'])){

        // Store all the information which was send using GET method to store in created variable 
        $id = $_GET['idEmp'];
        $fileName = $_GET['Name'];
        $type = $_GET['Type'];

        // delete event from PastEmployee table of eventID passes using GET method
        $deletePost = "DELETE FROM `announcements` WHERE `ID`= $id ";

        $result = mysqli_query($con,$deletePost);

        // check if above query has any problem execting 
        if ($result){
              // Store messageEvent and msg_type with successfull message
              $_SESSION['postList'] ="$fileName post in $type has been deleted";
              $_SESSION['msg_type'] = "success";
          }   
          else{
               // Store messageEvent and msg_type with unsuccessfull message
              $_SESSION['postList'] ="Could not delete Minute and Agenda of $fileName";
              $_SESSION['msg_type'] = "warning";          
        }

        //render page
        header('location: postList.php');
    } 
?>
