<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "DvsK*12G";
$db_name = "muemlingfischer";

$conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);

if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);

?>