<?php
session_start();

if (!isset($_SESSION["fullname"])) {
    header("Location: login.php");
    exit();
}

$fullname = $_SESSION["fullname"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Misr El Kheir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="underNav">
<div class="dashboard-container">
    <h1>Welcome, <?php echo htmlspecialchars($fullname); ?>!</h1>
</div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>