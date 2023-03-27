<?php
$servername = 'localhost';
$username   = 'root';
$password   = 'Liak@t2889';
$dbname     = 'modeight';

$conn = new mysqli( $servername, $username, $password, $dbname );

// Check the connection
// এখানে আমরা সঠিক কি লিখবো বা কি কি লিখা যায়?
if ( $conn->connect_error ) {
 die( "Connection failed: " . $conn->connect_error );
}