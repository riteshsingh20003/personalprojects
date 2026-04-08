<?php
$host = "localhost";
$port = 3307; // Your custom MySQL port
$user = "root";
$pass = "";  // No password
$db_name = "sms_db";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db_name", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
