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
        <form method="POST" action="add_note.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="5" required></textarea>

            <button type="submit">Add Note</button>
        </form>
    </div>
</body>

</html>