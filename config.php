<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'beacxlcn');
define('DB_PASSWORD', 'hBcG7jTegWhE');
define('DB_NAME', 'beacxlcn_bank');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>