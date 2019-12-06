
<?php
    // needed for connection of database which is contain in sql.php
    include_once("sql.php");

    session_start();
    
    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
            

// using header from the Templates folder
include("../Templates/headerAdmin.html");

//creating variable to store data from GET method
$id = $_GET['ID'];
$next = $_GET['Next'];
$previous = $_GET['Previous'];

// if condition for checking whether ID is empty or not
if (isset($_GET['ID'])){
    $id = $_GET['ID'];

// select all from 'mafs_goals' table for given criteria 
    $queryTitle = "SELECT * FROM `mafs_goals` WHERE `ID` = $id";
    $resultTitle = mysqli_query($con,$queryTitle);
}
?>

<!-- storing data from $resultTitle to an array $rowTitle and using while condition   -->
<?php  while ($rowTitle = mysqli_fetch_array($resultTitle)): ?>

<!-- display Title from $rowTitle -->
<h3 style=" padding-left:20em; padding-bottom: 4px;"> <?php echo($rowTitle['Title']);?></h3>

<!-- select data from strategicgoal table from given criteria -->
<?php $queryStra = "SELECT * FROM `strategicgoal` WHERE `goal_id` = '".$rowTitle['ID']."' "; 
        $resultStra = mysqli_query($con,$queryStra); ?>

        <!-- orderedline attribute to display data in list -->
        <ol  type="1" style=" margin-left: 3.5em;">

    <!-- storing data from query associate with '$resultStra' to an array $rowStra and using while condition   -->
        <?php while ($rowStra = mysqli_fetch_array($resultStra)): ?>
  
        <!-- Display list of Action  -->
            <li class="straAction"> <?php echo $rowStra['Action']; ?> </li>
       
        <?php
        /* Select data from 'mafsaction' table from given criteria  */ 
            $queryMafs = "SELECT * FROM `mafsaction` WHERE  `strategic_Id` = '".$rowStra['ID']."' ";
            $resultMafs = mysqli_query($con, $queryMafs); ?>

            <ol type="i" class="mafsAction">

    <!-- storing data from query associate with '$rowMafs' to an array $rowMafs and using while condition   -->
            <?php while ($rowMafs = mysqli_fetch_array($resultMafs)): ?>
            <!-- It contain list of action that has link which will send GET request to reportMember.php  -->
            <li style="padding-bottom: 10px;"> <a href ="reportMember.php?ID=<?php echo $rowMafs['ID'];?>"><?php echo $rowMafs['action']; ?> </a></li>
          
          <!-- Clsoing while condition for `$rowMafs`-->
            <?php endwhile ?>
            </ol>
            <!-- Closing while condition for `$rowStra` -->
        <?php  endwhile ?>
        </ol>
         <!-- Closing while condition for `$rowTitle` -->
        <?php endwhile ?>

        <!-- Form Field which contain two button previous and next which will send action to page `ProcessEvent.php` -->
            <form action="ProcessEvent.php" method="POST">
                <input type="hidden" name= "id" value="<?php echo $id; ?>">
                <!-- check if '$previous' is true -->
                <?php if($previous){ ?>
                <button type= "submit"  style = " margin-left: 7em; "class="btn btn-primary" name ="previous"> Previous </button>
                <?php }  ?>

                 <!-- check if '$next' is true -->
                <?php if($next){?>
                <button type="submit" style = "float:right;" class="btn btn-primary" name="next">Next</button>
                <?php }?>
            </form>
           
        <?php 
            /* If user is not logged and some visit this page then it redirect to login.php*/
            }else{
            header('location: ../login.php'); 
        }?>
