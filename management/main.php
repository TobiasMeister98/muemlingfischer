<?php if (!(isset($_SESSION["isLoggedIn"]))) { header("location: ?section=notloggedin"); exit; } else {

$error = array();
$success = array();
$change = array();

// #### check for issets, put error- and success messages aswell as set changes for later execution
if (isset($_POST["pagename"])) {
    $pagename = $_POST["pagename"];
    
    if ($pagename != "") {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß");
        $replace = array("&Auml;", "&Ouml;", "&Uuml;", "&auml;", "&ouml;", "&uuml;", "&szlig;");
        $pagename = str_replace($search, $replace, $pagename);
        
        $change[count($change)] = "pagename";
        
        $success[count($success)] = "Seitenname erfolgreich geändert.";
    }
}

// #### execute sql-updates
if (count($change) > 0) {
    $queries = array();
    
    if (in_array("pagename", $change)) {
        $queries[count($queries)] = "UPDATE page
                                        SET name = '$pagename'
                                        WHERE id = 1
                                        LIMIT 1;";
    }
    
    include("auth/db_auth.php");
    
    // #### build sql query string
    $sql = "";
    
    for ($x = 0; $x < count($queries); $x++) {
        $sql .= $queries[$x];
        
        if ($x < count($queries) - 1) {
            $sql .= " ";
        }
    }
    
    // #### execute query
    if (count($queries) == 0) {
        if ($conn->query($sql) === true) {
            
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    } else {
        if ($conn->multi_query($sql) === true) {
            
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    }

    $conn->close();
}

// #### echo errors and successful changes
for ($x = 0; $x < count($error); $x++) {
    echo "<span style='color: #f00;'>".$error[$x]."</span>";
    echo "<br>";
}
for ($x = 0; $x < count($success); $x++) {
    echo $success[$x];
    echo "<br>";
}

?>

<h1>Verwaltung</h1>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container">
        <h2 class="flush-top">Seiteninfo</h2>
        
        <table>
            <tr>
                <td>Seitenname:</td>
                <td><?php echo $pg_row["name"]; ?></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <h2 class="flush-top">Seiteninfo ändern</h2>
        
        <table>
            <tr>
                <td>Neuer Seitenname:</td>
                <td><input type="text" name="pagename"></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <a href="?resource=management&section=articles">
            <h2 class="flush-top flush-bottom">Zum Artikeleditor - WIP</h2>
        </a>
    </div>

    <div class="spacer-small"></div>
    
    <div class="content-right">
        <input type="submit" value="Änderungen speichern">
    </div>
</form>

<?php } ?>