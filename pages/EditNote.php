<?php
require_once "../includes/config_session.php";
require_once "../includes/repository/note.repository.php"; // Ensure this file provides a function to fetch note data

$noteId = $_GET['note_id'] ?? null;
$note = null;

if ($noteId) {
    // Fetch note from database
    $note = get_note_by_id($noteId);
    if (!$note) {
        echo "Note not found.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <link rel="stylesheet" href="../css/editNote.css">
</head>

<body>
    <h1>Edit Note</h1>
    <form action="../includes/controllers/note.controller.php" method="post" class="edit-form">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="note_id" value="<?php echo htmlspecialchars($noteId); ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" required>
        <label for="content">Content:</label>
        <textarea name="content" required><?php echo htmlspecialchars($note['content']); ?></textarea>
        <button type="submit">Save Changes</button>
    </form>
</body>

</html>