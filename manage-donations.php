<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Donations</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Amount (EGP)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    session_start();
                    if (!isset($_SESSION['admin'])) {
                        header("Location: adminlogin.php");
                        exit();
                    }

                    $file = "data/donations.txt";
                    $donations = [];

                    if (file_exists($file)) {
                        $handle = fopen($file, "r");
                        while (!feof($handle)) {
                            $line = trim(fgets($handle));
                            if (!empty($line)) {
                                $donations[] = $line;
                            }
                        }
                        fclose($handle);
                    }

                    foreach ($donations as $donation): 
                        $parts = explode("|", $donation);
                        if (count($parts) < 4) continue; 
                        list($type, $name, $email, $amount) = $parts;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($type); ?></td>
                            <td><?= htmlspecialchars($name); ?></td>
                            <td><?= htmlspecialchars($email); ?></td>
                            <td><?= number_format((float) $amount, 2); ?></td>
                            <td>
                            <form action="delete_donation.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this donation?');">
                                <input type="hidden" name="donation_entry" value="<?= htmlspecialchars($donation); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="adminDashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
