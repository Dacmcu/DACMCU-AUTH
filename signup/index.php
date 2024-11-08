<?php
//Dependency
require_once 'signup.view.php';

//Session call
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">

    <title>REGISTRATION</title>
</head>
<body>
    <div class="wrapper">
	
	<!--PHP Error handler-->
	<?php
	
	error_handle();
	
	?>
<!--Form action sends name values to file signin.inc.php to be processed-->
		<form action="signup.inc.php" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="username" name="username">
            </div>
            <div class="input-box">
                <input type="text" placeholder="email" name="email">
            </div>
            <div class="input-box">
                <input type="password" placeholder="password" name="pswd">
            </div>
            <div class="input-box">
                <input type="password" placeholder="repeat password" name="repswd">
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
		<div class="input-box">
			<form action="../index.php" method="post">
			<button type="submit" class="btn">Back</button>
			</form>
			</div>
    </div>
</body>
</html>