<?php

include("auth/db_auth.php");

// #### fetch articles
$sql = "SELECT id, title, article, author FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql_dump = array();
    
    while($row = $result->fetch_assoc()) {
        $sql_dump[count($sql_dump)] = $row;
    }

    usort($sql_dump, function($a, $b) {
        return $b["id"] - $a["id"];
    });

    $count = 0;
    foreach ($sql_dump as $entry) { ?>
        
        <h2 class="article-heading"><?php echo $entry["title"]; ?></h2>
        
        <p><?php echo $entry["article"]; ?></p>

        <?php

        $count++;

        if ($count < count($entry) - 1) {
            echo "<div class='spacer'></div>";
        }
    }
} else {
    echo "Keine Artikel vorhanden!";
}

$conn->close();

?>