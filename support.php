<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<?php include 'navbar.php'; ?>


    <main class="underNav">
        <h1>Contact Us</h1>
        <section>
            <h2>Get in Touch</h2>
            <p>If you have any questions, feel free to reach out to us.</p>
            <form id="contact-form">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="message">Your Message</label>
                <textarea id="message" name="message" placeholder="Enter your message" required></textarea>

                <button type="button" onclick="handleContactSubmit()">Send Message</button>
            </form>

            <div id="success-message" style="display: none; margin-top: 10px; font-weight: bold; color: green;">
                Thank you! Your message has been sent.
            </div>
        </section> <br> <br>
    </main>

    <script src="forms.js"></script>

    <?php include 'footer.php'; ?>

</body>

</html>