<?php if (!(isset($_SESSION["isLoggedIn"]))) { header("location: ?section=notloggedin"); exit; } else {

include("auth/db_auth.php");

?>

<!-- NEED TO FIX! -->
<form id="articles" class="management" onchange="document.getElementById('articles').submit(); <?php header("location: ?category=".($_GET['category'] == "" ? "dd" : "dd")); ?>" method="get">
    <select style="font-size: 1.2em; width: 75%; display: block; margin-left: auto; margin-right: auto; padding: 10px;">
    
    <?php

    // #### fetch and display categories
    $sql = "SELECT id, category
            FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<option name='category' value='0'>Alle Kategorien</option>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<option name='category' value='".$row=["id"]."'>".$row["category"]."</option>";
        }
    } else {
        echo "<option value='0'>Keine Kategorien!</option>";
    }
    echo "</select><br><hr>";

    // #### fetch articles
    $sql = "SELECT articles.*, categories.category, users.nickname
            FROM articles
            INNER JOIN categories
            ON articles.category = categories.id
            INNER JOIN users
            ON articles.author = users.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql_dump = array();
        
        while ($row = $result->fetch_assoc()) {
            $sql_dump[count($sql_dump)] = $row;
        }

        usort($sql_dump, function($a, $b) {
            return $b["id"] - $a["id"];
        });

        ?>
        
        <div class="container-small-nostyle">
            <ul class="flex-container">
                <li class="flex-item-article-name">
                    <h3 class="flush-top flush-bottom">Artikelname</h3>
                </li>
                <li class="flex-item-article-category">
                    <h3 class="flush-top flush-bottom">Kategorie</h3>
                </li>
                <li class="flex-item-article-author">
                    <h3 class="flush-top flush-bottom">Author</h3>
                </li>
                <li class="flex-item-article-createdate">
                    <h3 class="flush-top flush-bottom">Erstelldatum</h3>
                </li>
            </ul>
        </div>
        
        <?php
        
        $count = 0;
        foreach ($sql_dump as $entry) {

            ?>

            <section class="container-small">
                <ul class="flex-container">
                    <li class="flex-item-article-name">
                        <span class="flush-top flush-bottom"><?php echo $entry["title"]; ?></span>
                    </li>
                    <li class="flex-item-article-category">
                        <span class="flush-top flush-bottom"><?php echo $entry["category"]; ?></span>
                    </li>
                    <li class="flex-item-article-author">
                        <span class="flush-top flush-bottom"><?php echo $entry["author"]; ?></span>
                    </li>
                    <li class="flex-item-article-createdate">
                        <span class="flush-top flush-bottom"><?php echo date("d.m.Y", strtotime($entry["created"])); ?></span>
                    </li>
                </ul>
            </section>

            <?php

            if ($count < count($entry) - 1) {
                echo "<div class='spacer-small'></div>";
            }

            $count++;
        }
    } else {
        echo "Keine Artikel in dieser Kategorie!";
    }
    
    $conn->close();
    
    ?>

</form>

<!--more-->

<?php } ?>