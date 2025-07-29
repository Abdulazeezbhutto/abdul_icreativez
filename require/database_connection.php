<?php

require_once("database_settings.php");
mysqli_report(false);

$connection = mysqli_connect($host_name, $user_name, $password, $database_name);

if (!$connection) {
    echo "Failed to connect to MySQL: (" . mysqli_connect_errno() . ") " . mysqli_connect_error();
} else {
    // echo "Connected successfully!";
}

?>