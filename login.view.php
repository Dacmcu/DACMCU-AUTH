<?php

declare(strict_types=1);

//Error handler view
function error_handle()
{
	
	if(isset($_SESSION["input_error"])){
		
		$errors = $_SESSION["input_error"];
		
		echo "<br>";
		
		foreach($errors as $err){
			echo '<p>' . $err . '</p>';
			
		}
		
		unset($_SESSION['input_error']);
	}

}

