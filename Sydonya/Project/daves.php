<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

$query = "SELECT Food_Option, Food_Description, Price FROM Food LIMIT 2, 2";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dave's Boathouse Menu | FoxEats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        header {
            background-color: turquoise;
            padding: 10px;
            text-align: center;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .menu-item {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: turquoise;
        }
        p {
            margin-bottom: 0;
        }
        .back-btn {
            display: inline-block;
            background-color: #3cb0fd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }
        .back-btn:hover {
            background-color: #1e87d4;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dave's Boathouse Menu</h1>
    </header>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="menu-item">
                <h2><?= $row['Food_Option'] ?></h2>
                <p><?= $row['Food_Description'] ?></p>
                <p><?= $row['Price'] ?></p>
                <a href="payment.php?food=<?= urlencode($row['Food_Option']) ?>" class="btn">Order</a>
            </div>
        <?php endwhile; ?>
        <!-- Back button -->
        <a href="db_home.php" class="back-btn">Back</a>
    </div>
</body>
</html>

