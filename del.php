<?php
if (!isset($_GET['email']) || empty($_GET['email'])) {
    die("Error: No email provided.");
}

$emailToDelete = trim($_GET['email']);
$filename = "data/users.txt";

$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$newLines = [];

$lineToDelete = "";

foreach ($lines as $line) {
    $parts = explode("|", $line);
    if (count($parts) < 7) continue;

    if (trim($parts[1]) === $emailToDelete) { 
        $lineToDelete = $line;
    } else {
        $newLines[] = $line;
    }
}

if ($lineToDelete === "") {
    die("Error: Email not found.");
}

file_put_contents($filename, implode(PHP_EOL, $newLines) . PHP_EOL);

header("Location: listusers.php");
exit;
?>
