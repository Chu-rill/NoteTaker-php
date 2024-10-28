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
    default:
        echo "Invalid action.";
}

function handleSignup()
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $response = signup_user($username, $email, $password);

    if (is_array($response)) {

        $_SESSION["user_id"] = $response["id"];
        $_SESSION["user_username"] = htmlspecialchars($response["username"]);
        header("Location: ../../pages/Home.php");
        exit();
    } else {
        echo "Error: " . htmlspecialchars($response);
    }
}

function handleLogin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = login_user($username, $password);

    if (is_array($response)) {
        $newSessionId = session_create_id();;
        $sessionId = $newSessionId . "_" . $response["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $response["id"];
        $_SESSION["user_username"] = htmlspecialchars($response["username"]);

        $_SESSION['last_regeneration'] = time();

        header("Location: ../../pages/Home.php");
        exit();
    } else {
        $errors = [];
        echo "Error: " . htmlspecialchars($response); // Display error message
        $errors["login_error"] = "Error loginin!" . $response;
        $_SESSION["errors_login"] = $errors;
        header("Location: ../../pages/index.php");
    }
}