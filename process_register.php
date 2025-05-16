<?php

session_start();

$fullname = $email = $password = $confirm_password = $gender = $age = $country = $interests = "";
$fullname_err = $email_err = $password_err = $confirm_password_err = $gender_err = $country_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Full name is required.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Password is required.";
    } elseif (strlen($_POST["password"]) < 6) {
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm your password.";
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $confirm_password_err = "Passwords do not match.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
    }

    if (empty($_POST["gender"])) {
        $gender_err = "Please select your gender.";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["country"])) {
        $country_err = "Please select your country.";
    } else {
        $country = trim($_POST["country"]);
    }

    if (!empty($_POST["interests"]) && is_array($_POST["interests"])) {
        $interests = implode(",", $_POST["interests"]);
    }

    if (empty($fullname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($gender_err) && empty($country_err)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user_data = "$fullname|$email|$hashed_password|$gender|$age|$country|$interests\n";
        file_put_contents("data/users.txt", $user_data, FILE_APPEND);
        header("Location: login.php");
        exit();
    }
}
?>