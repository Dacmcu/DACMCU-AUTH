<?php

//File dependencies
require_once 'login.view.php';

//Session call
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>DACMACU LOGIN</title>
</head>
<body>
	
    <div class="wrapper">
	
	<?php
	
	//Error handling
	error_handle();
	?>
		<!-- Login form. The name values in the form will
		be passed to the file, login.inc.php and route 
		through the file path: log/login.inc.php -->
		
        <form action="login/login.inc.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="username" name="username">
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name="pswd">
            </div>
            <div class="remember-forget">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forget password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account?<a href="signup/index.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>