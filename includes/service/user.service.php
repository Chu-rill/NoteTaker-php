<?php

declare(strict_types=1);

require_once "../repository/user.repository.php";
require_once "../utils/email.validation.php";
require_once "../config_session.php";

function signup_user(string $username, string $email, string $password): bool|array
{

    $errors = [];

    if (empty($username) || empty($email) || empty($password)) {
        $errors["empty_input"] = "All fields are required!";
    }
    if (!is_email_valid($email)) $errors["invalid_email"] = "Invalid email!";
    if (get_email($email)) $errors["email_used"] = "Email already Exist";
    if (get_username($username)) $errors["username_used"] = "User already Exist";

    if ($errors) {
        $_SESSION["errors_signup"] = $errors;
        header("Location: ../../pages/signup.php");
        exit();
    }

    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

    $user = create_user($username, $email, $hashedPwd);
    return $user;
}

function login_user(string $username, string $password): bool|array
{
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors["empty_input"] = "All fields are required!";
    }
    if (!get_username($username)) $errors["username"] = "User Not Found";
    $user = get_user($username);
    if ($user && isset($user['pwd']) && password_verify($password, $user['pwd'])) {
        return $user; // Successful login
    } else {
        $errors["password"] = "Incorrect password";
    }

    if ($errors) {
        $_SESSION["errors_login"] = $errors;
        header("Location: ../../pages/login.php");
        exit();
    }


    return false;
}