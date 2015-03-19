<?php if (!(isset($_SESSION["isLoggedIn"]))) { header("location: ?section=notloggedin"); exit; } else {

$error = array();
$success = array();
$change = array();

// #### check for issets, put error- and success messages aswell as set changes for later execution
if (isset($_POST["email"]) || isset($_POST["email2"])) {
    $email = $_POST["email"];
    $email2 = $_POST["email2"];
    
    if ($email == $email2 && $email != "" && $email2 != "") {
        $change[count($change)] = "email";
        
        $success[count($success)] = "Email erfolgreich geändert.";
    } else if ($email != $email2 || ($email == "" && $email2 != "") || ($email != "" && $email2 == "")) {
        $error[count($error)] = "Die eingegebenen Email-Adressen stimmen nicht überein!";
    }
}

if (isset($_POST["nickname"])) {
    $nickname = $_POST["nickname"];
    
    if ($nickname != "") {
        $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß");
        $replace = array("&Auml;", "&Ouml;", "&Uuml;", "&auml;", "&ouml;", "&uuml;", "&szlig;");
        $nickname = str_replace($search, $replace, $nickname);
        
        $change[count($change)] = "nickname";
        
        $success[count($success)] = "Nickname erfolgreich geändert.";
    }
}

if (isset($_POST["password"]) || isset($_POST["password2"])) {
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    
    if ($password == $password2 && $password != "" && $password2 != "") {
        $change[count($change)] = "password";
        
        $success[count($success)] = "Passwort erfolgreich geändert.";
    } else if ($password != $password2 || ($password == "" && $password2 != "") || ($password != "" && $password2 == "")) {
        $error[count($error)] = "Die eingegebenen Passwörter stimmen nicht überein!";
    }
}

// #### execute sql-updates
if (count($change) > 0) {
    $queries = array();
    
    if (in_array("email", $change)) {
        $queries[count($queries)] = "UPDATE users
                                        SET email = '$email'
                                        WHERE username = '".$_SESSION["username"]."'
                                        LIMIT 1;";
    }
    
    if (in_array("nickname", $change)) {
        $queries[count($queries)] = "UPDATE users
                                        SET nickname = '$nickname'
                                        WHERE username = '".$_SESSION["username"]."'
                                        LIMIT 1;";
    }
    
    if (in_array("password", $change)) {
        $sha_pass = sha1($password);
        
        $queries[count($queries)] = "UPDATE users
                                        SET password = UNHEX('$sha_pass')
                                        WHERE username = '".$_SESSION["username"]."'
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
            if (in_array("email", $change)) {
                $_SESSION["email"] = $email;
            }

            if (in_array("nickname", $change)) {
                $_SESSION["nickname"] = $nickname;
            }
        } else {
            echo "Error: ".$sql."<br>".$conn->error;
        }
    } else {
        if ($conn->multi_query($sql) === true) {
            if (in_array("email", $change)) {
                $_SESSION["email"] = $email;
            }

            if (in_array("nickname", $change)) {
                $_SESSION["nickname"] = $nickname;
            }
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

<h1>Profil</h1>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container">
        <h2 class="flush-top">Info</h2>  

        <table>
            <tr>
                <td>Benutzername:</td>
                <td><?php echo $_SESSION["username"]; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $_SESSION["email"]; ?></td>
            </tr>
            <tr>
                <td>Nickname:</td>
                <td><?php echo $_SESSION["nickname"]; ?></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <h2 class="flush-top">Email ändern</h2>

        <table>
            <tr>
                <td>Neue Email:</td>
                <td><input type="email" name="email" maxlength="254"></td>
            </tr>
            <tr>
                <td>Neue Email wiederholen:</td>
                <td><input type="email" name="email2" maxlength="254"></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <h2 class="flush-top">Nickname ändern</h2>

        <table>
            <tr>
                <td>Neuer Nickname:</td>
                <td><input type="text" name="nickname" maxlength="25"></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>

    <div class="container">
        <h2 class="flush-top">Passwort ändern</h2>

        <table>
            <tr>
                <td>Neues Passwort:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Neues Passwort wiederholen:</td>
                <td><input type="password" name="password2"></td>
            </tr>
        </table>
    </div>

    <div class="spacer-small"></div>
    
    <div class="content-right">
        <input type="submit" value="Änderungen speichern">
    </div>
</form>

<?php } ?>