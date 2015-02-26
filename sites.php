<?php
    $path = "docs/";
    
    if (isset($_GET["section"])) {
        switch($_GET["section"])
        {
            default:
                include($path."home.html");
                break;
            case "login":
                include("login.php");
                break;
            case "logout":
                include("logout.php");
                break;
            case "redirect":
                include("redirect.php");
                break;
            case "profil":
                include("profile.php");
                break;
            case "management":
                include("management.php");
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
        }
    } else {
        include($path."home.html");
    }
?>