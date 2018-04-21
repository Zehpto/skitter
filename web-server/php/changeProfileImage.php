<?php

if(!isset($_COOKIE['session'])){
	header("Location: /index.html");
	
}else{

	include_once("common.php");

	if(!isAuthenticated($_COOKIE['session'])){
		unset($_COOKIE['session']);
		setcookie($_COOKIE['session'], '', time()-3600, '/');
		header("Location: /index.html");
	
	}else{

		$image_name = $_FILES['myimage']['name'];
		$image_size = $_FILES['myimage']['size'];
		$image_ext = strtolower(end(explode('.',$image_name)));

		$image_exts = ['jpeg','jpg','png'];
		
    	if (! in_array($image_ext,$image_exts)) {
        	die("This file extension is not allowed. Please upload a JPEG or PNG file");
    	}

    	if ($image_size > 2000000) {
        	die("Your file is too large.");
    	}

		$session_id = strip_tags($_COOKIE['session']);
		$profile_picture=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

		if($stmt = $con->prepare("UPDATE skitter.users INNER JOIN skitter.sessions ON users.rit_user = sessions.username SET users.profile_picture = ? WHERE sessions.session_id = ?")){

			if($stmt->bind_param("ss",$profile_picture, $session_id)){
				
				if(!$stmt->execute()){
					die("Error - Issue executing prepared statement: " . mysqli_error($con));
				}
			}else{
				die("Error - Issue binding prepared statement: " . mysqli_error($con));
			}

			if($stmt->affected_rows == 1){

				echo "True - Profile picture was updated";
			}else{
				echo "False - Profile picture was NOT updated";
			}

			if($stmt->close()){

				
			}else{
				die("Error - Failed to close prepared statement" . mysqli_error($con));
			}

		}else{
			die("Error - Issue preparing statement: " . mysqli_error($con));
			}
	
	}
}

?>
