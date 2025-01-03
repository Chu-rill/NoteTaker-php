<?php

declare(strict_types=1);

require_once "../repository/note.repository.php";

function new_note(string $username, string $title, string $content, int $userId)
{
    $errors = [];

    if (empty($username) || empty($title) || empty($content) || empty($userId)) {
        $errors["empty_input"] = "All fields are required!";
    }

    if ($errors) {
        $_SESSION["errors_note"] = $errors;
        header("Location: ../../pages/AddNote.php");
        exit();
    }

    $note  = create_note($username, $title, $content, $userId);
    return $note;
}
function edit_note(int $noteId, string $title, string $content, int $userId)
{
    $errors = [];

    if (empty($noteId) || empty($title) || empty($content) || empty($userId)) {
        $errors["empty_input"] = "All fields are required!";
    }

    if ($errors) {
        $_SESSION["errors_edit_note"] = $errors;
        header("Location: ../../pages/EditNote.php");
        exit();
    }
    $note = edit_user_note_by_id($noteId, $title, $content, $userId);
    return $note;
}