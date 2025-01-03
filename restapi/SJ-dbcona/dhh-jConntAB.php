<?php
$tdservername = "localhost";
$tdusername = "root";
$tdpass = "";
$tddbname = "hrms";

try {
    $pdo = new PDO("mysql:host=$tdservername;dbname=$tddbname;charset=utf8mb4", $tdusername, $tdpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
