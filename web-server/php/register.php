<?php

if(isset($_POST['RIT'], $_POST['eml'], $_POST['display'])){

	if(!empty($_POST['RIT']) && !empty($_POST['eml']) && !empty($_POST['display'])) {

		$creds = array( 'usr' => $_POST['RIT'], 'display' => $_POST['display'], 'eml' => $_POST['eml']);

		$url = 'http://auth:8080/register';

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
