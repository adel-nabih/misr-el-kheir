<?php
session_start();

$email = "";
$password = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        $file = fopen("data/users.txt", "r");
        if ($file) {
            $login_successful = false;

            while (!feof($file)) {
                $line = fgets($file);
                if (empty(trim($line))) {
                    continue;
                }
                $user = explode("|", trim($line));

                if (count($user) >= 3) {
                    list($stored_fullname, $stored_email, $stored_password) = $user;

                    if ($email === $stored_email) {
                        if (password_verify($password, $stored_password)) {
                            $_SESSION["fullname"] = $stored_fullname;
                            $login_successful = true;
                            break;
                        } else {
                            $error = "Invalid email or password.";
                            break;
                        }
                    }
                }
            }

            fclose($file);

            if ($login_successful) {
                header("Location: dashboard.php");
                exit();
            } elseif (empty($error)) {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Unable to read user data.";
        }
    }
}
?>