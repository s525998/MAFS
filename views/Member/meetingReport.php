<?php
    // needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){



    // include headerMember that contain header part of html 
    include("../Templates/headerMember.html");
   

    // Time zone which is used to store current date when user submit Form
    date_default_timezone_set("America/Chicago"); 

    $msg= "";
    $msg_type = "";
?>

<!-- for stroing file in certain directory -->
<?php 
    // check if user have clicked submit button
    if (isset($_POST['submit'])){

    /* Store all the information which was send using POST method
    Files properties to store file Name and file location of report */ 
        $dates =  date('y-m-d');
        $errors= array();
        $file_name = $_FILES['report']['name'];
        $file_tmp = $_FILES['report']['tmp_name'];
        $name = $_POST['fullName'];
        $university= $_POST['university'];
        $note = $_POST['note'];

        // Check if array '$error' is empty
        if(empty($errors) == true){

    /* Checking if report file from their current location is moved to Folder we wanted  */
            if (move_uploaded_file($file_tmp,"../../uploadFile/meetingReports/".$file_name)){

                /* Query to insert value to 'meeting_report' table  */
                $insertReport="INSERT INTO `meeting_report`(`Name`, `University`, `File`, `Note`, `Date`) VALUES ('$name','$university','$file_name','$note' ,'$dates')";
                // executing above query
                $queryInsert = mysqli_query($con,$insertReport); 
                
                // check if written query has no error
                if ($queryInsert){
                     // store successful message
                    $msg = "$file_name is uploaded";
                    $msg_type = "Success";
                }else{
                    //store unsuccessful message
                    $msg = "$file_name cannot be uploaded";
                    $msg_type = "Warning";
            }
                }else{
                     //store unsuccessful message
                     $msg = "$file_name cannot be uploaded or moved ";
                     $msg_type = "Danger";
                }           
            }   
            else{
            // Give error message if there is any error in the array
                print_r($errors);
                print 'File could not be uploaded.';
                }
        }
  ?>
   
    <div class="container content">
        
        <!-- Here it display message stored above -->
        <div class= "alert alert-<?php echo $msg_type; ?>" style="text-align:center">
            <h3>
        <?php 
            echo $msg; 
        ?>
        </h3>
        </div>

    <div class="row">
        <div >
        <div class="post-div" >
        <div class="col-md-10 card" style=" border-style: solid; border-width: 1.5px;">
        <br>
            <h2 class="ff8300">Submit your meeting report here</h2><hr>

                <!-- Created Form for the file Upload -->
            <form enctype="multipart/form-data" action="meetingReport.php" method= "POST">

                <!-- Text field for the Name -->
                <div class="form-group"  >
                    <label class="b891"> Name   </label>
                        <input type="text" name="fullName" required><br> <br>

                    <!-- Select field for the University  -->
                   
                    <label class="b891" for="exampleFormControlSelect1"> University</label>

                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"  name="university"></textarea>
                    </select> <br>

                    <!-- Upload File field for the report -->
                    <label class="b891" for="exampleFormControlFile1">Upload your report here</label>
                    <input type="file"  id="report" name="report"><br>

                    <!--  Textarea field for the Notes -->
                    <label class="b891" for="exampleFormControlTextarea1">Notes</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note"></textarea><br>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>
    </div>
    </div>
</html>

<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>