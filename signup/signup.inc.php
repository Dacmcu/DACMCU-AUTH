<?php
//The server call from the form post starts here
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username1 = $_POST["username"];
	$email1 = $_POST["email"];
	$pswd1 = $_POST["pswd"];
	$repswd1 = $_POST["repswd"];
	
	//Trim post objects of white space
	$username = trim($username1);
	$email = trim($email1);
	$pswd = trim($pswd1);
	$repswd = trim($repswd1);
	
	try{
		//Dependency calls
		require_once 'dbh.inc.php';
		require_once 'signup.dbque.php';
		require_once 'signup.contr.php';
		
		//Session call
		session_start();
		
		//Errors array variable for error interrupts
		$errors = [];
		
		//Check if data was submitted
		if(no_data($username, $pswd, $email, $repswd)){
			
			$errors["empty_input"] = "Please fill out all info!";
		}else{
			
		
		//Check if client input an invalid email
		if(invalid_email($email)){
			
			$errors["invalid_email"] = "Invalid email!";
		}
		
		//See if username is already taken
		if(user_taken($pdo, $username)){
			
			$errors["user_taken"] = "Try again user already exist!";
		}
		
		//See if email already exist
		if(email_taken($pdo, $email)){
			
			$errors["email_taken"] = "Try again email already taken!";
		}
		
		//Check if passwords match
		if(!check_pass($pswd, $repswd)){
			
			$errors["nopass_input"] = "Password not identical!";
		}
		
	}
		
		//Error handler
		if($errors){
			$_SESSION["input_error"] = $errors;
			
			header("Location: index.php");
			die();
		}
		
		//If all criteriors are met to signup for an account, the script will proceed to create user
		create_user($pdo, $username, $pswd, $email);
		
		//The script exits then redirect to login page
		$pdo = null;
		$stmt = null;
		header("Location: ../index.php");
		die();
		
		//PDO try/catch message function
	}catch(PDOException $e){
		die("Query failed: " . $e->getMessage());
		
	}
	
}else{
	header("Location: index.php");
}
