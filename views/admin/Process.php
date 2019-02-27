<?php
    include_once('sql.php');
    
    session_start();

        $update= false;
        $id= 0;
        $firstName =" ";
        $lastName=" ";
        $userName=" ";
        $passWord=" ";
        $mail=" ";
        
        if (isset($_POST['save'])){
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName= $_POST['userName'];
            $passWord = $_POST['passWord'];
            $mail = $_POST['Email'];
        
        $query= "INSERT INTO `member`(`First Name`, `Last Name`, `UserName`, `Password`, `E-Mail`) VALUES ('$firstName','$lastName','$userName','$passWord','$mail')";
        $result= mysqli_query($con,$query);
        if ($result){
            $_SESSION['message']="$firstName $lastName has been saved";
            $_SESSION['msg_type']="success";
            header('Location: admin.php');
        }
        else{
            $_SESSION['message']="$firstName cannot be saved";
            $_SESSION['msg_type']="warning";
            header('Location:admin.php');
        }

        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $name = $_GET['first']. " ".$_GET['last'];
            $query = "DELETE FROM `member` WHERE `ID` = $id ";
            $result = mysqli_query($con,$query);
            if ($result){
                $_SESSION['deleteMsg'] = "$name is deleted";
                $_SESSION['msg_type'] = "danger";
                header('location: change.php');
            }
            else{
                $_SESSION['deleteMsg'] = "Could not delete";
                $_SESSION['msg_type']= "warning";
                header('location: change.php');
            }
            
            
        }

        if (isset($_GET['editId'])){
            $id = $_GET['editId'];
            $update= true;
            $query = "SELECT  * FROM `member` WHERE `ID` = $id ";
            $result= mysqli_query($con,$query);

            if($result ){
                $row=mysqli_fetch_array($result);
                $firstName = $row['First Name'];
                $lastName = $row['Last Name'];
                $userName = $row['UserName'];
                $passWord = $row['Password'];
                $mail = $row['E-Mail'];

        }
        else{
            echo "Could not edit";
        }
    }

        if (isset($_POST['update'])){
            $id= $_POST['id'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $userName =$_POST['userName'];
            $passWord = $_POST['passWord'];
            $mail = $_POST['Email'];

            $query= "UPDATE `member` SET `First Name`='$firstName',`Last Name`='$lastName',`UserName`='$userName',`Password`= '$passWord',`E-Mail`='$mail' WHERE `ID` = $id ";
            $result = mysqli_query($con,$query);

            if($result){
                $_SESSION['message']="$firstName.$lastName has been updated";
                $_SESSION['msg_type']="info";
                header('location: change.php');
            }
            else{
                $_SESSION['message']="$firstName.$lastName could not be updated";
                $_SESSION['msg_type']="warning";
                header('location: change.php');
            }
        }
     ?>