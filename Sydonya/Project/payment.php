<?php
session_start();

// Include the database connection
include 'db_connection.php';

// Initialize an empty array to store selected food items
if (!isset($_SESSION['selectedItems'])) {
    $_SESSION['selectedItems'] = [];
}

$selectedItems = $_SESSION['selectedItems'];

// Add new selected item to the list if submitted from the menu
if (isset($_GET["food"])) {
    $selectedFood = $_GET["food"];
    array_push($selectedItems, $selectedFood);
    $_SESSION['selectedItems'] = $selectedItems;
}

// Remove selected item from the list if requested
if (isset($_GET["remove"])) {
    $item_to_remove = $_GET["remove"];
    $key = array_search($item_to_remove, $selectedItems);
    if ($key !== false) {
        unset($selectedItems[$key]);
        $_SESSION['selectedItems'] = array_values($selectedItems); // Reindex the array
    }
}

// Remove all selected items if requested
if (isset($_POST["remove_all"])) {
    $_SESSION['selectedItems'] = [];
    header("Location: db_home.php");
    exit;
}

// Calculate total price for all selected items
$totalPrice = 0;
foreach ($selectedItems as $item) {
    // Fetch price for each item from the database
    $price = getPriceFromDatabase($item, $conn); // Pass the database connection
    $totalPrice += $price;
}

// Function to fetch price from database
function getPriceFromDatabase($item, $conn) {
    // Query to fetch price from the Food table
    $query = "SELECT Price FROM Food WHERE Food_Option = '$item'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row["Price"];
    } else {
        return 0; // Return 0 if price not found (handle error as needed)
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order | FoxEats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        h1, h2, p {
            text-align: center;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .remove-link {
            color: #333;
            text-decoration: none;
            margin-left: 10px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-container .btn {
            background-color: turquoise;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn-container .btn:hover {
            background-color: #3cb0fd;
        }
    </style>
	<script type="text/javascript">
    function blockSpecialChar(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || k == 45 || (k >= 48 && k <= 57));
    }
</script>
</head>
<body>
    <header>
        <h1>Confirm Order</h1>
    </header>
    <div class="container">
        <?php if (!empty($selectedItems)) : ?>
            <h2>Selected Items:</h2>
            <form action="" method="post"> <!-- Updated form action -->
                <ul id="selectedItems">
                    <?php 
                    $index = 1;
                    foreach ($selectedItems as $item) : ?>
                        <li>
                            <span><?= $index ?>. </span>
                            <?= $item ?>
                            <a href="payment.php?remove=<?= urlencode($item) ?>" class="remove-link" onclick="return confirm('Are you sure you want to remove this item?')">Remove</a>
                        </li>
                    <?php 
                    $index++;
                    endforeach; ?>
                </ul>
                <p>Total Amount: $<?= $totalPrice ?></p>
                <div class="btn-container">
                    <a href="db_home.php" class="btn">Add More</a>
                    <button type="submit" name="remove_all" class="btn">Delete Order</button>
                    <a href="order.php" class="btn">Pay</a>
                </div>
            </form>
        <?php else : ?>
            <p>No items selected.</p>
            <a href="db_home.php" class="btn">Add Items</a>
        <?php endif; ?>
    </div>
</body>
</html>
