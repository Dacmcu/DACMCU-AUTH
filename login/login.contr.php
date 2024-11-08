<?php

 declare(strict_types = 1);
 
 require_once 'login.dbque.php';
 require_once 'dbh.inc.php';
 
 
 /***********************/
 
 //Error Functions
 
 function no_data(string $username, string $pswd){
	 
	 if (empty($username) || empty($pswd)){
		 
		 return true;
		 
	 }else {
		 
		 return false;
	 }	 
 }
 
 // Querying Data function to see if user exist
 function check_user(bool|array $results){
	 
	 if($results){
		 return true;
	 }else{
		 return false;
	 }
 }
 
 //Comparing password function
 function check_pass(string $pswd, string $pswdr){
	 
	 if(!($pswd == $pswdr)){
		 return true;
	 }else{
		 return false;
	 }
 }
 
