<?php
ob_start();
include('Templates/header2.html');
include_once('admin/sql.php');

// echo ("Connection is Successful !!") ;
    $found = false;
    $msg="";
    $msg_type="";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['userName'];
    $password = $_POST['password'];
    
    // if (empty($username)){
    //     print '<p class="text-error"> Please Enter UserName </p>';
    // }
    // if(empty($password)){
    //     print '<p class="text-error"> Please Enter Password </p>';
    // }

    $query = "SELECT  * FROM `member`";
    $result= mysqli_query($con,$query);
    if ($result){
     while ($row = mysqli_fetch_array($result)){
         if($username == "lsherpa" && $password == "lhakpa123"){
            $found=false;
             ob_end_clean();
             header('Location: admin/admin.php');
             exit();
         }
       if ( $row['UserName'] == $username && $row['Password'] == $password){
           $found=false;
            ob_end_clean();
            header('Location: default.html');
           exit();
       }
   }
   $found=true;
   $msg = "Incorrect Username or Password";
   $msg_type = "warning";
}
}
?>


<div class="container">
    
    <?php if($found): ?>
   <div class= "alert alert-<?php echo $msg_type; ?>" style="text-align:center">
    <?php echo $msg; ?>
    </div>
    <?php endif; ?>

    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>Member Login</h2>
       <p>Please enter your User Name and password to login</p>
       </div>
        <form id="Login" action="login.php" method="POST" >
    
            <div class="form-group">
    
    
                <input type="text" name="userName" class="form-control" id="inputUsername" placeholder="User Name" required>
    
            </div>
    
            <div class="form-group">
    
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
    
            </div>
        
            <button type="submit" class="btn btn-primary">Login</button>
    
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