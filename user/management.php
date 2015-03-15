<?php if (!(isset($_SESSION["isLoggedIn"]))) { header("location: ?section=notloggedin"); exit; } else {

include("auth/db_auth.php");

?>

<form class="management-main" onchange="">
    <select style='font-size: 1.2em; width: 75%; display: block; margin-left: auto; margin-right: auto; padding: 10px;'>
    
    <?php

    // #### fetch and display categories
    $sql = "SELECT id, category FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<option value='0'>Alle Kategorien</option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row=["id"]."'>".$row["category"]."</option>";
        }
    } else {
        echo "<option value='0'>Keine Kategorien!</option>";
    }
    echo "</select><br><hr>";

    // #### fetch articles
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql_dump = array();
        while($row = $result->fetch_assoc()) {
            $sql_dump[count($sql_dump)] = $row;
        }
    } else {
        echo "Keine Artikel in dieser Kategorie!";
    }
    
    $conn->close();

    usort($sql_dump, function($a, $b) {
        return $b["id"] - $a["id"];
    });

    $count = 0;
    foreach ($sql_dump as $entry) {

        ?>

        <div class="spacer"></div>

        <section class="container">
            <ul class="flex-container">
                <li class="flex-item-article-name">
                    <span class="flush-top flush-bottom"><?php echo $entry["title"]; ?></span>
                </li>
                <li class="flex-item-article-info">
                    <span class="flush-top flush-bottom"><?php echo $entry["category"]; ?></span>
                </li>
                <li class="flex-item-article-info">
                    <span class="flush-top flush-bottom">dd</span>
                </li>
                <li class="flex-item-article-info">
                    <span class="flush-top flush-bottom">22</span>
                </li>
            </ul>
        </section>

        <?php

        if ($count < count($entry) - 1) {
            echo "<div class='spacer'></div>";
        }

        $count++;
    }

    ?>

</form>

<?php } ?>