<?php

include_once("common.php");

	
	if(isset($_GET["display_name"], $_GET["rit_user"])){
		
		if(!empty($_GET["display_name"]) && !empty($_GET["rit_user"])) {

			if($stmt = $con->prepare("UPDATE users SET display_name=? where rit_user=?")){

				$display_name = strip_tags($_GET["display_name"]);
				$rit_user = strip_tags($_GET["rit_user"]);

				if($stmt->bind_param("ss",$display_name, $rit_user)){
					
					if(!$stmt->execute()){
						die("Error - Issue executing prepared statement: " . mysqli_error($con));
					}
				}else{
					die("Error - Issue binding prepared statement: " . mysqli_error($con));
				}

				if($stmt->affected_rows == 1){

					echo htmlspecialchars("True - Display Name was updated for $rit_user", ENT_QUOTES, 'UTF-8');
				}else{
					echo htmlspecialchars("False - Display Name was NOT updated for $rit_user", ENT_QUOTES, 'UTF-8');
				}

				if($stmt->close()){

					
				}else{
					die("Error - Failed to close prepared statement" . mysqli_error($con));
				}

			}else{
				die("Error - Issue preparing statement: " . mysqli_error($con));
				}
		}else{
			die("One or more required parameters is null");
			}

	}else{
		die("One of more required parameters is missing");
		}
	
	
?>