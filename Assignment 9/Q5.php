<?php
// Step 1: Define log file name
$logFile = "access.log";

// Step 2: Create a log entry
$username = "admin"; // You can change this dynamically
$action = "Logged in"; // You can change this based on activity
$timestamp = date("Y-m-d H:i:s");
$entry = "$username – $timestamp – $action\n";

// Step 3: Append the log entry to the file
file_put_contents($logFile, $entry, FILE_APPEND);

// Step 4: Read the last 5 log entries
$lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$lastFive = array_slice($lines, -5);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Access Log Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 40px;
        }
        h2 {
            text-align: center;
        }
        ul {
            max-width: 600px;
            margin: 20px auto;
            padding: 0;
            list-style-type: none;
        }
        li {
            background-color: #fff;
            margin: 8px 0;
            padding: 12px;
            border-left: 5px solid #2196F3;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Last 5 Log Entries</h2>
<ul>
    <?php foreach ($lastFive as $log): ?>
        <li><?php echo htmlspecialchars($log); ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
