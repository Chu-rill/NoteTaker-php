<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require_once "../service/user.service.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../../pages/signup.php");
    die();
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

echo "Controller";

$result = signup_user($username, $email, $password);

if ($result === true) {
    header("Location: ../../pages/success.php");
    exit();
} else {
    echo $result; // Display error message
}