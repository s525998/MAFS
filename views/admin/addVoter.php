<?php
    // page run thorugh processUniversity.php once addUniversity.php is loaded
    include_once("processVoter.php");

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
     
    include("../Templates/headerAdmin.html");
    
?>
<div class="container-fliud">
    <?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['voter'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['voter']; 
        unset ($_SESSION['voter']);
    ?>
</div>
<!-- closing if condition -->
<?php endif?>

<div class="login-form">
    <div class="main-div">

        <form method="POST" action="processVoter.php">

        <!-- Id is there but is hidden  -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Textfield to enter University Name or display Officer Name if contain in $empName -->
            <div class="form-group">
                <label class="b891"> University Name </label>
                <input type="text" name="uniName" value = "<?php echo $uniName;?>" >
            </div>
            <br>

            <!-- Textfield to enter Faculty Link or display faculty link if contain in $facultylink -->
            <div class="form-group">
                <label class="b891"> Voter Name </label>
                <input type="text" name="voterName1" value = "<?php echo $voterName1;?>" >
            </div>
            <br>
            <div class="form-group">
                <label class="b891"> Voter Name </label>
                <input type="text" name="voterName2" value = "<?php echo $voterName2;?>" >
            </div>

            <br>
            <br>
     
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






