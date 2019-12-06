<?php
    // needed for connection of database which is contain in sql.php
    include_once('processAgendaAndMinute.php');

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
 
    // include headerMember that contain header part of html 
    include("../Templates/headerAdmin.html");
?>

 
 
 
 <!-- Form -->
 <div class="container content">
    <?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['messageAgeMin'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['messageAgeMin']; 
        unset ($_SESSION['messageAgeMin']);
    ?>
    </div>  
    <?php endif?>
        
      <div class="row">
            <div class="post-div">
            <!-- Created form for the file Upload -->
            <div class="col-md-10 card">
                <form enctype="multipart/form-data" action="processAgendaAndMinute.php" method= "POST">

                <input type="hidden" name="id" value="<?php echo $id; ?>">
               
                    <div class="form-group">
                        <label class="b891"> Event Name   </label>
                            <input type="text" name="eventName" value = "<?php echo $eventName?>" required>
                    </div> <br><br>
                    <div class="form-group"> 
                            <label class="b891">  Event Date</label>
                            <input type="date" name="Dates" value = "<?php echo $dates?>" required>   
                    </div>  <br><br>
                    <div class="form-group"> 
                            <label class="b891" for="exampleFormControlFile1">Upload official agenda here</label>
                            <input type="file"  id="report" name="Agenda" value = "<?php echo $Agenda_name?>">
                    </div>  <br><br>
                    <div class="form-group">
                            <label class="b891" for="exampleFormControlFile1">Upload Approve Meeting here</label>
                            <input type="file"  id="report" name="Minutes" value = "<?php echo $Minute_name?>">    
                    </div>  <br><br>
                    <div class="form-group">
                            <label class="b891" for="exampleFormControlTextarea1">Notes</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                    </div>       <br><br>                  
                    <div class="form-group">
                    <!--check $update is true or false which is declared in ProcessEvent.php  -->
                    <?php if($update): ?>

                        <!-- Display the update button if $update is true -->
                        <input type="submit" class="btn btn-info" name="update" value="Update" id="btn"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHUSURBVEhLtdbPK2VhHMfxazA2fsVOiY0UEQsWsxCmmUaikL1EUXaUvZ2FmWKBlb/AimaaacqUBUnyYyMr8nNjoWzk5/tz9XS/zjm3e84d91Ovuuf0nOd7n3vO+T43FjG1mEVh/CiDqcMzztCnE++ZD/iGaaxDhZwVVOC/koUBnMBO7nWLCegLRU4x/iBoYq9z9CNySrGHoEmvzedHzKEILh8RqqiW/wt2ck24gGq4h2EXTbApwF88IWWxYdgiN2iDSxXGkRM/SiQf23DXaeV2pW+iZdsb/4DPCJsluGtlCoH5CjtwEVGiFdh7qC8dmB+whWoQNd9h51An8eU33AC9+emkE7ZQL3zZgRuwqRNppBG20Bh82YAbsK8TaaQZttAgfFmGG6C2koeoGYIt1AFf1K/soB5EzU+46/V6lMAXvfm2kNpQNsKmBeoK7vp/SJpV2GIzCIrajY22imPYa7uQNPW4gwZeoAE2uZiEOrtLO05hi6whZUZwiMr4USKfoKdREx1gFGqitoBcoQyhoibpor1pHuri3km99KKrw0eOWsglgib10vZSjrSjm5psO9cqVaAb7xL9lHoC76ECR2iFftaMRL1sC/o3lPFou//y+jFsYrEXv3u+PgWqbfsAAAAASUVORK5CYII=">
                        <?php else: ?>

                        <!-- Display the Save button if $update is false -->
                        <input type="submit" class="btn btn-info" value="Add" name="Add" id="btn">
                    <?php endif; ?>
                    </div>
                    </div>
                </form>
                </div>
                </div>

            <?php 
            /* If user is not logged and some visit this page then it redirect to login.php */
                }else{
                header('location: ../login.php'); 
            }?>