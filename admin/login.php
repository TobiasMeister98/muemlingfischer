<?php

if ( isset( $_SESSION['isLoggedIn'] ) ) {
    header( 'location: ?section=home' );
    exit;
} else {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sha_pass = sha1( $password );

        $conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

        if ( $conn->connect_error )
            die( 'Connection failed: ' . $conn->connect_error );
        
        $sql = "SELECT username, HEX( password ), email, nickname
                FROM users
                WHERE username='$username'
                LIMIT 1";
        
        $result = $conn->query( $sql );

        $row = $result->fetch_assoc();

        if ( $row['HEX( password )'] == strtoupper( $sha_pass ) ) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nickname'] = $row['nickname'];

            $conn->close();

            header( 'location: ?section=redirect' );
            exit;
        } else {
            echo '<span style="color: #f00;">Nutzername oder Passwort falsch!</span>';
        }

        $conn->close();
    }

    ?>

    <h1>Login</h1>

    <form method="post" action="<?php $PHP_SELF; ?>">
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

    <?php
    
}
