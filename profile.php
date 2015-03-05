<?php

if (isset($_SESSION["isLoggedIn"])) {
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
?>

<tr>
    <td>Benutzername:</td>
    <td><?php  ?></td>
</tr>

<?php } else {

header("location: ?section=notloggedin");
exit;

} ?>