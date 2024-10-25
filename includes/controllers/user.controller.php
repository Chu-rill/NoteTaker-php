<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once "../service/user.service.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../pages/signup.php");
    die();
}

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'signup':
        handleSignup();
        break;
    case 'login':
        handleLogin();
        break;
        // case 'edit':
        //     handleEdit();
        //     break;
        // case 'delete':
        //     handleDelete();
        //     break;
    default:
        echo "Invalid action.";
}

function handleSignup()
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $response = signup_user($username, $email, $password);

    if ($response === true) {
        header("Location: ../../pages/Home.php");
        exit();
    } else {
        echo $response; // Display error message
    }
}

function handleLogin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = login_user($username, $password);

    if ($response === true) {
        header("Location: ../../pages/Home.php");
        exit();
    } else {
        echo $response; // Display error message
    }
}