<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once "../service/note.service.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../pages/AddNote.php");
    die();
}

$username = $_SESSION["user_username"];
$userId = $_SESSION["user_id"];
$title = $_POST["title"];
$content = $_POST["content"];

$response = new_note($username, $title, $content, $userId);

if ($response === true) {
    header("Location: ../../pages/Home.php");
    exit();
} else {
    echo "Error creating note.";
}