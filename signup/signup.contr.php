<?php
//Strict variable declaration type call
 declare(strict_types = 1);
 
 //Dependencies
 require_once 'signup.dbque.php';
 require_once 'dbh.inc.php';
 
 
 /***********************/
 
 //Error Functions
 
 //Check if all input fields have information
 function no_data(string $username, string $pswd, string $email, string $repswd){
	 
	 if (empty($username) || empty($pswd) || empty($email) || empty($repswd)){
		 return true;
		 
	 }else {
		 
		 return false;
	 }	 
 }
 
 //Check if email has a valid structure
 function invalid_email(string $email){
	 
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		 return true;
		  
	 }else {
		 
		 return false;
	 }	 
 }
 
 //Cehck is user already exist
 function user_taken(object $pdo, string $username){
	 
	 if (get_username($pdo, $username)){
		 return true;
		  
	 }else {
		 
		 return false;
	 }	 
 }
 
 //Check if email exist
 function email_taken(object $pdo, string $email){
	 
	 if (get_email($pdo, $email)){
		 
		 return true;
		  
	 }else {
		 
		 return false;
	 }	 
 }
 
 //Varifying passward inputs
 function check_pass(string $pswd, string $repswd){
	 
 if ($pswd == $repswd){
	 return true;
 }else{
	 return false;
 }
	 
 }
