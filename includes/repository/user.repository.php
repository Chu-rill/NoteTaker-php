<?php

require_once "../db.php";

function create_user($username, $email, $password)
{
    try {
        $pdo = db_connect();
        $query = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
        return $stmt->execute([$username, $email, $hashedPwd]);
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
}