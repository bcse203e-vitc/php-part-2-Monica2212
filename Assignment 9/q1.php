<?php
$students = [
    "Rahul" => 85,
    "Priya" => 92,
    "Arun" => 78,
    "Sneha" => 88,
    "Kiran" => 95,
    "Divya" => 81,
    "Vikram" => 89
];

arsort($students);

$topStudents = array_slice($students, 0, 3, true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top 3 Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-top: 40px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #e0e0e0;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Top 3 Students by Marks</h2>

<table>
    <tr>
        <th>Student Name</th>
        <th>Marks</th>
    </tr>
    <?php foreach ($topStudents as $name => $marks): ?>
        <tr>
            <td><?php echo htmlspecialchars($name); ?></td>
            <td><?php echo $marks; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
