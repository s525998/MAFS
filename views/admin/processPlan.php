<?php
    // needed for connection of database which is contain in sql.php
     include("sql.php");

    //temporarily storing data
     session_start();

     // created variable
     $id = "";
     $planTitle="";
     $planGoals="";
     $isAction = false;
     $isMafs = false;
     $numAction = 0;
   
    //  Check whether creatAction is empty or not 
    if (isset($_POST['createAction'])){
                    
        $planTitle = $_POST['planTitle'];
        $planGoals = $_POST['planGoals'];
        $isAction = true;
        $numAction = $_POST['numAction'];
        $isMafs = false;
        $_SESSION['numAction'] = $_POST['numAction'];
        $_SESSION['title'] = $_POST['planTitle'];

        $sqlMafsGoal = "INSERT INTO `mafs_goals`( `Title`, `Goal`) VALUES ('$planTitle','$planGoals')";
        $resultMafsGoal = mysqli_query($con,$sqlMafsGoal);
        
        if ($resultMafsGoal){
            $sqlfindGoal = "SELECT * FROM `mafs_goals` WHERE $planTitle = mafs_goals.Title";
            $resultfindGoal = mysqli_query($con,$sqlfindGoal);
                if ($resultfindGoal){
                    $row = mysqli_fetch_array($resultfindGoal);
                    // $msg= "this is working1";
                }
        }
        header('location: addPlans.php');        
    }

    if(isset($_POST['createMafsAction'])){
        $isMafs = true;
        $planTitle = $_POST['planTitle'];
        $planGoals = $_POST['planGoals'];
        $isAction = true;
        $stragNum = 1;
        $arrayNum =  0;
        $numAction = $_SESSION['numAction'];
        $num1 = $numAction;
     
        while($num1 > 0){
                // foreach ($_POST['mafsActions'] as $mafsActions){
                //     $mafsActionNum[$arrayNum] = $mafsActions;
                //     $arrayNum = $arrayNum + 1;
                //     $num1 = $num1 - 1;
                // }
        //     $mafsActionNum[$stragNum] = $_POST['mafsActions'.$arrayNum];
        //     $numAction = $numAction - 1;
        //     $arrayNum = $arrayNum + 1;
        // }
                    $mafsActionNum[$arrayNum] = $_POST['mafsActions'.$stragNum];
                    $arrayNum = $arrayNum + 1;
                    $stragNum = $stragNum + 1;
                    $num1 = $num1 - 1;
    }

    $sqlfindGoal = "SELECT * FROM `mafs_goals` WHERE `Title` = $planTitle";
    $resultfindGoal = mysqli_query($con,$sqlfindGoal);
        if ($resultfindGoal){
            $msg = "Hey it is working";
            $row = mysqli_fetch_array($resultfindGoal);
        }

    if (is_array($_POST['strgAction'])){
        
        foreach ($_POST ['strgAction'] as $action){
                    $sqlStrategicGoal = "INSERT INTO `strategicgoal`(`Action`) VALUES ('$action')";
                    $resultStrategicGoal =  mysqli_query($con,$sqlStrategicGoal);
                    if ($resultStrategicGoal){
                        $msg1 = "IS it working?";
                    }
                }
            }
        header('location: addPlans.php');    
    }
    