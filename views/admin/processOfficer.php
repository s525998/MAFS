<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');    

    // temporarily storing data
    session_start();

    // created variable
    $officerName =  $_POST['officeName'];
    $university =  $_POST['university'];
    $address1 =  $_POST['address1'];
    $address2 =  $_POST['address2'];
    $email =  $_POST['eMail'];
    $position =  $_POST['position'];
    $member_pic = $_FILES['image']['name'];
    $member_tmp = $_FILES['image']['tmp_name'];

 
   
    // check if user have clicked update button 
    if (isset($_POST['update'])){
        // check if 'member_pic' variable not empty
        if(!empty($member_pic)){
         // move file from temporary location to /uploadFile/member folder with name grab from member_pic
            if(move_uploaded_file($member_tmp,"../../uploadFile/member/".$member_pic) ){
        /*   If there is picture then we create variable just like we did for isVacant to save as boolean which require to save in bits 
            1 as true and 0 as false. We will be saving this using Update query to save all the updated information  */
                $hasPic = 1;
                $queryUpdate = "UPDATE `current_employee` SET `Officer_Name`='$officerName',`University`= '$university',`Address1`= '$address1',`Address2`= '$address2',`E-Mail`= '$email',`isVacant`= '$isVacant', `picture` = '$member_pic', `hasPic` = '$hasPic' WHERE `Position`= '$position'";
                $resultUpdate = mysqli_query($con, $queryUpdate);
                
            // If above query is executed then print below message
                if($resultUpdate){
                    $_SESSION['currentEmp'] = " $position has been updated and posted in Website";
                    $_SESSION['msg_type']= "success";
                }
            // If above query is not executed then print below message
                else{
                    $_SESSION['currentEmp'] = " $position could not be updated";
                    $_SESSION['msg_type']= "danger";
                }
              
            }
            // If unable to upload a image then print below message 
            else{
                $_SESSION['currentEmp'] = "Having trouble uploading image";
                $_SESSION['msg_type']= "danger";
            }
            // render to below location
            header('location: editOfficer.php');
        } 
        else{
        /* As explained above, if there is no image then we are providing false and update in database */
            $hasPic = 0;
            $queryUpdate = "UPDATE `current_employee` SET `Officer_Name`='$officerName',`University`= '$university',`Address1`= '$address1',`Address2`= '$address2',`E-Mail`= '$email',`isVacant`= '$isVacant', `picture` = null , `hasPic` = '$hasPic'WHERE `Position`= '$position'";
            $resultUpdate = mysqli_query($con, $queryUpdate);

        // If above query is executed then print below message
            if($resultUpdate){
                $_SESSION['currentEmp'] = " $position has been updated and posted in Website";
                $_SESSION['msg_type']= "success";
            }
        // If above query is not executed then print below message
            else{
                $_SESSION['currentEmp'] = " $position could not be updated";
                $_SESSION['msg_type']= "danger";
            }
        // render to below location
            header('location: editOfficer.php');
        }
}
   
?>