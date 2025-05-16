<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: adminDashboard.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminID = $_POST['admin-id'];
    $password = $_POST['password'];

    $lines = file("data/admins.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($storedID, $storedPass) = explode(":", $line);
        if ($adminID === $storedID && $password === $storedPass) {
            $_SESSION['admin'] = $adminID;
            header("Location: adminDashboard.php");
            exit();
        }
    }

    $error = "Invalid Admin ID or password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Misr El Kheir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="login-container">
        <div class="login-box">
            <h2>Admin Login</h2>
            <form method="POST" action="">
                <label for="admin-id">Admin ID</label>
                <input type="text" id="admin-id" name="admin-id" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                <p><a href="index.php">Back to Home</a></p>
            </form>
            
            <?php if ($error): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
