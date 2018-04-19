<?php

include_once("common.php");

	if($stmt = $con->prepare("UPDATE users SET email=? where rit_user=?")){
		
		$email = strip_tags($_GET["email"]);
		$rit_user = "username";
		$rit_user = strip_tags($_GET["rit_user"]);

		if($stmt->bind_param("ss",$email, $rit_user)){
			
			if(!$stmt->execute()){
				die("Error - Issue executing prepared statement: " . mysqli_error($con));
			}
		}else{
			die("Error - Issue binding prepared statement: " . mysqli_error($con));
		}

		if($stmt->affected_rows == 1){

			echo htmlspecialchars("True - Email was updated for $rit_user", ENT_QUOTES, 'UTF-8');
		}else{
			echo htmlspecialchars("False - Email was NOT updated for $rit_user", ENT_QUOTES, 'UTF-8');
		}

		if($stmt->close()){

			
		}else{
			die("Error - Failed to close prepared statement" . mysqli_error($con));
		}
	}else{
			die("Error - Issue preparing statement: " . mysqli_error($con));
	}
	
?>