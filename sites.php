<?php
    $path = "docs/";
    
    if (isset($_GET["section"])) {
        switch($_GET["section"])
        {
            default:
                include($path."home.html");
                break;
            case "galerie":
                include($path."galerie.html");
                break;
            case "links":
                include($path."links.html");
                break;
            case "kontakt":
                include($path."kontakt.html");
                break;
            case "impressum":
                include($path."impressum.html");
                break;
            case "login":
                include("login.php");
                break;
        }
    } else {
        include($path."home.html");
    }
?>