<?php
$creds = array( 'usr' => $_POST['RIT'], 'display' => $_POST['display'], 'eml' => $_POST['eml'], 'nm' => $_POST['Name']);
$url = 'http://auth:8080/register';

$curl = curl_init($url);
$curlString = http_build_query($creds, '', '&');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curlString);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
if($response == "created"){
        header("Location: ../index.html");
}
else if($response == "error"){
    echo htmlspecialchars("$response", ENT_QUOTES, 'UTF-8');
}
else if($repsonse == "already registered"){
    echo htmlspecialchars("$response", ENT_QUOTES, 'UTF-8');
}
print $response;

print $curlString;
?>
