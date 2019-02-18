<?php
include('Templates/header2.html'); 
?>

<div class="container">
    <h1 class="form-heading">login Form</h1>
    <div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>Member Login</h2>
       <p>Please enter your email and password to login</p>
       </div>
        <form id="Login" >
    
            <div class="form-group">
    
    
                <input type="text" name="email" class="form-control" id="inputUsername" placeholder="Email Address" required>
    
            </div>
    
            <div class="form-group">
    
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
    
            </div>
            <div class="forgot">
            <a href="/reset">Forgot password?</a>
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