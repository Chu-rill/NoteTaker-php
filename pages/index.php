<?php
require_once "../includes/config_session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Taker</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <h1>Login</h1>

    <form action="../includes/controllers/user.controller.php" method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button>Login</button>
        <P>Don't have an Account<a href="signup.php">Signup</a></P>
    </form>
    <?php if (isset($_SESSION['errors_login'])): ?>
    <div class="error-message" style="color: red;">
        <?php
            // Loop through and display all error messages
            foreach ($_SESSION['errors_login'] as $error) {
                echo "<p>$error</p>";
            }
            unset($_SESSION['errors_login']); // Clear the error messages after displaying
            ?>
    </div>
    <?php endif; ?>
</body>

</html>