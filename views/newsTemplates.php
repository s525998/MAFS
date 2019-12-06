<?php
    // connecting with database
    include('admin/sql.php');

    // Using session
    session_start();

    // Header for the news templates from templates Folder
    include('Templates/header2.html'); 

    // Getting all the record from the 'events' table
    $query = "SELECT * FROM `events` ORDER BY CONVERT(Date, DateTime) ASC ";
    $result = mysqli_query($con,$query);
?>
<?php 
    // getting record from the 'annoucemnet' table from given criteria and storing improtant information

    $queryJeff = "SELECT * FROM `announcements` WHERE `Type`='jeffCity' ORDER BY ID DESC";
    $resultJeff = mysqli_query($con,$queryJeff); 
    // $rowJeff = mysqli_fetch_array($resultJeff);

    $queryLeg = "SELECT * FROM `announcements` WHERE `Type`='legislationUpdate' ORDER BY ID DESC ";
    $resultLeg = mysqli_query($con,$queryLeg); 

    $queryPrac = "SELECT * FROM `announcements` WHERE `Type`='bestPractices' ORDER BY ID DESC ";
    $resultPrac = mysqli_query($con,$queryPrac); 
    
?>


<div class="row">
        
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-6"> 
            <!-- Displaying news from Jeff City -->
        <div class="jeffCity">
            <div class="newsHeader"> News from Jeff City</div>
            <div class="textIn">
                    <?php
                     while($rowJeff = mysqli_fetch_array($resultJeff)):
                        // Otherwise there must be file that is downloadable which need to be displayed
                        $jeffNews = $rowJeff['fileName'];
                        if ($jeffNews == null){
                            break;
                        }
                        $showJeff= "../uploadFile/post/jeffNews/$jeffNews";
                ?>
                <a href="<?php echo $showJeff;?>" target = "_blank"><?php echo $jeffNews;?>
                <br>
                <iframe src="<?php echo $showJeff;?>" style="margin:auto; width:98%; height:75vw;" type="application/pdf"> </iframe>
                <hr style ="border: 2px solid">
                <?php endwhile?>
            </div>
        </div>
    </div>
    </div>
    </div>
<br>
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-6">
                <!-- Displaying Legislation Update -->
                <div class="legislation">
                    <div class="newsHeader"> Legislations Update</div>
                    <div class="textIn"> 
                             <?php 
                     while($rowLeg = mysqli_fetch_array($resultLeg)):
                            // Otherwise there must be file that is downloadable which need to be displayed
                                $legNews = $rowLeg['fileName'];
                                if ($legNews == null){
                                    break;
                                }
                                $showLeg= "../uploadFile/post/legNews/$legNews"; 
                            ?>
                            <a href="<?php echo $showLeg;?>" target = "_blank"><?php echo $legNews;?>
                            <br>
                            <iframe src="<?php echo $showLeg;?>" style="margin:auto; width:100%; height:75vw;" type="application/pdf"> </iframe>
                            <hr style ="border: 2px solid">
                            <?php endwhile?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
            <div class="col-md-8 col-sm-6">
                <div class="memberSuccess">
                    <!-- Dispalying the Best Practices -->
                    <div class="newsHeader">Best Practices </div>
                    <div class="textIn"> 
                        <?php
                        while($rowPrac = mysqli_fetch_array($resultPrac)):
                        // Otherwise there must be file that is downloadable which need to be displayed
                        $bestPrac = $rowPrac['fileName'];
                        if ($bestPrac == null){
                            break;
                        }
                        $showBestPrac= "../uploadFile/post/bestPrac/$bestPrac"; 
                    ?>
                    <a href="<?php echo $showBestPrac;?>" target = "_blank"><?php echo $bestPrac;?>
                    <br>
                    <embed src="<?php echo $showBestPrac;?>" style="margin:auto; width:100%; height:75vw;" type="application/pdf"/>
                    <hr style ="border: 2px solid">
                    <?php endwhile?>
                    </div>
                </div>
            </div>
        </div>



 <!-- Footer -->
 <footer style="margin-top:2em; text-align:center" class="footer">
        <div class="container">
            <span class="text-muted">Missouri Association of Faculty Senates</span>
        </div>
</footer>
</body>
</html>