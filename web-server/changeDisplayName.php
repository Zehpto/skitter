<?php

include_once("common.php");
	if($stmt = $mysqli->prepare("UPDATE users SET username=? where rit_user=?")){
		
		$username = $_GET["username"]
		$rit_user = $_GET["rit_user"]

		if($stmt->bind_param("ss",$username, $rit_user){
			if(!$stmt->execute()){
				die("Error - Issue executing prepared statement: " . mysqli_error($mysqli));
			}
		}else{
			die("Error - Issue binding prepared statement: " . mysqli_error($mysqli));
		}
		if($stmt->close()){
			setcookie("ARM_SESSION", $_COOKIE["ARM_SESSION"], 1);
			echo "<script>window.location.href = '/index.php';</script>";
		}else{
			die("Error - Failed to close prepared statement" . mysqli_error($mysqli));
		}
	}else{
			die("Error - Issue preparing statement: " . mysqli_error($mysqli));
	}
	
?>