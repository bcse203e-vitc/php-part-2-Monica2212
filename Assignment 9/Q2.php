<?php
$filename = "products.txt";
if (!file_exists($filename)) {
    die("File not found.");
}

$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$products = [];

foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) == 2) {
        $products[] = [
            "name" => trim($parts[0]),
            "price" => (float)trim($parts[1])
        ];
    }
}

usort($products, fn($a, $b) => $a['price'] <=> $b['price']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            margin-top: 30px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            padding: 10px;
            border: 1px solid #999;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h2>Sorted Product List</h2>

<table>
    <tr>
        <th>Product Name</th>
        <th>Price (₹)</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo number_format($product['price'], 2); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
