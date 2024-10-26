<?php

declare(strict_types=1);

require_once "../db.php";

function create_user(string $username, string $email, string $hashedPwd)
{
    try {
        $pdo = db_connect();
        $query = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $email, $hashedPwd]);

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        return $user;
    } catch (PDOException $e) {
        error_log("Error creating user: " . $e->getMessage());
        return false;
    }
}
function get_user(string $username)
{
    try {
        $pdo = db_connect();
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        return $user;
    } catch (PDOException $e) {
        error_log("Error fetching username: " . $e->getMessage());
        return null;
    }
}

function get_username(string $username)
{
    try {
        $pdo = db_connect();
        $query = "SELECT username FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        return $user;
    } catch (PDOException $e) {
        error_log("Error fetching username: " . $e->getMessage());
        return null;
    }
}
function get_email(string $email)
{
    try {
        $pdo = db_connect();
        $query = "SELECT email FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $email = $stmt->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
        return $email;
    } catch (PDOException $e) {
        error_log("Error fetching email: " . $e->getMessage());
        return null;
    }
}