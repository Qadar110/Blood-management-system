<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bloodmg');

// Try connecting to the Database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($con == false) {
    die("Error: Cannot connect to the database.");
} else {
    // Connection successful (optional: you can echo a message if needed)
    // echo "Connected";
}
?>
