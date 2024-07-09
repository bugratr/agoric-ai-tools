<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=agoric_tools';
$dbUsername = 'root';
$dbPassword = '';

try {
    $db = new PDO($dsn, $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}
?>