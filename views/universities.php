<?php
  // needed for connection of database which is contain in sql.php
  include_once('admin/sql.php');

   // using header html in Templates folder
include('Templates/header2.html'); 

   /* This query is selecting all data from table 'member' which is order by ID(report-id) in descending order */
   $queryUniversity ="SELECT * FROM `university` ORDER BY `UniName`";

   // to run above query
  $resultUniversity = mysqli_query($con,$queryUniversity);

  // creating variable for index  for array named pastEmployee
      $x = 0;
      $university = [];
  While ($row = mysqli_fetch_array($resultUniversity)){
  // storing all the information of the pastEmployee table in the array as 'key:value' pair
      $university[$x]['UniName'] = $row['UniName'];
      $university[$x]['FacultyLink'] = $row['FacultyLink'];
      $university[$x]['isMember'] = $row['isMember'];
      $x++;
  };
?>


     <!-- The Content Area -->
    <div class="container">
        <div class="officer ff8300 "> <u>Missouri Universities</u></div> 
        <div class="row">
            <div class="col-md-2"></div> 
            <!-- list of member insitution of MAFS -->
            <div class="col-md-4 col-sm-6">
        <?php
            $i = 0;
            //  Using loop to display information in university table from the array named university
            while($i <= count($university)) { 
                ?>
            <!-- each of list link to faculty senate  -->
                <ul >
                    <?php 
                     if($university[$i]['UniName'] == null){
                         break;
                     } 
                     if($university[$i]['isMember'] == '1'){
                            $style = 'circle';
                    } else{
                        $style = 'square';
                    } ?>
                    <li style="padding-bottom:1em; padding-top:1em; color: #0e7f80 ; list-style-type: <?php echo $style;?>">
                            <h4>
                                <a class="e7f80" href="<?php echo $university[$i]['FacultyLink']?>" target="_blank"><?php echo $university[$i]['UniName'];?></a>
                            </h4>
                    </li>
                 </ul>
                <?php 
                    $i = $i + 2;
                // Checking if value of i is less than total university counts
                if ($i > count($university)){
                    // exit from the for loop
                    break;
                } 
            }?>
            </div>
            <div class="col-md-4 col-sm-6">
                
                <!-- Each of list link to there faculty senate -->
                <ul>
                <?php
                  $i = 1;
                //  Using loop to display information in university table from the array named university
                while($i <= count($university)) { 
                    ?>
                    <?php
                        if($university[$i]['UniName'] == null){
                            break;
                        }  
                        if($university[$i]['isMember'] == '1'){
                             $style = 'circle';
                        } else{
                            $style = 'square';
                        } ?>
                        <li style="padding-bottom:2em; padding-top:1em; color: #0e7f80; list-style-type: <?php echo $style;?>">
                              <h4>
                                 <a class="e7f80" href="<?php echo $university[$i]['FacultyLink']?>" target="_blank"><?php echo $university[$i]['UniName'];?></a>
                              </h4>
                        </li>
                        <?php 
                            $i = $i + 2;
                            // Checking if value of i is less than total university counts
                            if ($i > count($university)){
                                // exit from the for loop
                                break;
                            } 
                        } ?>

                    </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-8 col-md-8"></div>
            <div class="col-sm-4 col-md-4">
                <ul style="font-size:15px; font-color:green">
                    <li style="list-style-type:circle;"> Member institutions of MAFS  </li>
                    <li style="list-style-type:square;"> Non-Member institutions of MAFS</li>
                </ul>
            </div>
        </div>
    
    </div>
    <footer style="margin-top:2em; text-align:center" class="footer">
                <div class="container">
                    <span class="text-muted">Missouri Association of Faculty Senates</span>
                </div>
     </footer>
    </body>

</html>