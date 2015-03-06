<?php

$servername = "localhost";
$username = "root";
$password = "DvsK*12G";
$dbname = "muemlingfischer";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

?>