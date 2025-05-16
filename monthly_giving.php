<?php
// Check if the donation was successful
$success = isset($_GET["success"]) ? $_GET["success"] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Giving</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main class="underNav">
        <h1>Support Us with Monthly Giving</h1>
        <section class="giving-info">
            <h2>Your Monthly Support Matters</h2>
            <table>
                <tr>
                    <td>
                        <p>By giving a small amount every month, you can help us continue our work and make a lasting impact on those in need.</p>
                    </td>
                    <td>
                        <img src="images/download (2).jpg" alt="Support Image" style="display: block; margin: 20px auto; max-width: 100%; height: auto;">
                    </td>
                </tr>
            </table>
        </section>

        <section class="giving-form">
            <h2>Start Your Monthly Donation</h2>
            <form id="donation-form" action="process_donation.php" method="post">
                <input type="hidden" name="donation_type" value="monthly">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>


                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="amount">Donation Amount (per month)</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount (e.g., 20)" required>

                <label for="country">Country</label>
                <select id="country" name="country" required>
                    <option value="">Select your country</option>
                    <option value="Egypt">Egypt</option>
                    <option value="France">France</option>
                    <option value="Other">Other</option>
                </select>
                
                <button type="submit">Start Monthly Giving</button>
            </form>

            <?php if ($success == 1): ?>
                <div id="success-message" style="margin-top: 10px; font-weight: bold; color: green;">
                    Thank you! Your monthly donation has been set up successfully.
                </div>
            <?php endif; ?>
        </section>

        <p>Thank you for your ongoing support!</p> <br>
        <a href="engagement.php" class="back-button">Back to Overview</a>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>