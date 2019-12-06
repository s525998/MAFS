<?php
        // page run thorugh ProcessEvent.php once EventPost.php is loaded
    include_once("processPastEmp.php");

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
     
    include("../Templates/headerAdmin.html");
    
?>
<div class="container-fliud">
    <?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['pastEmp'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['pastEmp']; 
        unset ($_SESSION['pastEmp']);
    ?>
</div>
<!-- closing if condition -->
<?php endif?>

<div class="login-form">
    <div class="main-div">

        <form method="POST" action="processPastEmp.php">

        <!-- Id is there but is hidden  -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Textfield to enter Officer Name or display Officer Name if contain in $empName -->
            <div class="form-group">
                <label class="b891"> Officer Name </label>
                <input type="text" name="empName" value = "<?php echo $empName?>" >
            </div>
            <br>

            <!-- Textfield to enter University or display university if contain in $university -->
            <div class="form-group">
                <label class="b891"> University </label>
                <input type="text" name="university" value = "<?php echo $university?>" >
            </div>
            <br>

            <!-- Textfield to enter position or display position if contain in $position -->
            <div class="form-group">
                <label class="b891"> Position </label>
                    <select name="position" >
                        <option value ="President"> President </option>
                        <option value="Vice President">Vice President</Option>
                        <option value="Member At Large">Member At Large</option>
                        <option value="Secretary/Treasurer">Secretary/Treasurer</option>
                    </select>
            </div>
            <br>

            <!-- Textfield to year served or display year served if contain in $yearServed-->
            <div class="form-group">
            <label class="b891"> Year Served </label>
            <input type="text" name="years" value = "<?php echo $yearServed?>">
            </div>
                    
            <div class="form-group">
            <!--check $update is true or false which is declared in processPastEmp.php  -->
            <?php if($update): ?>

                <!-- Display the update button if $update is true -->
                <input type="submit" class="btn btn-info" name="update" value="Update" id="btn"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHUSURBVEhLtdbPK2VhHMfxazA2fsVOiY0UEQsWsxCmmUaikL1EUXaUvZ2FmWKBlb/AimaaacqUBUnyYyMr8nNjoWzk5/tz9XS/zjm3e84d91Ovuuf0nOd7n3vO+T43FjG1mEVh/CiDqcMzztCnE++ZD/iGaaxDhZwVVOC/koUBnMBO7nWLCegLRU4x/iBoYq9z9CNySrGHoEmvzedHzKEILh8RqqiW/wt2ck24gGq4h2EXTbApwF88IWWxYdgiN2iDSxXGkRM/SiQf23DXaeV2pW+iZdsb/4DPCJsluGtlCoH5CjtwEVGiFdh7qC8dmB+whWoQNd9h51An8eU33AC9+emkE7ZQL3zZgRuwqRNppBG20Bh82YAbsK8TaaQZttAgfFmGG6C2koeoGYIt1AFf1K/soB5EzU+46/V6lMAXvfm2kNpQNsKmBeoK7vp/SJpV2GIzCIrajY22imPYa7uQNPW4gwZeoAE2uZiEOrtLO05hi6whZUZwiMr4USKfoKdREx1gFGqitoBcoQyhoibpor1pHuri3km99KKrw0eOWsglgib10vZSjrSjm5psO9cqVaAb7xL9lHoC76ECR2iFftaMRL1sC/o3lPFou//y+jFsYrEXv3u+PgWqbfsAAAAASUVORK5CYII=">
                <?php else: ?>

                <!-- Display the Save button if $update is false -->
                <input type="submit" class="btn btn-info" value="Add" name="Add" id="btn">
            <?php endif; ?>
            </div>

        </form>
    </div>
</div>
<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>






