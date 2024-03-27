<!DOCTYPE html>
<html>
<head>
    <title>Testing HTML</title>
    <style>
        .button {
            background-color: #ABCDEF;
            color: black;
            padding: 10px 20px; /* Adjust size */
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body style="text-align:center;">
    
    <?php
		if (isset($_POST['button'])) 
		{
			button();
		}

		function button()
		{
			$servername = "localhost";
			$username = "root";
			$password = "Chicago01202002!"; //add password
			$dbname = "project";

			//create connection

			$connection = mysqli_connect($servername, $username, $password, $dbname);
			if(!$connection)
				die("couldn't connect".mysqli_connect_error());
			else
				echo 'connection established';
			
			//MISSING CODE//
			$sql  = "SELECT * from student";
			$result = $connection->query($sql);
			
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "id: " . $row["ID"]. " - Name: " . $row["name"]. "- Address " . $row["address"]; <br>
				}
	
			} else {
				echo "0 results";
			}
		}
		$connection->close();
	?>
	
	<form method="post">
        <input type="submit" name="button" class="button" value="Connect" />
    </form>
        
</body>
</html>
