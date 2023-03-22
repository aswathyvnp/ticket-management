<?php
$dsn = "mysql:host=localhost;dbname=ticket_management_system";
$user = "root";
$password = "";
$options = [];
try {
    $connection = new PDO($dsn, $user, $password, $options);
    // echo "Connected Successfully";
} catch (PDOException) {
    // echo"<p class='text-light bg-danger m-0'>Connection Interrupted!</p>";
}
