
<html>
<head>
   <title>Project Sponsorship</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'navbar.php'; ?>


    <main class="underNav">
        <h1>Sponsor a Project</h1>
                <h2>Make a Difference through Project Sponsorship</h2>
            <table>
                <tr>
                    <td>
                        <p>By sponsoring a specific project, you help bring positive change to communities in need. Your sponsorship ensures that we can complete vital projects that improve lives.</p>
                    </td>
                    <td>
                        <img src="images/images (1).jpg" style="margin: auto;">
                    </td>
                </tr>
            </table>
            <section>
                <h2>Choose a Project to Sponsor</h2>
                <form id="sponsor-form" action="process_donation.php" method="post">
                    <input type="hidden" name="donation_type" value="sponsorship">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>

                    

                    <label for="project">Select a Project</label>
                    <select id="project" name="project" required>
                        <option value="">Select a project</option>
                        <option value="education">Education for All</option>
                        <option value="healthcare">Healthcare for Communities</option>
                        <option value="clean-water">Clean Water Initiative</option>
                        <option value="food-security">Food Security Programs</option>
                    </select>

                    <label for="amount">Sponsorship Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter amount (e.g., 500)" required>

                    

                    <button type="submit">Sponsor Now</button>
                </form>
            
                <div id="success-message" style="display: none; margin-top: 10px; font-weight: bold; color: green;">
                    Thank you! Your sponsorship has been successfully submitted.
                </div>
            </section>
        <p>Thank you for making a difference!</p> <br>
        <a href="engagement.php" class="back-button">Back to Overview</a>
    </main>

    <script src="forms.js"></script>
    <?php include 'footer.php'; ?>

</body>
</html>
