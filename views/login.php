
<?php
    ob_start();
    session_start();

// including header from Templates Folder
    include('Templates/header2.html');

// Connecting the database
    include('admin/sql.php');

// Query that will select all the information from member table
    $query = "SELECT * FROM `member`";
    $result = mysqli_query($con,$query);

// echo ("Connection is Successful !!") ;
    $found = false;
    $msg="";
    $msg_type="";

// checked if login button is clicked
if (isset($_POST['login'])){
   
// getting username and Passowrd and storing in that varibale
    $username = $_POST['username'];
    $password = $_POST['password'];
    
// Checking if above query is working 
    if ($result){
// Having while loop for the array created from above query
     while ($row = mysqli_fetch_array($result)){
    
    // This if condition is to check if user is admin 
        if( $row['UserName'] == $username && $row['Password'] == $password && $row['Position'] == 'Admin'){
             $_SESSION['isAdmin'] = true;
           
             //  render to admin page
             header('Location: admin/mainPage.php');
             exit();
         }
    // This if condition is to check if user is member
        if ( $row['UserName'] == $username && $row['Password'] == $password && $row['Position'] == 'Member'){
            $_SESSION['isMember'] = true;
        // Saving the user ID for later user
            $_SESSION['id'] = $row['ID'];
            $fullName = $row['First Name'] . $row['Last Name'];
            $_SESSION['Name'] = $fullName; 
            
            // render to member page
           header('Location: Member/mainPage.php');
           exit();
       }

// If either UserName or password or both are incorrect then show below message in login page
    $found=true;
    $msg = "Incorrect Username or Password";
    $msg_type = "warning";
    }
 
}
}
?>


<div class="container">

<!-- This was declared above to know either userName or password or both are incorrect -->
    <?php if($found): ?>

    <!-- If found is true then we will print the following message -->
   <div class= "alert alert-<?php echo $msg_type; ?>" style="text-align:center">
    <?php echo $msg; ?>
    </div>
    <?php endif ?>

<!-- lOGIN FORM -->
    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
    <div class="main-div">
        <div class="panel">
            <h2>Member Login</h2>
            <p>Please enter your User Name and password to login</p>
        </div>

        <form id="Login" action="login.php" method="POST">
    
            <div class="form-group">
                <!-- Username field  -->
                <input type="text"  name="username" class="form-control" id="inputUsername" placeholder="User Name" required>
            </div>
    
            <div class="form-group">
                <!-- Password field  -->
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
    
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <br>
            <br>
            <br>
            <div>
                <b style="font-size:14px;">Important</b>: If you cannot login or forget password then you need to contact executive member for password.
            </div>
        </form>
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