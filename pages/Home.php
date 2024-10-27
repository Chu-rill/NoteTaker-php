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
    <link rel="stylesheet" href="../css/Home.css">
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

            <section>
                <h1><?php echo htmlspecialchars($note["id"]); ?></h1>
                <div class="actions">
                    <button class="edit">Edit</button>
                    <form action="../includes/controllers/note.controller.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <button class="delete" data-id="<?php echo $note['id']; ?>">Delete</button>
                    </form>
                </div>

            </section>
            <h2><?php echo htmlspecialchars($note["title"]); ?></h2>
            <p><?php echo htmlspecialchars($note["content"]); ?></p>
            <small>Created at: <?php echo htmlspecialchars($note["created_at"]); ?></small>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
    document.querySelectorAll(".delete").forEach((button) => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const noteId = this.getAttribute("data-id");

            const form = document.createElement("form");
            form.method = "post";
            form.action = "../includes/controllers/note.controller.php";

            const actionInput = document.createElement("input");
            actionInput.type = "hidden";
            actionInput.name = "action";
            actionInput.value = "delete";
            form.appendChild(actionInput);

            const idInput = document.createElement("input");
            idInput.type = "hidden";
            idInput.name = "note_id";
            idInput.value = noteId;
            form.appendChild(idInput);

            document.body.appendChild(form);
            form.submit();
        });
    });
    </script>
</body>

</html>