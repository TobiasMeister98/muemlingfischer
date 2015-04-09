<?php

$action = 'ausgeloggt';

if ( isset( $_SESSION['isLoggedIn'] ) ) {
    $action = 'eingeloggt';
}

echo "<pre>
Erfolgreich $action! Sie werden in Kürze weitergeleitet...
Falls Sie nicht automatisch weitergeleitet werden, bitte <a href='?section=home'>HIER</a> klicken!
</pre>";

header( 'refresh: 3; url= ?section=home' );
