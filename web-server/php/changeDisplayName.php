<?php

include_once("common.php");

	if($stmt = $con->prepare("UPDATE users SET display_name=? where rit_user=?")){
		
		$display_name = $_GET["display_name"];
		$rit_user = $_GET["rit_user"];

		if($stmt->bind_param("ss",$display_name, $rit_user)){
			
			if(!$stmt->execute()){

				die("Error - Issue executing prepared statement: " . mysqli_error($con));
			}
		}else{
			die("Error - Issue binding prepared statement: " . mysqli_error($con));
		}
		if($stmt->close()){
			echo "Display Name Successfully Changed";
		}else{
			die("Error - Failed to close prepared statement" . mysqli_error($con));
		}
	}else{
			die("Error - Issue preparing statement: " . mysqli_error($con));
	}
	
?>