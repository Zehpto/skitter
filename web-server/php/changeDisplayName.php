<?php

include_once("common.php");

	if($stmt = $con->prepare("UPDATE users SET username=? where rit_user=?")){
		
		$username = $_GET["username"];
		$rit_user = $_GET["rit_user"];

		if($stmt->bind_param("ss",$username, $rit_user)){
			
			if(!$stmt->execute()){

				die("Error - Issue executing prepared statement: " . mysqli_error($con));
			}
		}else{
			die("Error - Issue binding prepared statement: " . mysqli_error($con));
		}
		if($stmt->close()){
			echo "Username Successfully Changed";
		}else{
			die("Error - Failed to close prepared statement" . mysqli_error($con));
		}
	}else{
			die("Error - Issue preparing statement: " . mysqli_error($con));
	}
	
?>