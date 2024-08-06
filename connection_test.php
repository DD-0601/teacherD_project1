<?php
// includes/db_connect.php
$dsn = "mysql:host=localhost;dbname=expstore;charset=utf8";
$user = "sales";
$password = "123456";
try {
    $link = new PDO($dsn, $user, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set("Asia/Taipei");
    $link->exec("SET NAMES utf8");
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
