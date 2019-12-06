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
// creating array and storing some value in variable
    $vacantPres = $rowPres['isVacant'];
    $hasPresPic= $rowPres['hasPic'];
    $PresPic = $rowPres['picture'];

// selecting the Vice President position from the current_employee table
    $queryVPres= "SELECT * FROM `current_employee` WHERE `Position` = 'VicePresident'"; 
// running above query
    $resultVPres = mysqli_query($con,$queryVPres); 
    $rowVPres = mysqli_fetch_array($resultVPres); 
// creating array and storing some value in variable
    $vacantVPres = $rowVPres['isVacant']; 
    $hasVPresPic = $rowVPres['hasPic'];
    $VPresPic = $rowVPres['picture'];

// selecting the Secretary Treasurer position from the current_employee table
    $querySTres= "SELECT * FROM `current_employee` WHERE `Position` = 'SecretaryTreasurer'"; 
// running above query
    $resultSTres = mysqli_query($con,$querySTres);
    $rowSTres = mysqli_fetch_array($resultSTres);
// creating array and storing some value in variable
    $vacantSTres = $rowSTres['isVacant'];
    $hasSTresPic = $rowSTres['hasPic'];
    $STresPic = $rowSTres['picture'];

    
// selecting the Mmeber At Large position from the current_employee table
    $queryMemLarge= "SELECT * FROM `current_employee` WHERE `Position` = 'MemberAtLarge'"; 
     // running above query
    $resultMemLarge = mysqli_query($con,$queryMemLarge);
    $rowMemLarge = mysqli_fetch_array($resultMemLarge);
    // creating array and storing some value in variable
    $vacantMemLarge = $rowMemLarge['isVacant'];
    $hasMemPic = $rowMemLarge['hasPic'];
    $MemPic = $rowMemLarge['picture'];
?>

    <!-- The Content Area -->
    <!-- Officers List -->
    <div class="container">
        <div class="container content">
            <div class="ff8300 officer" ><h2> <u>MAFS Executive Board </u></h2></div> 
            <!-- ROW 1 -->
            <div class="row mediaBody">
                <div class="col-md-1"></div>
                <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <!-- Check if president has picture -->
                                <?php if($hasPresPic): ?>
                                    <!-- If there is image then show it from the folder where it is uploaded -->
                                <img class="media-object img-circle" src="../uploadFile/member/<?php echo $PresPic; ?>"   height = 110 width = 90 alt="user">
                                <?php else:?>
                                        <!-- If not then display this dummy image -->
                                <img class="media-object" src="../public/images/user.png" alt="user">
                                <?php endif;?>
                            </a>
                        </div>
                        <div class="media-body">
                            <!-- All available information of the President  -->
                            <h3 class="media-heading" style="padding-top:1em;">President</h3>
                            <div class="media">    
                                <div class="media-heading">
                                        <?php if(!($vacantPres)):?>                                
                                                <h4 class="b891"><?php echo($rowPres['Officer_Name'])?></h4>
                                                <p class="memberText"><?php echo($rowPres['University'])?></p>
                                                <p class="memberText"><?php echo($rowPres['Address1'])?></p>
                                                <p class="memberText"><?php echo($rowPres['Address2'])?></p>
                                                <p class="memberText"><?php echo($rowPres['E-Mail'])?></p>
                                               
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
                        <div class="media-left">
                            <a href="#">
                         <!-- Check if Vice president has picture -->
                            <?php if($hasVPresPic): ?>
                                <!-- If there is image then show it from the folder where it is uploaded -->
                                <img class="media-object img-circle" src="../uploadFile/member/<?php echo $VPresPic; ?>"  height = 110 width = 90  alt="user">
                            <?php else :?>
                                        <!-- If not then display this dummy image -->
                                <img class="media-object" src="../public/images/user.png" alt="user">
                            <?php endif;?>
                            </a>
                        </div>
                        <div class="media-body">
                            <!-- All available information of the Vice President  -->
                            <h4 class="media-right" style="padding-top:1em;"> Vice President</h4>
                            <div class="media">
                                    <div class="media-right">
                                        <div class="media-heading" >
                                        <?php if(!($vacantVPres)):?> 
                                            <h4 class="b891"><?php echo($rowVPres['Officer_Name'])?></h4>
                                            <p class="memberText"><?php echo($rowVPres['University'])?></p>
                                            <p class="memberText"><?php echo($rowVPres['Address1'])?></p>
                                            <p class="memberText"><?php echo($rowVPres['Address2'])?></p>
                                            <p class="memberText"><?php echo($rowVPres['E-Mail'])?></p>
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
                <div class="col-md-1"></div>
                <div class="col-md-4" style="padding-top:1em;">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                         <!-- Check if Secretary Treasure has picture -->
                            <?php if($hasSTresPic): ?>
                                <!-- If there is image then show it from the folder where it is uploaded -->
                                <img class="media-object img-circle" src="../uploadFile/member/<?php echo $STresPic; ?>"  height = 110 width = 90 alt="user">
                                <?php else:?>
                                        <!-- If not then display this dummy image -->
                                <img class="media-object" src="../public/images/user.png" alt="user">
                                <?php endif;?>
                            </a>
                        </div>
                        
                        <div class="media-body">
                            <!-- All available information of the Secretary Treasure  -->
                                <h3 class="media-heading" style="padding-top:1em;">Secretary/Treasurer</h3>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="media-heading">
                                            <?php if(!($vacantSTres)):?> 
                                            <h4 class="b891"><?php echo($rowSTres['Officer_Name'])?></h4>
                                                <p class="memberText"><?php echo($rowSTres['University'])?></p>
                                                <p class="memberText"><?php echo($rowSTres['Address1'])?></p>
                                                <p class="memberText"><?php echo($rowSTres['Address2'])?></p>
                                                <p class="memberText"><?php echo($rowSTres['E-Mail'])?></p>
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
                        <div class="media-left">
                         <!-- Check if Member At Large has picture -->
                        <?php if($hasMemPic): ?>
                                <!-- If there is image then show it from the folder where it is uploaded -->
                                <img class="media-object img-circle" src="../uploadFile/member/<?php echo $MemPic; ?>"  height = 110 width = 90  alt="user">
                                <?php else:?>
                                        <!-- If not then display this dummy image -->
                                <img class="media-object" src="../public/images/user.png" alt="user">
                                <?php endif;?>
    
                        </div>
                        <div class="media-body">
                            <!-- All available information of the Member At Large  -->
                            <h3 class="media-heading" style="padding-top:1em;">Member at Large</h3>
                            <div class="media">
                                        <div class="media-body">
                                            <div class="media-heading">
                                            <?php if(!($vacantMemLarge)):?> 
                                            <h4 class="b891"><?php echo($rowMemLarge['Officer_Name'])?></h4>
                                                <p class="memberText"><?php echo($rowMemLarge['University'])?></p>
                                                <p class="memberText"><?php echo($rowMemLarge['Address1'])?></p>
                                                <p class="memberText"><?php echo($rowMemLarge['Address2'])?></p>
                                                <p class="memberText"><?php echo($rowMemLarge['E-Mail'])?></p>
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