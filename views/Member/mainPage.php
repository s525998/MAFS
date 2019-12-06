<?php
    // needed for connection of database which is contain in sql.php
    include_once('../admin/sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isMember'])){


    // include headerMember that contain header part of html 
    include("../Templates/headerMember.html");

?>
<!-- Check if user have sign in  -->
<?php if(isset($_SESSION['Name'])):?>

<!-- display the name of user who have sign in -->
<div id="name" style="text-align:center">  <?php echo ("Welcome Back " . $_SESSION['Name'] );  ?> </div>

<?php endif ?>

<!-- Description page for the member that contain detail information on how the application work -->
<div class="description">
    <div class="row">
        <div class= "col-md-2 col-sm-3">
        </div>
        <div class="col-md-10 col-sm-10">
            
            <p> Explanation of left-hand navigation:</p>
    
            <ol type="1">
                <li class="list"> Discussion – Provides members with two options, create a discussion topic or view and reply to current discussions. 
                            View Responses will display a list of all discussion topics currently open. You will click on the topic to view current replies to the topic and to add your own reply.
                </li>

                <li class="list">
                Strategic Plan – View the current Higher Ed and Missouri Association of Faculty Senate (MAFS) strategic plan. 
                </li>
                <li class="list">
                MAFS Reports - Members will report action on the five strategic areas here. Click on the area you want to report for the entry box. Each member institution should report for each Strategic Action.
                </li>
                 <li class="list">
                	Meeting Reports- Members can submit institution meeting reports via the website.  Member are required to fill out all the text boxes and upload their report in pdf or docx format.
                </li>
                <li class="list">
                   Agenda/Minute – Download the Agenda/Minutes for the upcoming MAFS event that is posted in website.
                </li>
                <li class="list">
            	Advocates - Links for MAFS advocates [American Association of University Professors (AAUP) and The Association of Governing Boards of Universities and Colleges (AGB)]
                </li>
                <li class="list">
                Change Password- When you enter this site for first time, you are provided with User-Name and Password. You are free to change your password by clicking on this tab. 
                </li>
            </ol>
        </div>
    </div>
</div>
</div>
<?php 
/* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
