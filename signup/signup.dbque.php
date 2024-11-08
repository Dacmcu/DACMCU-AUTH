<?php
//Strict type variable declarations
declare(strict_types=1);

//Database dependency
require_once 'dbh.inc.php';


/***************/

//DataBase Queries

//Check if user exist under the table name: users. Insert your own table name from your database
function get_username(object $pdo, string $username)
{
	
$query = "SELECT username FROM users WHERE username = :username;";	
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();

$results = $stmt->fetch(PDO::FETCH_ASSOC);
 
return $results;
	
}

//Check if email exist under the table name: users. Insert your own table name from your database
function get_email(object $pdo, string $email)
{
	
$query = "SELECT username FROM users WHERE email = :email;";	

$stmt = $pdo->prepare($query);
$stmt->bindParam(":email", $email);
$stmt->execute();

$results = $stmt->fetch(PDO::FETCH_ASSOC);

return $results;
	
}

/********************/

//DataBase Signup with key

//Create user function under the table name: users. Insert your own table name from your database
function create_user(object $pdo, string $username, string $pswd, string $email)
{
$query = "INSERT INTO users(username, pswd, email) VALUES(:username, :pswd, :email);";
		$stmt = $pdo->prepare($query);
		$stmt->bindParam(":username",$username);
		$stmt->bindParam(":pswd",  $pswd);
		$stmt->bindParam(":email", $email);
		
		
		$stmt->execute();
	
}

 