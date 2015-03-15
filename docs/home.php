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
} else {
    echo "Keine Artikel vorhanden!";
}

$conn->close();

usort($sql_dump, function($a, $b) {
    return $b["id"] - $a["id"];
});

$count = 0;
foreach ($sql_dump as $entry) {
    if (strlen($entry["article"]) > 1000) {
        if (preg_match("/^.{1,1000}\b/s", $entry["article"], $match))
        {
            $entry["article"] = $match[0];
        }

        if (substr($entry["article"], -1) == " ") {
            $entry["article"] = substr($entry["article"], 0, -1);
        }
        
        $entry["article"] .= "...";
    }

    ?>

    <div class="spacer"></div>

    <section class="container">
        <h2 class="flush-top"><?php echo $entry["title"]; ?></h2>

        <p><?php echo $entry["article"]; ?></p>
    </section>

    <?php

    if ($count < count($entry) - 1) {
        echo "<div class='spacer'></div>";
    }

    $count++;
}

?>