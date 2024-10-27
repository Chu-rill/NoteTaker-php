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
        $query = "SELECT * FROM notes WHERE users_id = ? ORDER BY created_at ASC";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $notes;
    } catch (PDOException $e) {
        error_log("Error fetching notes: " . $e->getMessage());
        return [];
    }
}
function get_note_by_id($noteId)
{
    try {
        $pdo = db_connect();
        $query = "SELECT * FROM notes WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$noteId]);
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $notes;
    } catch (PDOException $e) {
        error_log("Error fetching notes: " . $e->getMessage());
        return [];
    }
}

function delete_user_note_by_id(int $noteId, int $userId): bool
{
    try {
        $pdo = db_connect();
        $query = "DELETE FROM notes WHERE id = ? AND users_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$noteId, $userId]);

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error deleting note: " . $e->getMessage());
        return false;
    }
}
function edit_user_note_by_id(int $noteId, string $title, string $content, int $userId): bool
{
    try {
        $pdo = db_connect();
        $query = "UPDATE notes SET title = ?, content = ? WHERE id = ? AND users_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $content, $noteId, $userId]);

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error updating note: " . $e->getMessage());
        return false;
    }
}