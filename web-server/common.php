<?php

$dbhost = 'database';
$dbuser = 'root';
$dbpass = 'supersecurepass';
$dbname = 'armbook';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    die( "Sorry, this website is experiencing problems.");
}


?>
