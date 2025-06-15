<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Your DB username
define('DB_PASSWORD', ''); // Your DB password
define('DB_NAME', 'call_logger_db'); // The database name you created

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>
