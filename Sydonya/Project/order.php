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

    $query = "INSERT INTO Orders (Username, Order_History, Status, Update_Time) VALUES ('$username', '$food', 'Preparing', NOW())";
    mysqli_query($conn, $query);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentMethod = $_POST["payment-method"];
    if ($paymentMethod == "R-Card") {
        $foxId = $_POST["foxid"];
        // Check if the FoxID exists and matches with the user
        $query = "SELECT * FROM User WHERE Fox_ID = '$foxId' AND Username = '{$_SESSION["username"]}'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            // FoxID matches, proceed to completed.php
            header("Location: completed.php");
            exit;
        } else {
            // FoxID does not match or does not exist, display error message
            $errorMessage = "Invalid FoxID. Please try again.";
        }
    } elseif ($paymentMethod == "Credit Card") {
        $creditCardNumber = $_POST["credit-card"];
        // Check if the Credit Card number exists and matches with the user
        $query = "SELECT * FROM Payment WHERE Credit_Card = '$creditCardNumber' AND FoxID = (SELECT Fox_ID FROM User WHERE Username = '{$_SESSION["username"]}') ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            // Credit Card number exists, proceed to completed.php
            header("Location: completed.php");
            exit;
        } else {
            // Credit Card number does not match or does not exist, display error message
            $errorMessage = "Invalid Credit Card Number. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method | FoxEats</title>
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
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* White background */
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
        .payment-option {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .payment-option input[type="submit"],
        .payment-option input[type="button"] {
            background-color: turquoise;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .payment-option input[type="submit"]:hover,
        .payment-option input[type="button"]:hover {
            background-color: #3cb0fd;
        }
        /* Styling for the Back button */
        .payment-option input[type="button"].back-button {
            background-color: turquoise;
        }
        .payment-option input[type="button"].back-button:hover {
            background-color: #3cb0fd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Select Payment Method</h1>
    </header>
    <div class="container">
        <p>Please select your payment method:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="payment-option">
            <input type="hidden" name="food" value="<?php echo isset($_GET['food']) ? htmlspecialchars($_GET['food']) : ''; ?>">
            <input type="hidden" name="payment-method" id="paymentMethod">
            <!-- Back button with the same color as other buttons -->
            <input type="button" value="Back" onclick="window.location.href='payment.php'" class="back-button">
            <input type="button" value="R-Card" class="payment-button" data-method="R-Card">
            <input type="button" value="Credit Card" class="payment-button" data-method="Credit Card">
            <br><br>
            <div id="foxIdDiv" style="display: none;">
                <label for="foxid">Enter FoxID:</label>
                <input type="text" id="foxid" name="foxid"><br><br>
                        <input type="submit" value="Proceed">
            </div>
            <div id="creditCardDiv" style="display: none;">
                <label for="credit-card">Enter Credit Card Number:</label>
                <input type="text" id="credit-card" name="credit-card"><br><br>
                        <input type="submit" value="Proceed">
            </div>
            
        </form>
        <?php if (isset($errorMessage)) : ?>
            <p style="color: red; text-align: center;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>

    <script>
        const paymentButtons = document.querySelectorAll('.payment-button');
        const paymentForm = document.querySelector('.payment-option');
        const foxIdDiv = document.getElementById('foxIdDiv');
        const creditCardDiv = document.getElementById('creditCardDiv');

        paymentButtons.forEach(button => {
            button.addEventListener('click', function() {
                const method = this.getAttribute('data-method');
                if (method === 'R-Card') {
                    foxIdDiv.style.display = 'block';
                    creditCardDiv.style.display = 'none';
                } else {
                    foxIdDiv.style.display = 'none';
                    creditCardDiv.style.display = 'block';
                }
                document.getElementById('paymentMethod').value = method;
            });
        });
    </script>
</body>
</html>