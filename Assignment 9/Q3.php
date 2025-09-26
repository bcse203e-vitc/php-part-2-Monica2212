<?php
$emails = [
    "john@example.com",
    "wrong-email@",
    "me@site",
    "user123@gmail.com",
    "hello.world@domain.co.in",
    "noatsymbol.com",
    "admin@localhost",
    "valid_email@company.org"
];

$pattern = "/^[\w\.-]+@[\w\.-]+\.\w{2,}$/";

$validEmails = [];
foreach ($emails as $email) {
    if (preg_match($pattern, $email)) {
        $validEmails[] = $email;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Valid Email Addresses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            margin-top: 40px;
        }
        ul {
            width: 50%;
            margin: 20px auto;
            padding: 0;
            list-style-type: none;
        }
        li {
            background-color: #fff;
            margin: 5px 0;
            padding: 10px;
            border-left: 5px solid #4CAF50;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2>Valid Email Addresses</h2>

<ul>
    <?php foreach ($validEmails as $email): ?>
        <li><?php echo htmlspecialchars($email); ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
