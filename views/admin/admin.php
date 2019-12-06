

    <?php

        // page run thorugh ProcessUser.php once admin.php is loaded
        include_once("ProcessUser.php");

        /* To check if user logged in and visit this page */
        if (isset($_SESSION['isAdmin'])){
            
        // adding header from Template folder
        include("../Templates/headerAdmin.html");
    ?>

    <?php
        // check if 'message' is empty or not
        if (isset($_SESSION['message'])):
    ?>
        <!-- retrieving 'msg-type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
        //displaying message 
        echo $_SESSION['message']; 
        unset ($_SESSION['message']);
    ?>
</div>
        <!-- closing if conditon -->
    <?php endif?>

   <!-- Form field -->
    <div class="login-form">
        <div class="main-div">
                
        <form id="form" action="ProcessUser.php" method="POST" >

            <!-- Id is there but is hidden  -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

             <!-- Textfield to enter First Name or display FirstName if contain in $firstName -->
            <div class="form-group">
           <label> First-Name </label><input type="text" name="firstName" class="form-control addCon" id="FirstName" 
           value=<?php echo $firstName?> > 
            </div>

            <!-- Textfield to enter Last Name or display LastName if contain in $lastName -->
            <div class="form-group">
                <label>Last-Name </label> <input type="text" name="lastName" class="form-control addCon" id="LastName" 
                value=<?php echo $lastName?>>
            </div>

            <!-- Text field to enter User Name or display User Name if contain in $userName -->
            <div class="form-group"> 
                <label>User-Name </label><input type="text" name="userName" class="form-control addCon" id="userName"
                value="<?php echo $userName?>">
            </div>

            <!-- Text Field to enter Password or display password if contain in $passWord-->
            <div class="form-group"> 
                <label>Pass-Word </label><input type="text" name="passWord" class="form-control addCon" id="passWord"
                value="<?php echo $passWord?>" > 
            </div>

            <!-- Text Field to enter Email Address or display Email Address if contain in $mail-->
            <div class="form-group"> 
                <label>E-mail Address </label><input type="email" name="Email" class="form-control addCon" id="Email"
                value="<?php echo $mail?>"> 
            </div>
            <br>

            <!-- Select Field for chosing position of the member -->
            <div class="form-group">
                <label> Position </label>
                    <select name="position" >
                         <option value ="Admin"> Admin </option>
                         <option value="Member"> Member</Option>
                         <option value="Inactive"> Inactive </option>
                    </select>
            </div>
            <br>
            
            <!--check $update is true or false which is declared in ProcessUser.php  -->
            <?php if($update): ?>
             <!-- Display the update button if $update is true -->
            <button type="submit" class="btn btn-primary" name="update"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHUSURBVEhLtdbPK2VhHMfxazA2fsVOiY0UEQsWsxCmmUaikL1EUXaUvZ2FmWKBlb/AimaaacqUBUnyYyMr8nNjoWzk5/tz9XS/zjm3e84d91Ovuuf0nOd7n3vO+T43FjG1mEVh/CiDqcMzztCnE++ZD/iGaaxDhZwVVOC/koUBnMBO7nWLCegLRU4x/iBoYq9z9CNySrGHoEmvzedHzKEILh8RqqiW/wt2ck24gGq4h2EXTbApwF88IWWxYdgiN2iDSxXGkRM/SiQf23DXaeV2pW+iZdsb/4DPCJsluGtlCoH5CjtwEVGiFdh7qC8dmB+whWoQNd9h51An8eU33AC9+emkE7ZQL3zZgRuwqRNppBG20Bh82YAbsK8TaaQZttAgfFmGG6C2koeoGYIt1AFf1K/soB5EzU+46/V6lMAXvfm2kNpQNsKmBeoK7vp/SJpV2GIzCIrajY22imPYa7uQNPW4gwZeoAE2uZiEOrtLO05hi6whZUZwiMr4USKfoKdREx1gFGqitoBcoQyhoibpor1pHuri3km99KKrw0eOWsglgib10vZSjrSjm5psO9cqVaAb7xL9lHoC76ECR2iFftaMRL1sC/o3lPFou//y+jFsYrEXv3u+PgWqbfsAAAAASUVORK5CYII=">
            Update</button>


        <?php else: ?>
            <!-- Display the Save button if $update is false -->
            <button type="submit" class="btn btn-primary" name="save"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADtSURBVEhL7dU/60FhGIfxM8gq78JiYpSJsinlBUjIqKwWi5k3gkXKJKvJShbZkD+TUlz3cE5P8Rznj2PhW5/l6ee+Fv0Y314DJ9x9uqAA7XZQP9BE1KU0brhCGztCDcXxbmGscEBNHph5RxvzEorA/PuOPDD1zstYECEhsTysBRUSU1gLMjSDNS+hEMaYoygPzHWohyQSLpSg3jDZhj7px0JryL+hqkttnKHesg1l4XUtqLdsQ06+3rrVod76hxzvR0MpbOE3NEQZ2tAC8mPlN7THEk+hDeTRVEHGoy7UWwNYy2GEyYf1EcO3ZhgP0NonIK4SN50AAAAASUVORK5CYII=">
            Save</button>

            <!-- closing if condition  -->
        <?php endif; ?>

            </form>

        </div>
    </div>
</div>
</html>
<?php /* If user is not logged and some visit this page then it redirect to login.php */
    }else{
    header('location: ../login.php'); 
}?>