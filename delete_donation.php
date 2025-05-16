<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["donation_entry"])) {
    $file = "data/donations.txt";
    $donationToDelete = trim($_POST["donation_entry"]);

    if (file_exists($file)) {
        $donations = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $updatedDonations = [];

        foreach ($donations as $donation) {
            if (trim($donation) !== $donationToDelete) { 
                $updatedDonations[] = $donation; 
            }
        }

        file_put_contents($file, implode("\n", $updatedDonations) . "\n");

        header("Location: manage-donations.php");
        exit();
    }
}

// If something goes wrong
header("Location: manage-donations.php?error=1");
exit();
?>
