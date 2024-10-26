<?php

declare(strict_types=1);

require_once __DIR__ . "/../db.php";

function create_note(string $username, string $title, string $content, int $userId)
{
    try {
        $pdo = db_connect();
        $query = "INSERT INTO notes (username, title, content, users_id) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $title, $content, $userId]);

        $pdo = null;
        $stmt = null;
        return true;
    } catch (PDOException $e) {
        error_log("Error creating user: " . $e->getMessage());
        return false;
    }
}

// note.service.php

function get_user_notes(int $userId)
{
    try {
        $pdo = db_connect();
        $query = "SELECT * FROM notes WHERE users_id = ? ORDER BY created_at DESC";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    } catch (PDOException $e) {
        error_log("Error fetching notes: " . $e->getMessage());
        return [];
    }
}