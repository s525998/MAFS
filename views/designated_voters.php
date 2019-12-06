<?php
  // needed for connection of database which is contain in sql.php
  include_once('admin/sql.php');

   // using header html in Templates folder
   include('Templates/header2.html'); 

    /* This query is selecting all data from table 'member' which is order by ID(report-id) in descending order */
    $queryVoter="SELECT * FROM `voter` ORDER BY `UniName`";

    // to run above query
   $resultVoter = mysqli_query($con,$queryVoter);
 
   // creating variable for index  for array named voter
       $x = 0;
       $voter = [];
   While ($row = mysqli_fetch_array($resultVoter)){
   // storing all the information of the voter table in the array as 'key:value' pair
       $voter[$x]['UniName'] = $row['UniName'];
       $voter[$x]['vName1'] = $row['vName1'];
       $voter[$x]['vName2'] = $row['vName2'];
       $x++;
   };
?>
  
  <!-- The Content Area -->

     <!-- Officers List -->
     <div class="container-fluid" style="padding-top: 3em;">
        <!-- Advisory Council -->
        <div class="container content">
            <div class="ff8300 officer"> <u>Designated Voters </u></div> 
            <?php
                $i = 0;
                //  Using loop to display information in university table from the array named university
                while($i <= count($voter)) {  
                    ?>
            <!-- ROW 1 -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4 col-sm-6">          

                    <div class="media-body">
                        <h4 class="media-heading" style="padding-top:2em;"><?php echo $voter[$i]['UniName']; ?></h4>
                        <?php if($voter[$i]['vName1'] !=  null){?>
                        <p class="memberText"><?php echo $voter[$i]['vName1']; ?></p>
                        <?php } ?>
                        <?php if($voter[$i]['vName2'] !=  null){?>
                        <p class="memberText"><?php echo $voter[$i]['vName2']; ?></p>
                        <?php }?>
                        <?php
                            $i = $i + 1;
                            // Checking if value of i is less than total voter counts
                            if ($i > count($voter)){
                                // exit from the for loop
                                break;
                            } 
                        ?>
                     </div>
                </div>
                <div class="col-md-4 col-sm-6">

                        <div class="media-body">
                            <h4 class="media-heading" style="padding-top:2em;"><?php echo $voter[$i]['UniName']; ?></h4>
                            <?php if($voter[$i]['vName1'] !=  null){?>
                            <p class="memberText"><?php echo $voter[$i]['vName1']; ?></p>
                            <?php } ?>
                            <?php if($voter[$i]['vName2'] !=  null){?>
                            <p class="memberText"><?php echo $voter[$i]['vName2']; ?></p>
                            <?php }?>
                            <?php
                                $i = $i + 1;
                                // Checking if value of i is less than total voter counts
                                if ($i > count($voter)){
                                    // exit from the for loop
                                    break;
                                }?>
                 
                        </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
<!-- Footer -->
    <footer style="margin-top:3em; text-align:center" class="footer">
        <div class="container">
            <span class="text-muted">Missouri Association of Faculty Senates</span>
        </div>
    </footer>
</body>

</html>