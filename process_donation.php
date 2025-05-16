<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $amount = trim($_POST["amount"]);
    $donationType = isset($_POST["donation_type"]) ? $_POST["donation_type"] : "One-Time";

    if (empty($name) || empty($email) || empty($amount) || empty($donationType)) {
        die("Please fill out all fields.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (!is_numeric($amount) || $amount <= 0) {
        die("Invalid donation amount.");
    }

    if ($donationType === "sponsorship") {
        $project = isset($_POST["project"]) ? trim($_POST["project"]) : "";
        if (empty($project)) {
            die("Please select a project for sponsorship.");
        }
        $donationDetails = "Sponsorship|$name|$email|$amount|Project: $project";
    } elseif ($donationType === "zakat_sadaqah") {
        $zakatType = isset($_POST["zakat_type"]) ? trim($_POST["zakat_type"]) : "";
        if (empty($zakatType)) {
            die("Please specify whether it is Zakat or Sadaqah.");
        }
        $donationDetails = "Zakat/Sadaqah ($zakatType)|$name|$email|$amount";
    } else {
        $donationDetails = "$donationType|$name|$email|$amount";
    }

    $donationData = $donationDetails . "\n";

    if (!is_dir("data")) {
        mkdir("data", 0777, true);
    }

    $file = fopen("data/donations.txt", "a");
    if ($file) {
        fwrite($file, $donationData);
        fclose($file);

        if ($donationType === "Monthly") {
            $redirectPage = "monthly_giving.php";
        } elseif ($donationType === "sponsorship") {
            $redirectPage = "project_sponsorship.php";
        } elseif ($donationType === "zakat_sadaqah") {
            $redirectPage = "zakat_sadaqah.php";
        } else {
            $redirectPage = "one_time_donation.php";
        }

        header("Location: $redirectPage?success=1");
        exit();
    } else {
        die("Unable to save donation data.");
    }
} else {
    header("Location: one_time_donation.php");
    exit();
}
