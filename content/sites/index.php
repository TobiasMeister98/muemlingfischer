<?php

/** Connect to database */
$conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

if ( $conn->connect_error )
    die( "Connection failed: " . $conn->connect_error );

/** Fetch articles */
$sql = "SELECT id, title, article, author FROM articles";
$result = $conn->query( $sql );

if ( $result->num_rows > 0 ) {
    $sql_dump = array();
    
    while( $row = $result->fetch_assoc() ) {
        $sql_dump[count( $sql_dump )] = $row;
    }

    usort( $sql_dump, function( $a, $b ) {
        return $b["id"] - $a["id"];
    } );

    $count = 0;
    foreach ( $sql_dump as $entry ) { ?>
        
        <h2 class="article-heading"><?php echo $entry["title"]; ?></h2>
        
        <p><?php echo $entry["article"]; ?></p>

        <?php

        $count++;

        if ( $count < count( $entry ) - 1 ) {
            echo "<div class='spacer'></div>";
        }
    }
} else {
    echo "Keine Artikel vorhanden!";
}

$conn->close();
