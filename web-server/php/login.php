<?php
$creds = array( 'eml' => $_POST['usr'], 'passwd' => $_POST['pass']);
$url = 'http://auth:8080/login';

$curl = curl_init($url);
$curlString = http_build_query($creds, '', '&');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curlString);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
if($response == "error"){
    header("Location: ../index.html");
}
?>
