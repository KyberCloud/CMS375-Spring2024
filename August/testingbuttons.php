<!DOCTYPE html>
<html>
<head>
    <title>Testing HTML</title>
    <style>
        .button {
            background-color: #AEDC34;
            color: black;
            padding: 10px 20px; /* Adjust size */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button1 {
            background-color: #04AA6D;
            color: white;
            padding: 15px 30px; /* Adjust size */
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .button2 {
            background-color: #3498DB;
            color: white;
            padding: 12px 25px; /* Adjust size */
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
		.button3 {
            background-color: #ABCDEF;
            color: white;
            padding: 12px 25px; /* Adjust size */
            border: none;
            border-radius: 6px;
            cursor: pointer;
		}
        .output {
            margin-bottom: 20px;
        }

        .button-container {
            display: inline-block;
            margin-bottom: 20px;
        }

        .textbox-container {
            display: inline-block;
            margin-bottom: 20px;
        }

        .container {
            text-align: center;
        }

        .print-button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color:green;">Test Code</h1>

        <div class="button-container">
            <form method="post">
                <input type="submit" name="button" class="button" value="Please" />
            </form>
            <form method="post">
                <input type="submit" name="button1" class="button1" value="Stop" />
            </form>
        </div>

        <div class="output">
            <?php
            if (isset($_POST['button'])) {
                button();
            }
            if (isset($_POST['button1'])) {
                button1();
            }

            function button()
            {
                echo 'this isnt working?'
            }

            function button1()
            {
                echo 'Have fun!';
            }
            ?>
        </div>

        <div class="textbox-container">
            <form method="post">
                <input type="text" name="input" placeholder="Enter text" />
                <input type="submit" name="button2" class="button2" value="Print" />
            </form>

            
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "FoxEats";
            
                // create connection
                
            $connection = mysqli_connect($servername, $username, $password, $dbname);
            if(!$connection)
                die("couldn't connect".mysqli_connect_error());
            else
                echo 'connection established';

                //$sql = "SELECT * from Food";
                
            ?>
        
        </div>

        <!-- Button to redirect to another website -->
        <div class="print-button-container">
            <form method="post">
                <input type="submit" class="button3" value="Go" formaction="andrej.php" />
            </form>
        </div>
    </div>
</body>
</html>
