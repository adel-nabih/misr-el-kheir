<?php

$success = isset($_GET["success"]) ? $_GET["success"] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Time Donation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="underNav">
        <h1>Make a One-Time Donation</h1>
        <h2>Your Contribution Makes a Difference</h2>
        <p>Your one-time donation will help us support our projects, impacting lives and bringing positive change.</p>

        <section class="donation-form">
            <h2>Donation Form</h2>
            <form id="donation-form" action="process_donation.php" method="post">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="amount">Donation Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount (e.g., 50)" required>

                <button class="donate" type="submit">Donate Now</button>
            </form>

            <?php if ($success == 1): ?>
                <div id="success-message" style="margin-top: 10px; font-weight: bold; color: green;">
                    Thank you! Your donation has been processed successfully.
                </div>
            <?php endif; ?>
        </section>

        <img src="images/download (1).jpg" style="margin: auto;">
        <p>Thank you for your generosity!</p> <br>
        <a href="engagement.php" class="back-button">Back to Overview</a>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>