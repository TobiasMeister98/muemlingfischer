<?php if (isset($_SESSION["isLoggedIn"])) { header("location: ?resource=auth&section=notloggedin"); exit; } else {

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username_form = $_POST["username"];
    $password_form = $_POST["password"];
    
    $sha_pass = sha1($password_form);
    
    include("db_auth.php");
    
    echo $username;
    
    $sql = "SELECT username, HEX(password), email FROM login WHERE username LIKE '$username_form' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($row["HEX(password)"] == strtoupper($sha_pass)) {
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            
            header("location: ?resource=nav&section=redirect");
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

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
    <table>
        <tr>
            <td>Benutzername:</td>
            <td><input type="text" name="username" maxlength="50"></td>
        </tr>
        <tr>
            <td>Passwort:</td>
            <td><input type="password" name="password"></input></td>
        </tr>
        
        <tr><td></td></tr>
        
        <tr>
            <td></td>
            <td class="content-right">
                <input type="submit" value="Einloggen">
            </td>
        </tr>
    </table>
</form>

<?php } ?>