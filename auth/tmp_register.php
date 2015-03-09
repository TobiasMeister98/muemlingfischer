<?php

if (isset($_SESSION["isLoggedIn"])) {
    exit;
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sha_pass = sha1($password);
    
    include("db_auth.php");
    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', HEX('$sha_pass')";
    
    if ($conn->query($sql) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: ".$sql."<br>".$conn->error;
    }
    
    $conn->close();
}

?>

<h1>Register</h1>

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