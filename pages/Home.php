<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "../includes/repository/note.repository.php";

$userId = $_SESSION["user_id"];
$notes = get_user_notes($userId);

$username = $_SESSION["user_username"] ?? "User";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    <link rel="stylesheet" href="../css//Home.css">
</head>

<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <a href="AddNote.php" class="button-link">
            <button type="button">Add Note</button>
        </a>
    </header>
    <div class="notes-container">
        <?php if (empty($notes)): ?>
        <div class="no-notes">No Note<span style="margin-left: 5px; font-weight:800;">Add Note</span></div>
        <?php else: ?>
        <?php foreach ($notes as $note): ?>
        <div class="note">
            <h2><?php echo htmlspecialchars($note["title"]); ?></h2>
            <p><?php echo htmlspecialchars($note["content"]); ?></p>
            <small>Created at: <?php echo htmlspecialchars($note["created_at"]); ?></small>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>


</body>

</html>