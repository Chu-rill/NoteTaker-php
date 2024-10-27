<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once "../service/note.service.php";
require_once "../repository/note.repository.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../pages/Home.php");
    die();
}

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'create':
        handle_create_note();
        break;
    case 'delete':
        handle_delete_note();
        break;
    case 'edit':
        handle_edit_note();
        break;
    default:
        echo "Invalid action.";
}


function handle_create_note()
{
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
}
function handle_delete_note()
{
    $noteId = isset($_POST["note_id"]) ? (int)$_POST["note_id"] : null;
    $userId = $_SESSION["user_id"];

    if ($noteId && delete_user_note_by_id($noteId, $userId)) {
        header("Location: ../../pages/Home.php");
        exit();
    } else {
        echo "Error deleting note. Note ID may be missing or invalid.";
    }
}

function handle_edit_note()
{
    if (!isset($_SESSION["user_id"])) {
        echo "User not logged in.";
        return;
    }

    $noteId = isset($_POST["note_id"]) ? (int)$_POST["note_id"] : 0; // Cast to integer
    $title = $_POST["title"] ?? '';
    $content = $_POST["content"] ?? '';
    $userId = $_SESSION["user_id"];

    if ($noteId > 0 && edit_user_note_by_id($noteId, $title, $content, $userId)) {
        header("Location: ../../pages/Home.php");
        exit();
    } else {
        echo "Error editing note.";
    }
}