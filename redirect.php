<?php

echo "<pre>
Erfolgreich ausgeloggt! Sie werden in Kürze weitergeleitet...
Falls Sie nicht automatisch weitergeleitet werden, bitte <a href='?section=home'>HIER</a> klicken!
</pre>";

header("refresh: 3; url= ?section=home");

?>