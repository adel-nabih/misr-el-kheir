<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

$file = "data/donations.txt";

$totalAmount = 0;

if (file_exists($file)) {
    $handle = fopen($file, "r");

    if ($handle) {
        while (!feof($handle)) {
            $line = fgets($handle);
            $line = trim($line);

            if (!empty($line)) {
                $parts = explode("|", $line);
                if (count($parts) >= 4) { 
                    $amount = floatval(trim($parts[3])); 
                    $totalAmount += $amount;
                }
            }
        }
        fclose($handle);
    }
}

$users = file_exists("data/users.txt") ? array_filter(file("data/users.txt", FILE_IGNORE_NEW_LINES), 'strlen') : [];
$userCount = max(0, count($users));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Misr El Kheir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.svg" alt="Misr El Kheir Foundation Logo" width="100" height="100">
            </a>
            <div class="navbar-nav ms-auto">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Welcome, <?= $_SESSION['admin']; ?>!</h2>
        
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Donations</h5>
                        <p class="card-text fs-3"><?= number_format($totalAmount, 2); ?> EGP</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registered Users</h5>
                        <p class="card-text fs-3"><?= $userCount; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="manage-donations.php" class="btn btn-primary">Manage Donations</a>
            <a href="listusers.php" class="btn btn-primary">Manage Users</a>
        </div>
    </div>
</body>
</html>
