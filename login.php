<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username_form = $_POST["username"];
    $password_form = $_POST["password"];
    
    $sha_pass = strtoupper(sha1($password_form));
    
    $servername = "localhost";
    $username = "root";
    $password = "DvsK*12G";
    $dbname = "muemlingfischer";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);
    
    $sql = "SELECT username FROM `login`";
    $username_db = $conn->query($sql);

    $sql = "SELECT HEX(password) FROM `login`";
    $password_db = $conn->query($sql);

    if ($username_db->num_rows > 0 && $password_db->num_rows > 0) {
        $username_row = $username_db->fetch_assoc();
        $password_row = $password_db->fetch_assoc();
    } else {
        echo "SQL-Error";
    }
    // FIX!!! - IMPORTANT!!!!!!!!
    if (in_array($username_form, $username_row) && in_array($sha_pass, $password_row)) {
        echo "login correct!";
    } else {
        echo "you fucked up!";
    }
}

?>

<h1>Login</h1>

<br>

<div class="login-main">
    <form name="login-form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Benutzername:</td>
                <td><input type="text" name="username"></td>
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