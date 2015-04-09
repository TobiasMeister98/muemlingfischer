<?php

$conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

if ( $conn->connect_error )
    die( 'Connection failed: ' . $conn->connect_error );

$pg = array();

$pg['sql'] = "SELECT name
            FROM page
            WHERE id = 1
            LIMIT 1";

$pg['result'] = $conn->query( $pg['sql'] );

$pg['row'] = $pg['result']->fetch_assoc();

$conn->close();
