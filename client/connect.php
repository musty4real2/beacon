<?php
$username = 'root';
$password = '';
$dbname = 'beacon';
// Try and connect to the database
$con = mysqli_connect('localhost',$username,$password,$dbname);
 
// If connection was not successful, handle the error
if($con === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
}


?>