<?php
//Sydonya Miller, August Alexander, Andrej Opancic
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FoxEats";

//create connection


$connection = mysqli_connect($servername, $username, $password, $dbname);
if(!$connection)
   die("couldn't connect".mysqli_connect_error());
else
   echo 'connection established';

?>