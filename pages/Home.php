<?php
session_start();
$username = $_SESSION["user_username"] ?? "User";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>

<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
</body>

</html>