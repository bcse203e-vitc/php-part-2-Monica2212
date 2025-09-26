<?php
date_default_timezone_set("Asia/Kolkata"); 
$originalFile = "data.txt";exists
if (!file_exists($originalFile)) {
    $message = "<span style='color:red;'> File '$originalFile' not found.</span>";
} else {
    $timestamp = date("Y-m-d_H-i");
    $pathInfo = pathinfo($originalFile);
    $backupFile = $pathInfo['filename'] . "_" . $timestamp . "." . $pathInfo['extension'];

    if (copy($originalFile, $backupFile)) {
        $message = "<span style='color:green;'> Backup created successfully: <strong>$backupFile</strong></span>";
    } else {
        $message = "<span style='color:red;'> Failed to create backup.</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Backup File Creator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .message {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Backup File Creation</h2>
    <p><strong>Original File:</strong> <?php echo $originalFile; ?></p>
    <div class="message"><?php echo $message; ?></div>
</div>

</body>
</html>
