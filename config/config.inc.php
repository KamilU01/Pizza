<?php
$dbconfig = array('host' => 'localhost', 'user' => 'root', 'password' => '', 'dbname' => 'pizzeria');

$mysqli = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['dbname']);

if ($mysqli->connect_errno) {

    echo "Sorry, this website is experiencing problems.";

    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";

    exit;
}
?>