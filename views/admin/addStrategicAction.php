<?php
     include("sql.php");
     session_start();
     include("../Templates/headerAdmin.html");
     error_reporting(E_ERROR | E_PARSE);
    $numAction = $_SESSION['numAction'];
    $planTitle = $_SESSION['title'];
    $isMafs = false;
    $sqlfindGoal = "SELECT * FROM `mafs_goals` WHERE $planTitle = mafs_goals.Title";
    $resultfindGoal = mysqli_query($con,$sqlfindGoal);

    if ($resultfindGoal){
        $msg = "this is i want";
        header('');
    }
    if (isset($_POST['createMafsAction'])){
   
    
        if ($resultfindGoal){
            $msg ="Hello";
            $row = mysqli_fetch_array($resultfindGoal);
        }
    }
     ?>

