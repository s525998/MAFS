<?php
// needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){

    // including member header from Templates Folder
    include("../Templates/headerMember.html");

    // storing Session data set from another page 
    $memberID = $_SESSION['id'];

    // Setting time zone to store current date
    date_default_timezone_set("America/Chicago"); 

    //creating variable
    $msg = "";

    // Ckeck if there is GET request which provide ID value
    if (isset($_GET['ID'])){
     // Storing data from the GET request 
        $id = $_GET['ID'];

    // query to select all field from table 'mafs_goals' under given condition
        $queryTitle = "SELECT * FROM `mafs_goals` WHERE `ID` = $id";
        $resultTitle = mysqli_query($con,$queryTitle); // executing query

        $_SESSION['ID'] = $_GET['ID'];

        // Check if the query execute
        if($resultTitle){
            $msg ="";
        }
        else{
            $msg ="All your report is submitted.";
        }
    }   
?>

<div class= "container-fluid">
    <div class="mafs-div">
            <!-- Display the above message  -->
        <div style="margin-left: 15em; font-size: 20px;"><?php echo ($msg); ?></div>     

    <!-- creating a array 'rowPost' that contain all the data from query associate with '$resultTitle' -->
        <?php while($rowTitle = mysqli_fetch_array($resultTitle)) : ?>

            <!-- Displaying Title and Goal from 'mafs_goals' table  -->
            <h3 style=" padding-left:12em; padding-bottom: 15px;"> <?php echo($rowTitle['Title']); ?></h3>
            <p style="padding-top: 5px; padding-bottom: 5px; font-size: 17px;"> <b>Goal </b>: <?php echo($rowTitle['Goal']);?> </p>

        <?php 
            // query to select all field from table 'strategicgoal' under given condition
            $queryStraAction = "SELECT * FROM `strategicgoal` WHERE  `goal_id` = '".$rowTitle['ID']."' ";
            $resultStraAction = mysqli_query($con,$queryStraAction); // executing above query
        ?>

        <b><p style="padding-left: 1em; padding-bottom: 10px; font-size:16px;"> Strategic Action </p> </b>

        <!-- Creating Form -->
        <form action= "ProcessMember.php" method = "POST">
            <?php $number = 1; ?>   

        <!-- creating a array 'rowStraAction' that contain all the data from query associate with '$resultStraAction' -->
            <?php while($rowStraAction = mysqli_fetch_array($resultStraAction)) : ?>
        
        <!-- Dispalying Title id from 'mafs_goals' table  and Strategic Action from 'strategicgoal' table-->
            <div class="form-group">
                <label class="b891" style="padding-bottom: 10px;">
                    <?php echo ($rowTitle['ID'] . "." . $number); ?> 
                    <b><?php echo $rowStraAction['Action']; ?></b>
                </label> <br>
            
        <!-- query to select all field from table 'mafsaction' under given condition -->
            <?php $queryMafsAction = "SELECT * FROM `mafsaction` WHERE  `strategic_Id` = '".$rowStraAction['ID']."' ";
                $resultMafsAction = mysqli_query($con,$queryMafsAction); // executing query
            ?>
        
        <!-- creating a array 'rowMafs' that contain all the data from query associate with '$resultMafsAction' -->
            <?php while($rowMafs = mysqli_fetch_array($resultMafsAction)) : ?>

        <!-- Textarea contain plavceholder which explain action from table 'mafsaction'  -->
            <textarea cols="100" rows="6" name="mafsAction[<?php echo $rowMafs['ID']?>]" placeholder= "<?php echo $rowMafs['action'];?>. &#10;&#10;Type 'N\A' or 'n\a' if you don't have report available. " style="padding-bottom: 10px;" required></textarea> <br>

        <!-- closing while loop for $rowMafs -->
            <?php  endwhile ?>
            <?php $number = $number + 1; ?>
        </div>

        <!-- Closing while loop condition for $rowStraAction  -->
        <?php endwhile ?>
        <button type="submit" class="btn btn-primary" name="Submit">Submit </button> 

        <!-- This link will take back to reportList.php page which has list of Title -->
        <a style="float:right;" href="reportList.php">Go Back to List </a> 

    </form>

    <!-- Closing while loop condition for $rowTitle  -->
    <?php endwhile ?>
    </div>
</div>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>



