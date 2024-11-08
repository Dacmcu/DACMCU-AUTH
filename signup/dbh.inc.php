<?php

//Database signin parameters. Adjust the necessary variables for database connections
$host_name = "localhost";
$database = "based"; //Database name 
$Username = "root";
$password = "";

//Create a PDO object with WAMP signin and its database query parameters. This includes a try/catch function for error handling 
try{
	$pdo = new PDO('mysql:host='.$host_name.';dbname='.$database, $Username, $password);
}catch(PDOException $e){
	print "Error! " .$e->getMessage(). "<br/>"; die();
	
}
