<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "information-system";
$conn = mysqli_connect($hostname, $username, $password, $db);
if (!$conn) {
    echo "Database is not connected!";
}
