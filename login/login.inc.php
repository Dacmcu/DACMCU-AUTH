<?php
//The server call from the form post starts here
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username1 = $_POST["username"];
	$pswd1 = $_POST["pswd"];
	
	//Trim post variables of white space
	$username = trim($username1);
	$pswd = trim($pswd1);

	try{
		//Dependency calls
		require_once 'dbh.inc.php';
		require_once 'login.dbque.php';
		require_once 'login.contr.php';
		require_once 'login.view.php';
		
		//Session call
		session_start();
		
		//Errors array variable for error interrupts
		$errors = [];

			//Query to check if user already exist via login.dbque.php
			$results = get_user($pdo, $username);

			//Query to check if password already exist via login.dbque.php
			$resultspass = get_userpass($pdo, $username);
			
			//Password string variable
			$pswdr = $resultspass["pswd"];
			
			if (no_data($username, $pswd)){
				$errors["login_incorrect"] = "Need input data!";
			}
			//Check if user exist or input empty, if user dont exist then send message
			if(!check_user($results)){
				
			$errors["login_incorrect"] = "Incorrect login info!";
			}
			//Check is user and password combination are correct
			if(check_user($results) && check_pass($pswd, $pswdr)){
			
			$errors["login_incorrect"] = "Incorrect matching Info!";
			}
			
			//If all criterior of the query functions are met then the code will proceed
		
		//Error handler
		if($errors){
			$_SESSION["input_error"] = $errors;
			
			//Client gets redirected to landing page with an error message
			header("Location: ../index.php");
			die();
		}
	
		//After authentication, client wil be directed to the home page via header fucntion then close script
		header("Location: home.inc.php");
		$pdo = null;
		$stmt = null;
		die();
	
		//PDO cath maessge to debug errors
	}catch(PDOException $e){
		die("Query failed: " . $e->getMessage());
		
	}
	
}else{
	
	//Redirection for unwarrented clients or users who bruteforce their way to a document
	//This is setup using the if, else function from the server call
	header("Location: ../index.php");
}
