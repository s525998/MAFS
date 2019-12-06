<?php
    // temporarily storing data
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
            

    // include headerMember that contain header part of html 
    include("../Templates/headerAdmin.html");
?>

<div class="container-fluid">

    <?php
        // check if 'currentEmp' is empty or not
            if (isset($_SESSION['currentEmp'])):
        ?>
        <!-- retrieving 'msg_type' value -->
        <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

        <?php 
            //displaying currentEmp 
            echo $_SESSION['currentEmp']; 
            unset ($_SESSION['currentEmp']); ?>
    </div>
    <?php endif?>

<div class="login-form">
    <div class="main-div">
        <form enctype="multipart/form-data" action="processOfficer.php" method="POST">

            <!-- Textfield to enter Officer Name -->
            <div class="form-group">
                <label class="b891"> Officer Name </label>
                <input type="text" name="officeName">
            </div>
            <br>

            <!-- Textfield to enter university -->
            <div class="form-group">
                <label class="b891"> University </label>
                <input type="text" name="university">
            </div>
            <br>

            <!-- Textfield to enter Address -->
            <div class="form-group">
                <label class="b891"> Address </label>
                <input type="text" name="address1" placeholder="Street Address"><br> <br>
                <input type="text" name="address2" placeholder="State & PinCode"> 
            </div>
            <br>

            <div class="form-group">
                <label class="b891"> E-Mail </label>
                <input type="text" name="eMail">
            </div>
            <br>
            <div class="form-group" style="padding-left:50px;"> 
                <label class="b891" for="exampleFormControlFile1">Upload Image</label>
                <input type="file"  id="report" name="image">
            </div> 
            <br>
            <div class="form-group">
                <label class="b891"> Position </label>
                <select name="position">
                    <option value="President">President</option>
                    <option value="VicePresident">Vice President</option>
                    <option value="SecretaryTreasurer">Secretary/Treasurer</option>
                    <option value="MemberAtLarge">Member At Large</option>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label class="b891"> Vacant </label>
                <br>
                <label>Yes
                    <input type="radio" name="IsVacant" value ='true' />
                </label> 
                <label>No
                    <input type="radio" name="IsVacant" value ='false' />
                </label>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update" name="update">
            </div>
        
        </form>

    </div> 
</div>
</div>
<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>

