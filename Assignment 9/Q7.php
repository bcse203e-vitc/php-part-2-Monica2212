<?php
function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new Exception("No numbers provided");
    }
    return array_sum($numbers) / count($numbers);
}

$numbers = [10, 20, 30, 40, 50]; 
$message = "";
try {
    $average = calculateAverage($numbers);
    $message = "<span style='color:green;'>✅ Average: $average</span>";
} catch (Exception $e) {
    $message = "<span style='color:red;'>❌ Error: " . $e->getMessage() . "</span>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Average Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 40px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        .result {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Average of Numbers</h2>
    <p><strong>Input Array:</strong> <?php echo implode(", ", $numbers); ?></p>
    <div class="result"><?php echo $message; ?></div>
</div>

</body>
</html>
