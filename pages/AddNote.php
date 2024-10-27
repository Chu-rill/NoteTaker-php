<?php
require_once "../includes/config_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
    <link rel="stylesheet" href="../css//Note.css">
</head>

<body>
    <div class="note-container">
        <h1>Add a New Note</h1>
        <?php if (isset($_GET['success'])): ?>
        <p class="success">Note added successfully!</p>
        <?php endif; ?>
        <form method="POST" action="../includes/controllers/note.controller.php">
            <input type="hidden" name="action" value="create">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="5"></textarea>

            <button type="submit">Add Note</button>
        </form>
        <?php if (isset($_SESSION['errors_note'])): ?>
        <div class="error-message" style="color: red;">
            <?php
                // Loop through and display all error messages
                foreach ($_SESSION['errors_note'] as $error) {
                    echo "<p>$error</p>";
                }
                unset($_SESSION['errors_note']); // Clear the error messages after displaying
                ?>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>