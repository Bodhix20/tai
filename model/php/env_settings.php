<?php

// Default connection parameters (for local development)
$host = "localhost";
$dbname = "tai";
$user = "root";
$pwd = "";

// Connection parameters for the server environment
if (file_exists("/var/www/")) {
    $host = "localhost"; // Use 'localhost' or the internal hostname provided by your hosting provider
    $dbname = "tai_app_2023_2024_caterpillar";
    $user = "tai_app_2023_2024_caterpillar";
    $pwd = "W2MM9IAXA6";
}

try {
    // Create a new PDO instance
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pwd);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection to the database failed: " . $e->getMessage();
}
?>