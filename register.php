<?php
// register.php

// Include the registration processing logic
include_once 'process_register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Misr El Kheir</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div id="register-container">
    <div class="register-box">
        <h2>Register</h2>
        <form action="" method="post">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
            <span class="error"><?php echo $fullname_err; ?></span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"><?php echo $email_err; ?></span>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $password_err; ?></span>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <span class="error"><?php echo $confirm_password_err; ?></span>

            <label>Gender</label>
            <input type="radio" name="gender" value="Male" <?php echo ($gender == "Male") ? "checked" : ""; ?>> Male
            <input type="radio" name="gender" value="Female" <?php echo ($gender == "Female") ? "checked" : ""; ?>> Female
            <span class="error"><?php echo $gender_err; ?></span>

            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>">

            <label for="country">Country</label>
            <select id="country" name="country">
                <option value="">Select your country</option>
                <option value="Egypt" <?php echo ($country == "Egypt") ? "selected" : ""; ?>>Egypt</option>
                <option value="India" <?php echo ($country == "India") ? "selected" : ""; ?>>India</option>
                <option value="Other" <?php echo ($country == "Other") ? "selected" : ""; ?>>Other</option>
            </select>
            <span class="error"><?php echo $country_err; ?></span>

            <label>Interests</label>
            <input type="checkbox" name="interests[]" value="Education" <?php echo (strpos($interests, "Education") !== false) ? "checked" : ""; ?>> Education
            <input type="checkbox" name="interests[]" value="Healthcare" <?php echo (strpos($interests, "Healthcare") !== false) ? "checked" : ""; ?>> Healthcare
            <input type="checkbox" name="interests[]" value="Environment" <?php echo (strpos($interests, "Environment") !== false) ? "checked" : ""; ?>> Environment
            <input type="checkbox" name="interests[]" value="Community" <?php echo (strpos($interests, "Community") !== false) ? "checked" : ""; ?>> Community
            <br> <br>
            <button type="submit">Register</button>
            <p><a href="login.php">Already have an account? Login</a></p>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

<style>
    .error {
        color: red;
        font-size: 14px;
    }
</style>

</body>
</html>