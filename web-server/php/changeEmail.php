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

	
		if(isset($_GET["email"])){
			
			if(!empty($_GET["email"])) {

				if($stmt = $con->prepare("UPDATE skitter.users INNER JOIN skitter.sessions ON users.rit_user = sessions.username SET users.email = ? WHERE sessions.session_id = ?")){

					$email = strip_tags($_GET["email"]);
					$session_id = strip_tags($_COOKIE['session']);

					if($stmt->bind_param("ss",$email, $session_id)){
						
						if(!$stmt->execute()){
							die("Error - Issue executing prepared statement: " . mysqli_error($con));
						}
					}else{
						die("Error - Issue binding prepared statement: " . mysqli_error($con));
					}

					if($stmt->affected_rows == 1){

						echo htmlspecialchars("True - Email was updated", ENT_QUOTES, 'UTF-8');
					}else{
						echo htmlspecialchars("False - Email was NOT updated", ENT_QUOTES, 'UTF-8');
					}

					if($stmt->close()){

						
					}else{
						die("Error - Failed to close prepared statement" . mysqli_error($con));
					}

				}else{
					die("Error - Issue preparing statement: " . mysqli_error($con));
					}
			}else{
				die("False - The required parameter is null");
				}

		}else{
			die("False - The required parameter is missing");
			}
		
	}
}

?>