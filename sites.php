<?php
    $path = "docs/";
    
    if (isset($_GET["section"])) {
        switch($_GET["section"])
        {
            default:
                include($path."home.html");
                break;
            case "impressum":
                include($path."impressum.html");
                break;
            case "kontakt":
                include($path."kontakt.html");
                break;
        }
    } else {
        include($path."home.html");
    }
?>