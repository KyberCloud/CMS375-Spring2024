<!DOCTYPE html>
<html>
<head>
    <title>Testing HTML</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333; /* Dark gray text color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Shadow effect */
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-family: 'Lobster', cursive; /* Fancy font */
            color: #00cc66; /* Green title */
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc; /* Gray border */
            border-radius: 5px; /* Rounded corners */
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        .button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff; /* Blue button background */
            color: #fff; /* White button text color */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            margin-bottom: 15px;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
        }

        .button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> <!-- Import Lobster font -->
</head>

<body>

<div class="container">
    <h1>Test Code</h1>

    <?php
    if (array_key_exists('button', $_POST))
        button();

    if (array_key_exists('buttons', $_POST))
        buttons();

    function button()
    {
        echo 'Hello World!';
    }

    function buttons()
    {
        echo 'Its Sydonya';
    }
    ?>

    <div id="display"></div>
    <input type="text" id="inputBox">
    <button onclick="displayText()" class="button">Display Text</button>

    <form method="post">
        <input type="submit" name="button" class="button" value="Button" />
    </form>

    <form method="post">
        <input type="submit" name="buttons" class="button" value="Please" />
    </form>

    <a href="me.php" class="button">Click</a>
</div>

<script>
    function displayText() {
        var textBoxValue = document.getElementById("inputBox").value;
        document.getElementById("display").innerText = textBoxValue;
    }
</script>

</body>
</html>
