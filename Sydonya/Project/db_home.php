<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | FoxEats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: turquoise;
            padding: 10px;
            text-align: right;
            color: white;
        }
        .restaurants {
            margin-top: 20px;
            text-align: center;
        }
        .restaurant {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: turquoise;
            text-align: center;
        }
        .restaurant h2 {
            margin-top: 0;
        }
        .restaurant p {
            margin-bottom: 0;
        }
        .restaurant a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>FoxEats</h1>
        </div>
    </header>
    <div class="container">
        <h1>Available Restaurants</h1>
        <div class="restaurants">
            <div class="restaurant">
                <a href="indexFoxEats.php">
                    <h2>Bush Cafe</h2>
                </a>
            </div>
            <div class="restaurant">
                <a href="daves.php">
                    <h2>Dave's Boathouse</h2>
                </a>
            </div>
            <div class="restaurant">
                <a href="grill.php">
                    <h2>Lakeside Grill</h2>
                </a>
            </div>
            <div class="restaurant">
                <a href="cafe.php">
                    <h2>Lakeside Cafe</h2>
                </a>
            </div>
            <div class="restaurant">
                <a href="cstore.php">
                    <h2>C-Store</h2>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
