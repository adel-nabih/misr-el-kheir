<?php
// Start the session
session_start();
?>

<header>
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="images/logo.svg" alt="Misr El Kheir Foundation Logo" width=100px height=100px></a>
        </div>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="mission.php">About Us</a>
                    <ul class="dropdown">
                        <li><a href="history.php">History</a></li>
                        <li><a href="leadership.php">Leadership Team</a></li>
                    </ul>
                </li>
                <li>
                    <a href="achievements.php">Programs</a>
                    <ul class="dropdown">
                        <li><a href="education.php">Education Initiatives</a></li>
                        <li><a href="health.php">Healthcare Programs</a></li>
                        <li><a href="economic.php">Economic Empowerment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="volunteers.php">Volunteer</a>
                    <ul class="dropdown">
                        <li><a href="engagement.php">Engagement</a></li>
                        <li><a href="overview.php">Achievements</a></li>
                    </ul>
                </li>
                <li><a href="one_time_donation.php" class="donate-button">Donate</a></li>
                <li>
                    <a href="support.php">Contact</a>
                    <ul class="dropdown">
                        <li><a href="information.php">Information</a></li>
                        <li><a href="support.php">Support</a></li>
                    </ul>
                </li>
                <li>
                    <?php if (isset($_SESSION["fullname"])): ?>
                        <a href="logout.php" class="login-button">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="login-button">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>