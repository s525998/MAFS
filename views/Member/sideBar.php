<?php 
     // needed for connection of database which is contain in sql.php
     include_once('../admin/sql.php');
     
     session_start();

     $memberId = $_SESSION['id'];
     $onlyItemQuery = "SELECT `numTopic`, `numAgenda` FROM `member` WHERE `ID` = $memberId ";
     $totalTopicQuery = "SELECT COUNT(*) FROM `topic`";
     $totalAgendaQuery = "SELECT COUNT(*) FROM `meetingagendaminute`";

     $onlyItem = mysqli_query($con,$onlyItemQuery);
     $totalTopic = mysqli_query($con,$totalTopicQuery);
     $totalAgenda = mysqli_query($con,$totalAgendaQuery);

      $rowFetchArray = mysqli_fetch_array($onlyItem);
      $unlookedTopic = $totalTopic - $rowFetchArray['numTopic'];
      $unlookedAgenda = $totalAgenda - $rowFetchArray['numAgenda'];

      $insertItemQuery ="INSERT INTO `member`(`numTopic`, `numAgenda`) VALUES ('$totalTopic', '$totalAgenda')"
      $insertItem = mysqli_query($con,$insertItemQuery);

?>



<div class="container">
    <img  src="../../public/images/logo.jpg " height="75" style="padding-left:10em;"> 
    <div class="sidebar">
        <a href="mainPage.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <button class="dropdown-btn">Discussion   
            <?php if ($unlookedTopic == 0) {?>
          <span class="label label-success">  </span>
            <?php } else { ?>    
          <span class="label label-success"> <?php $unlookedTopic  ?> </span>
          <?php }?>
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                    <a href="createTopic.php">Create Discussion</a>
                    <a href="viewTopics.php">View Responses</a>
              </div>

              
              <button class="dropdown-btn">Strategic Plan
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <a href ="bluePrintHS.php">Blue Print for Higher Ed</a>
                <a href="strategicAction.php">MAFS Plan</a>
              </div>
    
        <a href="reportList.php"> MAFS Reports</a>

        <a href="meetingReport.php"> Meeting Reports</a>

        <a href = "agendaMinute.php">Agenda/Minute   
        <?php if ($unlookedAgenda == 0) {?>
          <span class="label label-success">  </span>
            <?php } else { ?>    
          <span class="label label-success"> <?php $unlookedAgenda  ?> </span>
          <?php }?>
        </a>
        
        <button class="dropdown-btn">Advocates
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-container">
                <a href="https://www.aaup.org/" target="_blank">AAUP</a>
                <a href ="https://agb.org/" target="_blank">AGB</a>
          </div>

        <a href = "password.php"> Change Password</a>
        <a href="logOut.php"> Log Out</a>
</div>
