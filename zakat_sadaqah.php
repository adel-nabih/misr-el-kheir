<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakat & Sadaqah</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php include 'navbar.php'; ?>


    <main class="underNav">
        <h1>Zakat and Sadaqa</h1>
        <section class="giving-info">
            <h2>What is Zakat and Sadaqah?</h2>
            <p>Zakat is a mandatory form of almsgiving in Islam, representing a portion of one’s wealth given to those
                in need. Sadaqah is voluntary charity given beyond the obligatory Zakat, a way of purifying one's wealth
                and doing good deeds for others.</p>
            <p>Your donation helps support the most vulnerable in society, allowing them to live with dignity and
                respect.</p>
        </section>

        <section class="donation-form">
            <h2>Donate to Zakat & Sadaqah</h2>
            <form id="zakat-form" action="process_donation.php" method="post">
                <input type="hidden" name="donation_type" value="zakat_sadaqah">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="amount">Donation Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter amount (e.g., 50)" required>

                <label for="donation-type">Donation Type</label>
                <select id="donation-type" name="donation_type" required>
                    <option value="">Select donation type</option>
                    <option value="zakat">Zakat</option>
                    <option value="sadaqah">Sadaqah</option>
                </select>

                <button type="submit">Donate Now</button>
            </form>

            <div id="success-message" style="display: none; margin-top: 10px; font-weight: bold; color: green;">
                Thank you! Your donation is greatly appreciated.
            </div>

        </section>
        <p>Thank you for your generous support!</p><br>
        <a href="engagement.php" class="back-button">Back to Overview</a>
    </main>
    <script src="forms.js"></script>
    <?php include 'footer.php'; ?>

</body>

</html>