<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../pages/signup.php");
    die();
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

try {
    require_once 'db.php';
} catch (PDOException $e) {
    die("Query failed:" . $e->getMessage());
}