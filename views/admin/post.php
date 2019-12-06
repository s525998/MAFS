
<?php
    // page run thorugh ProcessUser.php once admin.php is loaded
    include_once("processPost.php");

    /* To check if user logged in and visit this page */
    if (isset($_SESSION['isAdmin'])){
        
    // including header from Templates Folder
    include("../Templates/headerAdmin.html");
?>

    <?php
            // check if 'message' is empty or not
            if (isset($_SESSION['messagePost'])):
        ?>
            <!-- retrieving 'msg-type' value -->
        <div class= "alert alert-<?= $_SESSION['msg_type']; ?>" style="text-align:center">

        <?php 
            //displaying message 
            echo $_SESSION['messagePost']; 
            unset ($_SESSION['messagePost']);
        ?>
    </div>

       <!-- closing if conditon -->
       <?php endif?>

<!-- Admin can upload file or make changes on the JeffCity News, Announcement, Legislation Update and Best practices
    Which will get updated in both database and NewsTemplate page -->
    <div class="container">
    <div class="post-div">
        <form enctype="multipart/form-data" action="processPost.php" method="POST" >
     
            <div class="form-group postGroup" >
                <label>Jeff City News </label> 
     
                <div class="form-group"> 
                            <label class="b891" for="exampleFormControlFile1">Upload file</label>
                            <input type="file"  id="report" name="jeffNewsFile">
                    </div> 
                <button type = "Submit" name="jeffNewsPost" class ="Post">Post</button>
            </div>

            <div class="form-group postGroup" >
                <label>Legislations Update </label> 
             
                <div class="form-group"> 
                            <label class="b891" for="exampleFormControlFile1">Upload file</label>
                            <input type="file"  id="report" name="legNewsFile">
                </div> 
                <?php echo $_SESSION['legName'];?>
                <button type = "Submit" name="legNewsPost" class ="Post">Post</button>
            </div>

            <div class="form-group postGroup" >
                <label>Best Practices </label> 
            
                <div class="form-group"> 
                            <label class="b891" for="exampleFormControlFile1">Upload file</label>
                            <input type="file"  id="report" name="bestPracFile">
                </div> 
                <button type = "Submit" name="bestPracPost" class ="Post">Post</button>
            </div>

            <div class="form-group postGroup" >
                <label>Announcements </label> 
                <div class="announce">
                <textarea name="announce" class="form-control"  rows="10" cols="80" Placeholder="Post latest Announcement" ></textarea>
                </div>
                <div class="form-group"> 
                            <label class="b891" for="exampleFormControlFile1">Upload file</label>
                            <input type="file"  id="report" name="annonceFile">
                </div> 
                <button type = "Submit" name="announcePost" class ="Post">Post</button>
            </div>

        </form>
    </div>
</div>
<?php 
    /* If user is not logged and some visit this page then it redirect to login.php*/
    }else{
    header('location: ../login.php'); 
}?>
