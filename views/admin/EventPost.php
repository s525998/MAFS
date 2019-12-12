<?php 
      // page run thorugh ProcessEvent.php once EventPost.php is loaded
      include_once("ProcessEvent.php");

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
           
      
       // adding header from Template folder
     include("../Templates/headerAdmin.html");


     // require to display Date eventName and EventDetails for below table
     $queryEvent = "SELECT  * FROM `events`";
     $result= mysqli_query($con,$queryEvent);
?>

<div class="container-fliud">
    <?php
      // check if 'messageEvent' is empty or not
        if (isset($_SESSION['messageEvent'])):
    ?>
      <!-- retrieving 'msg_type' value -->
    <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

    <?php 
         //displaying messageEvent 
        echo $_SESSION['messageEvent']; 
        unset ($_SESSION['messageEvent']);
    ?>
</div>
<!-- closing if condition -->
<?php endif?>


    <div class="login-form">
         <div class="main-div">

    <form method="POST" action="ProcessEvent.php">

     <!-- Id is there but is hidden  -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">

        <!-- Textfield to enter Date or display Date if contain in $date -->
        <div class="form-group">  
            <label class="b891"> Date</label>
            <input type="date" name="Dates" value = <?php echo $date?> required>
        </div>
        <br>

        <!-- Textfield to enter Event Name or display eventName if contain in $eventName -->
        <div class="form-group">
            <label class="b891"> Event Name </label>
            <input type="text" name="eventName" value = <?php echo $eventName?> >
        </div>
        <br>

        <!-- Textfield to enter Event Details or display Events Details if contain in $eventDetails-->
        <div class="form-group">
        <label class="b891" style="float:left"> Events Details </label>
        <textarea rows="6" cols="60" name="details"> <?php echo $eventDetails?></textarea> 
      
        </div>
        <!--check $update is true or false which is declared in ProcessEvent.php  -->
        <?php if($update): ?>

        <!-- Display the update button if $update is true -->
        <input type="submit" class="btn btn-info" name="update" id="btn" value="Update"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHUSURBVEhLtdbPK2VhHMfxazA2fsVOiY0UEQsWsxCmmUaikL1EUXaUvZ2FmWKBlb/AimaaacqUBUnyYyMr8nNjoWzk5/tz9XS/zjm3e84d91Ovuuf0nOd7n3vO+T43FjG1mEVh/CiDqcMzztCnE++ZD/iGaaxDhZwVVOC/koUBnMBO7nWLCegLRU4x/iBoYq9z9CNySrGHoEmvzedHzKEILh8RqqiW/wt2ck24gGq4h2EXTbApwF88IWWxYdgiN2iDSxXGkRM/SiQf23DXaeV2pW+iZdsb/4DPCJsluGtlCoH5CjtwEVGiFdh7qC8dmB+whWoQNd9h51An8eU33AC9+emkE7ZQL3zZgRuwqRNppBG20Bh82YAbsK8TaaQZttAgfFmGG6C2koeoGYIt1AFf1K/soB5EzU+46/V6lMAXvfm2kNpQNsKmBeoK7vp/SJpV2GIzCIrajY22imPYa7uQNPW4gwZeoAE2uZiEOrtLO05hi6whZUZwiMr4USKfoKdREx1gFGqitoBcoQyhoibpor1pHuri3km99KKrw0eOWsglgib10vZSjrSjm5psO9cqVaAb7xL9lHoC76ECR2iFftaMRL1sC/o3lPFou//y+jFsYrEXv3u+PgWqbfsAAAAASUVORK5CYII=">
        <?php else: ?>

        <!-- Display the Save button if $update is false -->
        <input type="submit" class="btn btn-info" id="btn" value="Post" name="Post">
        <?php endif; ?>

    </form>
    </div>
    <div class="row"> 
        <div class="col-sm-2 col-md-1"></div>
        <div class="col-sm-10 col-md-9">
             <!-- table created -->

    <table class="eventTable">

<!-- first row of the table -->
<thead>
    <th height="50" > Dates </th>
    <th> Event Name </th>
    <th> Event Details </th>
    <th> Action </th>
</thead>

<!-- store all the data of events table in array called $row and using while Loop condition until it contain value -->
<?php  while($row = mysqli_fetch_array($result)): ?>

<tr>
<!-- Displaying Date, EventName and EventDetails in each row from 'report' table -->
<td height="100" width="100"><?php echo $row['Date']; ?></td>
<td  height="100" width="100"><?php echo $row['EventName']; ?></td>
<td  height="100"><?php echo $row['EventDetails']; ?></td>

<!-- this column display edit and delete option -->
<td  height="100" width="200"> 

<!-- passing event id to EventPost.php using GET method for Edit Option -->
<a href="EventPost.php?editId=<?php echo $row['ID'];?>" class="btn btn-info" id="btn"> Edit </a>

<!-- Passing event id, date and eventName to ProcessEvent.php using GET method for delete option -->
<a href="ProcessEvent.php?idEvent=<?php echo $row['ID'];?>&date=<?php echo $row['Date'];?>&EventName=<?php echo $row['EventName'];?>" class="btn btn-danger" id="btn"> Delete </a>
</td>
</tr>

<!-- closing while condition -->
<?php endwhile; ?>

</table>

        </div>
    </div>

   
    </div>
    </div>
    <?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
