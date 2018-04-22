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

		if(isset($_GET["display_name"])){

			if(!empty($_GET["display_name"])) {


				$display_name = strip_tags($_GET["display_name"]);
				$session_id = strip_tags($_COOKIE['session']);

				if($stmt = $con->prepare("UPDATE skitter.users INNER JOIN skitter.sessions ON users.rit_user = sessions.username SET users.display_name = ? WHERE sessions.session_id = ?")){

					if($stmt->bind_param("ss",$display_name, $session_id)){
						
						if(!$stmt->execute()){
							die("Error - Issue executing prepared statement: " . mysqli_error($con));
						}
					}else{
						die("Error - Issue binding prepared statement: " . mysqli_error($con));
					}

					if($stmt->affected_rows == 1){

						echo "True - Display Name was updated";

					}else{
						echo "False - Display Name was NOT updated";
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