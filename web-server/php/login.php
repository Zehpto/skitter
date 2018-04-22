<?php
if(isset($_POST['usr'], $_POST['pass'])){

	if(!empty($_POST['usr']) && !empty($_POST['pass'])) {

		$user = strip_tags($_POST['usr']);
		$pass = strip_tags($_POST['pass']);

		$creds = array( 'eml' => $user, 'passwd' => $pass);
		
		$url = 'http://auth:8080/login';
		$curl = curl_init($url);
		$curlString = http_build_query($creds, '', '&');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlString);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);

	    echo htmlspecialchars("$response", ENT_QUOTES, 'UTF-8');
	}
}
?>
