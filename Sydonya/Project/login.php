<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch the user's record from the database
    $query = "SELECT * FROM User WHERE Username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Compare the password entered by the user with the password stored in the database
        if ($password == $user['Password']) {
            // Passwords match, set session variable and redirect
            $_SESSION["username"] = $username;
            header("Location: db_home.php");
            exit; // Add exit to prevent further execution
        } else {
            // Passwords don't match, show error
            $error = "Username or password is incorrect.";
        }
    } else {
        // User not found, show error
        $error = "Username or password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .login-box {
            width: 500px;
            padding: 60px;
            border: 3px solid #ccc;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align */
            display: inline-block;
        }
        h1 {
            color: turquoise;
            font-size: 72px; /* 2 times bigger than previous */
            margin-bottom: 20px;
        }
        h3 {
            color: black; /* Change color to black */
            font-size: 24px;
            margin-top: 0; /* Remove default margin */
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            font-size: 22px;
            text-align: left; /* Align left */
            display: block; /* Make each label on a new line */
        }
        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            font-size: 20px;
            border-radius: 8px;
            border: 2px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: turquoise;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #48D1CC;
        }
        .error {
            color: red;
            font-size: 20px;
        }
    </style>
	<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>FoxEats</h1>
        <div class="login-box">
            <h3>Please Login with your Rollins Account to Start your Order</h3>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required onkeypress="return blockSpecialChar(event)"/><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required onkeypress="return blockSpecialChar(event)"/><br>
                <button type="submit">Login</button>
            </form>
            <?php if (isset($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Disable forward navigation until user logs in
        window.onload = function() {
            disableForwardNavigation();
        };

        function disableForwardNavigation() {
            var links = document.querySelectorAll('a[onclick="window.history.forward()"]');
            for (var i = 0; i < links.length; i++) {
                links[i].onclick = function() {
                    alert("Please login to proceed.");
                    return false;
                };
            }
        }
    </script>
</body>
</html>
