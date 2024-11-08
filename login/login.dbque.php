<?php
//Strict declaration type for function calls
declare(strict_types=1);

//Dependencies
require_once 'dbh.inc.php';


/***************/


///DataBase Queries

//Check if password exist under the username(Insert your own table name from your database)
function get_userpass(object $pdo, string $username)
{
	
//Write query for user names
$query = "SELECT pswd FROM users WHERE username = :username;";	
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();

$results = $stmt->fetch(PDO::FETCH_ASSOC);
 
//Return the the query data 
return $results;
	
}

//Check if user exist under the specific username
function get_user(object $pdo, string $username)
{
	
//Write query for user names
$query = "SELECT username FROM users WHERE username = :username;";	
$stmt = $pdo->prepare($query);
$stmt->bindParam(":username", $username);
$stmt->execute();

$results = $stmt->fetch(PDO::FETCH_ASSOC);
 
//Return the the query data 
return $results;
	
}

