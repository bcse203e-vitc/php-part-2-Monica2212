<?php
class PasswordException extends Exception {}
function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordException("Password must be at least 8 characters long");
    }
    if (!preg_match("/[A-Z]/", $password)) {
        throw new PasswordException("Password must contain at least one uppercase letter");
    }
    if (!preg_match("/\d/", $password)) {
        throw new PasswordException("Password must contain at least one digit");
    }
    if (!preg_match("/[@#$%]/", $password)) {
        throw new PasswordException("Password must contain at least one special character (@, #, $, %)");
    }

    return true;
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"] ?? "";

    try {
        if (validatePassword($password)) {
            $message = "<span style='color:green;'>✅ Password is valid</span>";
        }
    } catch (PasswordException $e) {
        $message = "<span style='color:red;'>❌ " . $e->getMessage() . "</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Validator</title>
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
        }
        h2 {
            text-align: center;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Password Validation</h2>
    <form method="post">
        <label for="password">Enter Password:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Validate">
    </form>
    <div class="message"><?php echo $message; ?></div>
</div>

</body>
</html>
