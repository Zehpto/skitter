<?php

include_once("common.php");

$image_name = $_FILES['myimage']['name'];

$profile_picture=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

if($stmt = $con->prepare("UPDATE users SET profile_picture=? where rit_user=?")){

	$rit_user = "bob1234";

	if($stmt->bind_param("ss",$profile_picture, $rit_user)){
		
		if(!$stmt->execute()){
			die("Error - Issue executing prepared statement: " . mysqli_error($con));
		}
	}else{
		die("Error - Issue binding prepared statement: " . mysqli_error($con));
	}

	if($stmt->affected_rows == 1){

		echo htmlspecialchars("True - Profile picture was updated for $rit_user", ENT_QUOTES, 'UTF-8');
	}else{
		echo htmlspecialchars("False - Profile picture was NOT updated for $rit_user", ENT_QUOTES, 'UTF-8');
	}

	if($stmt->close()){

		
	}else{
		die("Error - Failed to close prepared statement" . mysqli_error($con));
	}

}else{
	die("Error - Issue preparing statement: " . mysqli_error($con));
	}

?>
