<?php

include_once("common.php");

	if($stmt = $con->prepare("UPDATE users SET display_name=? where rit_user=?")){
		
		$display_name = strip_tags($_GET["display_name"]);
		$rit_user = "username";
		$rit_user = strip_tags($_GET["rit_user"]);

		if($stmt->bind_param("ss",$display_name, $rit_user)){
			
			if(!$stmt->execute()){
				die("Error - Issue executing prepared statement: " . mysqli_error($con));
			}
		}else{
			die("Error - Issue binding prepared statement: " . mysqli_error($con));
		}

		if($stmt->affected_rows == 1){

			echo htmlspecialchars("True - Display name was set for $rit_user", ENT_QUOTES, 'UTF-8');
		}else{
			echo htmlspecialchars("False - Display name was NOT set for $rit_user", ENT_QUOTES, 'UTF-8');
		}

		if($stmt->close()){

			
		}else{
			die("Error - Failed to close prepared statement" . mysqli_error($con));
		}
	}else{
			die("Error - Issue preparing statement: " . mysqli_error($con));
	}
	
?>