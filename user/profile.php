<?php

if (!(isset($_SESSION["isLoggedIn"]))) {
    header("location: ?section=notloggedin");
    exit;
} else {

?>

<h1>Profil</h1>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
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
        </table>
    </div>

    <div class="spacer"></div>

    <div class="container">
        <h2 class="flush-top">Email ändern</h2>

        <table>
            <tr>
                <td>Email eingeben:</td>
                <td>
                    <input type="email">
                </td>
            </tr>
            <tr>
                <td>Email wiederholen:</td>
                <td>
                    <input type="email">
                </td>
            </tr>
        </table>
    </div>

    <div class="spacer"></div>

    <div class="container">
        <h2 class="flush-top">Passwort ändern</h2>

        <table>
            <tr>
                <td>Passwort eingeben:</td>
                <td>
                    <input type="password">
                </td>
            </tr>
            <tr>
                <td>Passwort wiederholen:</td>
                <td>
                    <input type="password">
                </td>
            </tr>
        </table>
    </div>

    <div class="spacer content-right">
        <input type="submit" value="Änderungen speichern">
    </div>
</form>

<?php } ?>