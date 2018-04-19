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


?>
