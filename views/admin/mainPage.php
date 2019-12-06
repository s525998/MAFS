<?php
    // needed for connection of database which is contain in sql.php
    include_once('sql.php');
    session_start();

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
        
    
    // include headerMember that contain header part of html 
    include("../Templates/headerAdmin.html");
   

?>

<!-- Description page for the admin that contain detail information on how the application work -->
<div class="description">
    <div class="row">
        <div class= "col-md-2 col-sm-3"></div>
        <div class="col-md-10 col-sm-10">
            <p>Explanation of left-hand navigation:</p>
    
            <ol type="1">
                <li class="list"> Users- When this tab is clicked, it provide admin with three option.
                    <ol type="i">
                        <li class="list1">Add Users - fill out basic information of user (name, email address, User-name and Password), select their position/role (Admin, Member and Inactive), click save.</li>
                        <li class="list1">Users tab - view detailed information for all users</li>
                        <li class="list1">Edit - Edit will take you to a page similar to the Add user page, but all the information is filled in. The position field has an inactive option that can be selected.
                                 This will eliminate their access to the “member” area of the website.</li> <br>

                        <p> <strong style="font-size: 15px"> Note: </strong> When edit is clicked in username of member. 
                        The position is placed admin as default so every time you make edit on member make sure you choose position member at the end and click on update.</p>
                         </ol>
                </li>

                <li class="list">
                    Events- Post the upcoming events by providing the date, event name and event details. The event will then be posted on the website. 
                    The bottom of the page contains a table with a detailed list of all events posted on the website with the option to edit or delete them, if necessary. 
                </li>
                <li class="list">
                    Post Info – Post the information for “News” template (Jeff City News, Legislations Update, Best Practices and announcements).
                     You can also upload pdf or docx file rather than text.
                </li>
                <li class="list">
                    Current Officer – To update the information of officer if there is any change in the current officer. You are require to select the position and add info for new officer with respect to their position.
                    You can also update the image of the officer and all this will be updated in the website.
                </li>
                 <li class="list">
                    Past employee- When this tab is clicked, it provides you with two options
                    <ol type="i"> 
                        <li class="list1">Add tab – Enter information of outgoing officers. Click on Add to post in website about past employee information.</li>
                        <li class="list1">Update/Delete - List of past officers with their detailed information. Again, admin will be provided option to edit if any error is made.</li>
                    </ol>
                </li>
                <li class="list">
                    View MAFS Report – This tab will take to page where it have Strategic Title and list of strategic action of that title and each strategic action have list of MAFS action.
                     When admin click on that MAFS action then it will take to page where admin can see who have submitted report on that MAFS action. 
                     When admin click on the MAFS action it will take you to page that have all the report in listed format and can be copied and paste in word documents.
                </li>
                <li class="list">
                    Meeting – This tab will provide admin with three option.
                    <ol type="i">
                    <li class="list1">View Report - Download the Meeting report upload by a member in pdf or any other text format and can also view who submitted the report.</li>
                    <li class="list1">Upload Minute and Agenda – Enter even information (Event name and Event date) and upload agenda and minutes for that event. The agenda and minutes are downloadable for member.</li>
                    <li class="list1">Update/Delete - Detailed list of all agendas and minutes uploaded. Admin has capabilities to edit and delete, as needed. </li>
                    </ol>
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