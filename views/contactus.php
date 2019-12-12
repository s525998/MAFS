<?php
// Database connection 
    include('admin/sql.php');
// header html from the Templates folder
    include('Templates/header2.html'); 

// selecting the President position from the current_employee table
    $queryPres= "SELECT * FROM `current_employee` WHERE `Position` = 'President'";
// running above query
    $resultPres = mysqli_query($con,$queryPres);
    $rowPres = mysqli_fetch_array($resultPres);
    $vacantPres = $rowPres['isVacant'];

// selecting the Vice President position from the current_employee table
    $queryVPres= "SELECT * FROM `current_employee` WHERE `Position` = 'VicePresident'"; 
// running above query
    $resultVPres = mysqli_query($con,$queryVPres); 
    $rowVPres = mysqli_fetch_array($resultVPres); 
    $vacantVPres = $rowVPres['isVacant']; 

// selecting the Secretary Treasurer position from the current_employee table
    $querySTres= "SELECT * FROM `current_employee` WHERE `Position` = 'SecretaryTreasurer'"; 
// running above query
    $resultSTres = mysqli_query($con,$querySTres);
    $rowSTres = mysqli_fetch_array($resultSTres);
    $vacantSTres = $rowSTres['isVacant'];

    
// selecting the Mmeber At Large position from the current_employee table
    $queryMemLarge= "SELECT * FROM `current_employee` WHERE `Position` = 'MemberAtLarge'"; 
     // running above query
    $resultMemLarge = mysqli_query($con,$queryMemLarge);
    $rowMemLarge = mysqli_fetch_array($resultMemLarge);
    $vacantMemLarge = $rowMemLarge['isVacant'];
?>

    <!-- The Content Area -->
    <!-- Officers List -->
    <div class="container">
        <div class="container content">
            <div class="ff8300 officer" ><h2> <u>Contact Information </u></h2></div> 
            <!-- ROW 1 -->
            <div class="row mediaBody">
                <div class="col-md-2"></div>
                <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-body">
                            <!-- All available information of the President  -->
                            <h3 class="media-heading" style="padding-top:1em;">President</h3>
                            <div class="media">    
                                <div class="media-heading">
                                    <?php if(!($vacantPres)):?>                                
                                            <h4 class="b891"><?php echo($rowPres['Officer_Name'])?></h4>
                                            <p class="memberText"><?php echo($rowPres['E-Mail'])?></p>
                                            <p class="memberText">pres@MAFS.org</p>
                                    <?php else:?>
                                    <!-- If information is not available then just show vacant -->
                                        <h5 class="b891">Vacant</h5>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-body">
                            <!-- All available information of the Vice President  -->
                            <h4 class="media-right" style="padding-top:1em;"> Vice President</h4>
                            <div class="media">
                                <div class="media-right">
                                    <div class="media-heading" >
                                    <?php if(!($vacantVPres)):?> 
                                        <h4 class="b891"><?php echo($rowVPres['Officer_Name'])?></h4>
                                        <p class="memberText"><?php echo($rowVPres['E-Mail'])?></p>
                                        <p class="memberText">vp@MAFS.org</p>
                                    <?php else:?>
                                    <!-- If information is not available then just show vacant -->
                                        <h5 class="b891">Vacant</h5>
                                    <?php endif?>
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Row 2-->
            <div class="row mediaBody">
                <div class="col-md-2"></div>
                <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-body">
                        <!-- All available information of the Secretary Treasure  -->
                            <h3 class="media-heading" style="padding-top:1em;">Secretary/Treasurer</h3>
                                <div class="media">
                                    <div class="media-body">
                                        <div class="media-heading">
                                        <?php if(!($vacantSTres)):?> 
                                        <h4 class="b891"><?php echo($rowSTres['Officer_Name'])?></h4>
                                            <p class="memberText"><?php echo($rowSTres['E-Mail'])?></p>
                                            <p class="memberText">MAL@MAFS.org</p>
                                        <?php else:?>
                                    <!-- If information is not available then just show vacant -->
                                            <h5 class="b891">Vacant</h5>
                                        <?php endif?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-body">
                            <!-- All available information of the Member At Large  -->
                            <h3 class="media-heading" style="padding-top:1em;">Member at Large</h3>
                            <div class="media">
                                <div class="media-body">
                                    <div class="media-heading">
                                    <?php if(!($vacantMemLarge)):?> 
                                    <h4 class="b891"><?php echo($rowMemLarge['Officer_Name'])?></h4>
                                        <p class="memberText"><?php echo($rowMemLarge['E-Mail'])?></p>
                                        <p class="memberText">secretary@MAFS.org</p>
                                    <?php else:?>
                                <!-- If information is not available then just show vacant -->
                                        <h5 class="b891">Vacant</h5>
                                    <?php endif?>
                                    </div>
                                </div>
                            </div>
                    
                        </div>
                    </div>
                </div>
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