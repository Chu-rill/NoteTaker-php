<?php

require_once "../repository/user.repository.php";

function signup_user($username, $email, $password)
{
    if (empty($username) || empty($email) || empty($password)) {
        return "All fields are required!";
    }

    // Add additional validation if needed, like email format
    return create_user($username, $email, $password);
}