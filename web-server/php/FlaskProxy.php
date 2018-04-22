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


		if(isset($_POST['follow']) xor isset($_POST['unfollow']) xor isset($_POST['search'])){

			if(!empty($_POST['follow']) xor !empty($_POST['unfollow']) xor !empty($_POST['search'])) {

				$query = "";
				$query_type = "";
				$url = "";
				$session_id = strip_tags($_COOKIE['session']);

				if(!empty($_POST['follow'])){
					$query_type = "follow";
					$query = strip_tags($_POST['follow']);
					$url = 'http://flask:5000/FollowUser';
					$creds = array( 'follow' => $query, 'session_id' => $session_id);
					}
				elseif(!empty($_POST['unfollow'])){
					$query_type = "unfollow";
					$query = strip_tags($_POST['unfollow']);
					$url = 'http://flask:5000/UnfollowUser';
					$creds = array( 'unfollow' => $query, 'session_id' => $session_id);
					}
				elseif(!empty($_POST['search'])){
					$query_type = "search";
					$query = strip_tags($_POST['search']);
					$url = 'http://flask:5000/UserSearch';
					$creds = array( 'search' => $query);
					}

				$curl = curl_init($url);
				$curlString = http_build_query($creds, '', '&');
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curlString);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$response = curl_exec($curl);
				curl_close($curl);

				echo htmlspecialchars("$response", ENT_QUOTES, 'UTF-8');

			}else{
				die("False - Exactly one parameter can accept data");
				}

		}else{
			die("False - You must have exactly one parameter set");
			}
	}
}	
	
?>