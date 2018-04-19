<?php

include_once("common.php");


$upload_dir = "/var/www/html/profile_picture/";
$upload_image = $upload_dir . basename($_FILES["myimage"]["name"]);

move_uploaded_file($_FILES["myimage"]["tmp_name"], $upload_image);

if($stmt = $con->prepare("UPDATE users SET profile_picture=? where rit_user=?")){

	$profile_picture = $folder . $upload_image;
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
