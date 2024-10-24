<?php

require_once "../config.php";

$host = $config['db_host'];
$dbname = $config['db_name'];
$dbusername = $config['db_user'];
$dbpassword = $config['db_pass'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed:" . $e->getMessage());
}