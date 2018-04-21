<?php

$dbhost = 'database';
$dbuser = 'root';
$dbpass = 'supersecurepass';
$dbname = 'skitter';
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($con->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $con->connect_errno . "\n";
    echo "Error: " . $con->connect_error . "\n";
    die( "Sorry, this website is experiencing problems.");
}

function isAuthenticated($session_id){
    $data = array(
        'id' => $session_id,
    );
    $url = 'http://auth:8080/isAuthenticated';
    $ch = curl_init($url);
    $post = http_build_query($data, '', '&');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    if ($response == "invalid"){
        echo "Invalid Session";
        return false;
    }
    return true;
}

?>
