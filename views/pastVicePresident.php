<?php
    // needed for connection of database which is contain in sql.php
    include_once('admin/sql.php');

    // using header html in Templates folder
    include('Templates/header2.html'); 

    // check if there is any other page Number rather than 1 if not then set default to page number to 1
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    // number of recrod to display in a page
    $no_of_records_per_page = 10;

    // used in Limit method in query
    $offset = ($pageno-1) * $no_of_records_per_page;

    // this query will display total record in given table
    $total_pages_sql = "SELECT COUNT(*)FROM `pastemployee` WHERE `Position` ='Vice President'";
    // executng above query
    $result = mysqli_query($con,$total_pages_sql);

    // fetching index 0 array of above result
    $total_rows = mysqli_fetch_array($result)[0];

    // calculating total page we might make for pagination
    $total_pages = ceil($total_rows / $no_of_records_per_page);

  
   /* This query is selecting all data from table 'member' which is order by ID(report-id) in descending order */
    $queryPast ="SELECT * FROM `pastemployee` WHERE `Position` ='Vice President' ORDER BY `ID` DESC LIMIT $offset, $no_of_records_per_page";

     // to run above query
    $resultPast = mysqli_query($con,$queryPast);


?>

    <!-- The Content Area -->
    <!-- Officers List -->
    <div class="container">
        <div class="container content">
            <div class="ff8300 officer"><h2>MAFS Past Officer</h2> <h3>Vice President</h3></div> 
                <?php 
                // creating variable for index  for array named pastEmployee
                    $x = 0;
                    $pastEmployee = [];
                While ($row = mysqli_fetch_array($resultPast)){
                // storing all the information of the pastEmployee table in the array as 'key:value' pair
                    $pastEmployee[$x]['Position'] = $row['Position'];
                    $pastEmployee[$x]['Name'] = $row['Name'];
                    $pastEmployee[$x]['University'] = $row['University'];
                    $pastEmployee[$x]['Year'] = $row['Year'];
                    $x++;
                };
                
    //  Using loop to display infromation in pastEmployee table from the array named pastEmployee
        for ($i = 0 ; $i < count($pastEmployee); $i++) {?>
            <!-- ROW 1 -->
            <div class="row mediaBody">
                
                <div class="col-md-1"></div>
                <div class="col-md-3" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <!-- Displaying dummy image -->
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            </a>
                        </div>
                        <div class="media-body">
                    <!-- Displaying Position, Name, University and Year which is stored in associate array -->
                            <div class="media">                                    
                                        <div class="media-heading">
                                                <h5 class="b891" style="font-size:16.5px;"><?php echo($pastEmployee[$i]['Name']);?></h5>
                                                <p class="memberText"><?php echo($pastEmployee[$i]['University']);?></p>
                                                <p class="memberText">Year Served: <?php echo($pastEmployee[$i]['Year']);?></p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php 
                     $i++;
                    // Checking if value of i is less than total pastEmployee counts
                    if ($i >= count($pastEmployee)){
                        // exit from the for loop
                        break;
                    }
                    ?>
            
            <div class="col-md-2"></div>
            <div class="col-md-3" style="padding-top:1em;">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                               <!-- Displaying dummy image -->
                            <img class="media-object" src="../public/images/user.png" alt="user">
                        </a>
                    </div>
                    <div class="media-body">
                        
                    <!-- Displaying Position, Name, University and Year which is stored in associate array -->
                        <div class="media">                                    
                                    <div class="media-heading">
                                            <h5 class="b891" style="font-size:16.5px;"><?php echo($pastEmployee[$i]['Name']);?></h5>
                                            <p class="memberText"><?php echo($pastEmployee[$i]['University']);?></p>
                                            <p class="memberText">Year Served: <?php echo($pastEmployee[$i]['Year']);?></p>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
                <hr>        
                <?php }?>
                    </div>
                
                </div>
        
        <div class="row">
            <div class= "col-md-5"></div>
            <div class="col-md-6"> 
                <!-- pagination -->
                <ul class="pagination">
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
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