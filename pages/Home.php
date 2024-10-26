<?php
session_start();
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
        <a href="AddNote.php" button-link">
            <button type="button">Add Note</button>
        </a>
    </header>

</body>

</html>