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
    <h1>Signup</h1>

    <form action="../includes/controllers/user.controller.php" method="post">
        <input type="hidden" name="action" value="signup">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <input type="text" name="email" placeholder="E-mail">
        <button>Signup</button>
        <P>Already have an Account<a href="login.php">Login</a></P>
    </form>
    <?php if (isset($_SESSION['errors_signup'])): ?>
    <div class="error-message" style="color: red;">
        <?php
            // Loop through and display all error messages
            foreach ($_SESSION['errors_signup'] as $error) {
                echo "<p>$error</p>";
            }
            unset($_SESSION['errors_signup']); // Clear the error messages after displaying
            ?>
    </div>
    <?php endif; ?>
</body>

</html>