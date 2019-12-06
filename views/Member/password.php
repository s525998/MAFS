<?php
        // needed for connection of database which is contain in sql.php
        include_once('../admin/sql.php');
        
        // temporarily storing data
        session_start();

        /* To check if user logged in and visit this page */
        if (isset($_SESSION['isMember'])){

        // including header member from Templates Folder
        include("../Templates/headerMember.html");

        // creating variable
        $memberId = $_SESSION['id'];
        $msg_style = " ";
        $msg = " ";
        $msgBoolean = false;

        // query to select every field from member whose id is equal to $memberId
        $queryPassword = "SELECT * FROM `member` WHERE member.ID = $memberId";
        $resultPassword = mysqli_query($con, $queryPassword);

        // storing data from the query to the $rowPassword array
        $rowPassword = mysqli_fetch_array($resultPassword);

        // check if change button is clicked or not
    if (isset($_POST['change'])){
    
        // checking if oldPassword from Form and Password from table is equal and also newPassword and confirmPassword from Form is equal
        if ($_POST['oldPassword'] == $rowPassword['Password'] && $_POST['newPassword'] == $_POST['confirmPassword']){
            // set newPassword variable value from text field newPassword
            $newPassword = $_POST['newPassword'];

            // query that update password 
            $queryUpdate = " UPDATE `member` SET `Password`='$newPassword' WHERE member.ID = $memberId ";

            // executing above query
            $resultUpdate = mysqli_query($con, $queryUpdate);

            // check if query is executing or not
                if ($resultUpdate){
                    // Store successfull message
                    $msg = "Your password have been changed.";
                    $msg_style = "success";
                    $msgBoolean = true;
                }
        }

        // check if old password fill out by user is equal to password from the member table
        if ($_POST['oldPassword'] != $rowPassword['Password']){
            // store unsuccessful message
            $msg = " Your old password is incorrect";
            $msg_style = "warning";
            $msgBoolean = true;
        }

        // check if new password and confirm password fill out by the user is equal or not
        if ($_POST['newPassword'] != $_POST['confirmPassword']) {
            // store unsuccessful message
            $msg = " Your new password and confirm password are not same.";
            $msg_style = "warning";
            $msgBoolean = true;
        }
    }
?>

<!-- check if $msgBoolean is true or not -->
<?php if ($msgBoolean) {?>
    <!-- print out the message  -->
<div class= "alert alert-<?php echo $msg_style; ?>" style="text-align:center">
    <?php 
       echo $msg;
    ?>
</div>
<?php }?>

<div class="main-div"  style=" border-style: solid; border-width: 1.5px;">
    <form id="Login" action="password.php" method="POST" >
        
        <div class="form-group">
            <!-- TextField to fill out the old password -->
            <input type="password" name="oldPassword" class="form-control"  placeholder="Old Password" required>
        </div>

        <div class="form-group">
            <!-- Text Field to fil out the new password -->
            <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>
        </div>

        <div class="form-group">
            <!-- text field to fill out the confirm password -->
            <input type="password" name="confirmPassword" class="form-control" placeholder="Conform Password" required>
        </div>

        <div class="passwordDetail"> Make sure your password has to be combination of letter and number.</div>

        <!-- button to update the password -->
        <button type="submit" class="btn btn-primary" name="change" >Update Password</button>
        <br>
        <br>

    </form>
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>