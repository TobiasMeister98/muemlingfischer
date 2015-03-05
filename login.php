<?php

if (isset($_SESSION["isLoggedIn"])) {
    header("location: ?section=home");
    exit;
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username_form = $_POST["username"];
    $password_form = $_POST["password"];
    
    $sha_pass = sha1($password_form);
    
    $servername = "localhost";
    $username = "root";
    $password = "DvsK*12G";
    $dbname = "muemlingfischer";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);
    
    $sql = "SELECT username, HEX(password) FROM login WHERE username LIKE '$username_form' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["HEX(password)"] == strtoupper($sha_pass)) {
            $_SESSION["isLoggedIn"] = true;
            
            header("location: ?section=redirect");
            exit;
        } else {
            echo "<span style='color: #f00; font-weight: bold;'>Nutzername oder Passwort falsch!</span>";
        }
    } else {
        echo "<span style='color: #f00; font-weight: bold;'>Nutzername oder Passwort falsch!</span>";
    }
    
    $conn->close();
}

?>

<h1>Login</h1>

<br>

<div class="login-main">
    <form name="login-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Benutzername:</td>
                <td><input type="text" name="username" maxlength="50"></td>
            </tr>
            <tr>
                <td>Passwort:</td>
                <td><input type="password" name="password"></input></td>
            </tr>
            
            <tr class="table-spacer"></tr>
            
            <tr>
                <td />
                <td style="text-align: right">
                    <input type="submit" value="Einloggen">
                </td>
            </tr>
        </table>
    </form>
</div>