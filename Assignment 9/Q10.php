<?php
$inputFile = "students.txt";
$errorFile = "errors.log";
$validStudents = [];
$errors = [];

$pattern = "/^[\w\.-]+@[\w\.-]+\.\w{2,}$/";

$lines = file($inputFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) !== 3 || !preg_match($pattern, $parts[1])) {
        $errors[] = $line;
        continue;
    }

    $name = trim($parts[0]);
    $email = trim($parts[1]);
    $dob = new DateTime(trim($parts[2]));
    $age = $dob->diff(new DateTime())->y;

    $validStudents[] = ["name" => $name, "email" => $email, "age" => $age];
}

file_put_contents($errorFile, implode("\n", $errors));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Valid Student Records</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 60%;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>
<h2 style="text-align:center;">Valid Student Records</h2>
<table>
    <tr><th>Name</th><th>Email</th><th>Age</th></tr>
    <?php foreach ($validStudents as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td><?php echo $student['age']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
