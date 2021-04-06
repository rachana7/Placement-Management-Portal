<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'SoftwareEngineering');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

header('Access-Control-Allow-Origin: *'); 
$servername = explode('=', explode(';', getenv('MYSQLCONNSTR_localdb'))[1])[1];
$username = "azure";
$password = "6#vWHD_$";
$database = "pes_placement";

// Create connection
$link = new mysqli($servername, $username, $password, $database);
?>
