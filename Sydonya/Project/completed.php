<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET["food"])) {
    $food = $_GET["food"];
    $username = $_SESSION["username"];

    $query = "INSERT INTO Orders (Username, Order_History, Status, Update_Time) VALUES ('$username', '$food', 'Received', NOW())";
    mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Received | FoxEats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Light gray background */
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 60px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* White background */
            position: relative;
        }
        header {
            background-color: turquoise;
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
        }
        h1, p {
            text-align: center;
        }
        footer {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }
        footer button {
            background-color: turquoise;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        footer button:hover {
            background-color: #3cb0fd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Order Received</h1>
    </header>
    <div class="container">
        <p>Thank you for your order. We have received it!</p>
        
        <footer>
            <form action="db_home.php" method="get">
                <button type="submit">Home</button>
            </form>
        </footer>
    </div>
</body>
</html>
