<?php
date_default_timezone_set("Asia/Kolkata");

$currentDateTime = date("d-m-Y H:i:s");

$dobInput = "1990-05-15"; 

$today = new DateTime();
$dob = DateTime::createFromFormat("Y-m-d", $dobInput);

$nextBirthday = DateTime::createFromFormat("Y-m-d", $today->format("Y") . "-" . $dob->format("m-d"));

if ($nextBirthday < $today) {
    $nextBirthday->modify('+1 year');
}

$interval = $today->diff($nextBirthday);
$daysLeft = $interval->days;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Birthday Countdown</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
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
        p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Birthday Countdown</h2>
    <p><strong>Current Date and Time:</strong> <?php echo $currentDateTime; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo date("d-m-Y", strtotime($dobInput)); ?></p>
    <p><strong>Days Until Next Birthday:</strong> <?php echo $daysLeft; ?> days</p>
</div>

</body>
</html>
